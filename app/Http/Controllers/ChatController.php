<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        'timestamp' => now(),  // Save the current timestamp
    ]);

    // Format the timestamp for the response
    $formattedTimestamp = Carbon::parse($message->timestamp)->format('h:i A');
    
    broadcast(new MessageSent($message));

    // Return the message with the formatted time
    return response()->json([
        'from' => $message->from,
        'to'=> $message->to,
        'message' => $message->message,
        'formatted_time' => $formattedTimestamp,  // Ensure this is passed back
        

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
                    'unread_count' => 0, // Update this later if unread messages need to be tracked
                ];
            })
            ->sortByDesc('latest_timestamp')
            ->values();

        return response()->json(['contacts' => $contacts]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    
}
