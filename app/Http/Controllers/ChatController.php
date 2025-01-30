<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        $emp_id = $user->emp_id ?? null;
        $username = $user->name;

        
        if (!$emp_id) {
            return redirect()->back()->with('error', 'Employee ID not found.');
        }

        $contacts = Customer::where('phone_number', '!=', $emp_id)->get();  // Adjust query if necessary

        return view('chat.index', compact('emp_id', 'contacts', 'username'));
    }

    
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'message' => $request->input('message'),
            'timestamp' => now(),
        ]);

        // Return the filtered messages as a JSON response
        return response()->json($message);
    }

    public function getMessages($phoneNumber)
    {
        // Get the logged-in agent's ID
        $agentEmpId = Auth::user()->emp_id;
    
        // Fetch messages where the agent is either the sender ('from') or the receiver ('to')
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
    
}
