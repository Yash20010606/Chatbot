<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use MongoDB\BSON\ObjectId;


class ChatController extends Controller
{
    
    public function index()
{
    $user = Auth::user();
    $emp_id = $user->emp_id ?? null;
    $agentName = $user->name ?? 'Agent';

    if (!$emp_id) {
        return redirect()->back()->with('error', 'Employee ID not found.');
    }

    $contactNumbers = Message::where('from', $emp_id)
        ->orWhere('to', $emp_id)
        ->pluck('from')
        ->merge(Message::where('to', $emp_id)->pluck('to'))
        ->unique();

    if ($contactNumbers->isEmpty()) {
        return redirect()->back()->with('error', 'No contacts found.');
    }

    // Retrieve customer details and sort them by the latest message timestamp
    $contacts = Customer::whereIn('phone_number', $contactNumbers->toArray())
        ->get()
        ->map(function ($customer) use ($emp_id) {
            $latestMessage = Message::where(function ($query) use ($customer, $emp_id) {
                $query->where('from', $emp_id)->where('to', $customer->phone_number);
            })
            ->orWhere(function ($query) use ($customer, $emp_id) {
                $query->where('from', $customer->phone_number)->where('to', $emp_id);
            })
            ->latest('timestamp')
            ->first();

            // Attach the latest message timestamp to each contact
            $customer->latest_timestamp = $latestMessage ? $latestMessage->timestamp : null;
            return $customer;
        })
        ->sortByDesc('latest_timestamp');

    return view('chat.index', compact('emp_id', 'contacts', 'agentName'));
}


public function sendMessage(Request $request)
{
    $message = Message::create([
        'from' => $request->input('from'),
        'to' => $request->input('to'),
        'message' => $request->input('message'),
        'timestamp' => now(),
        'active_chat' => true,
    ]);

    
    DB::table('agent')
        ->where('emp_id', $request->input('from'))
        ->increment('active_chats', 1);


    return response()->json([
        'from' => $message->from,
        'to' => $message->to,
        'message' => $message->message,
        'formatted_time' => Carbon::parse($message->timestamp)->format('h:i A'),
    ]);
}


    public function getMessages($phoneNumber)
    {
       
        $agentEmpId = Auth::user()->emp_id;
    
    
        $messages = Message::where(function ($query) use ($agentEmpId, $phoneNumber) {
            $query->where('from', $agentEmpId)->where('to', $phoneNumber);
        })
        ->orWhere(function ($query) use ($agentEmpId, $phoneNumber) {
            $query->where('from', $phoneNumber)->where('to', $agentEmpId);
        })
        ->orderBy('timestamp', 'asc') 
        ->get()
        ->map(function ($message) {
            $message->formatted_time = $message->timestamp->setTimezone('Asia/Colombo')->format('h:i A');
            return $message;
        });

        // Return the filtered messages as a JSON response
        return response()->json($messages);
    }

    public function getLatestContacts()
{
    try {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $emp_id = $user->emp_id ?? null;
        if (!$emp_id) {
            return response()->json(['error' => 'Employee ID not found'], 400);
        }

        // Fetch contacts with the latest message timestamp
        $contactNumbers = Message::where('from', $emp_id)
            ->orWhere('to', $emp_id)
            ->pluck('from')
            ->merge(Message::where('to', $emp_id)->pluck('to'))
            ->unique();

        if ($contactNumbers->isEmpty()) {
            return response()->json(['contacts' => []]);
        }

        $contacts = Customer::whereIn('phone_number', $contactNumbers->toArray())
            ->get()
            ->map(function ($customer) use ($emp_id) {
                $latestMessage = Message::where(function ($query) use ($customer, $emp_id) {
                    $query->where('from', $emp_id)->where('to', $customer->phone_number);
                })
                ->orWhere(function ($query) use ($customer, $emp_id) {
                    $query->where('from', $customer->phone_number)->where('to', $emp_id);
                })
                ->latest('timestamp')
                ->first();

                return [
                    'phone_number' => $customer->phone_number,
                    'latest_timestamp' => $latestMessage ? $latestMessage->timestamp : null,
                    'unread_count' => 0,
                ];
            })
            ->sortByDesc('latest_timestamp')
            ->values();

        return response()->json(['contacts' => $contacts]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getUnreadMessages()
{
    $emp_id = Auth::user()->emp_id;

    $unreadMessages = Message::raw(function ($collection) use ($emp_id) {
        return $collection->aggregate([
            ['$match' => ['to' => $emp_id, 'is_read' => false]],
            ['$group' => [
                '_id' => '$from',
                'count' => ['$sum' => 1]
            ]]
        ]);
    });

    
    $result = [];
    foreach ($unreadMessages as $message) {
        $result[$message->_id] = $message->count;
    }

    return response()->json($result);
}


public function markMessagesRead(Request $request)
{
    // Log incoming request data
    Log::debug('Incoming request data: ', $request->all());

    $phoneNumber = $request->input('phoneNumber');
    
    // Log the phone number for debugging
    Log::debug('Phone Number:', ['phoneNumber' => $phoneNumber]);

    $updated = Message::where('from', $phoneNumber)
                      ->where('is_read', false)
                      ->update([
                          'is_read' => true
                      ]);

    // Return response
    return response()->json([
        'success' => $updated > 0,
        'updatedCount' => $updated,
        'message' => $updated > 0 ? 'Messages marked as read successfully.' : 'No messages found to mark as read.'
    ]);
}


public function deactivateInactiveChat(Request $request)
{
    $messageId = $request->input('message_id');

    // Convert string to ObjectId if necessary
    $messageId = new ObjectId($messageId);


    $message = Message::find($messageId);

    if ($message) {
        $timeoutThreshold = Carbon::now('Asia/Colombo')->subMinutes(2)->utc();

        if ($message->active_chat && $message->created_at <= $timeoutThreshold) {
    
            $message->update(['active_chat' => false]);

            DB::table('agent')
                ->where('emp_id', $message->from)
                ->decrement('active_chats', 1);

            return response()->json(['status' => 'success', 'message' => 'Chat deactivated']);
        }

        return response()->json(['status' => 'error', 'message' => 'Chat is already inactive or not yet inactive']);
    }

    return response()->json(['status' => 'error', 'message' => 'Message not found']);
}




    
}
