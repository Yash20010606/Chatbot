<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'emp_id' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        elseif ($user->role == 'supervisor') {
            // Fetch the supervisor's group code
            $supervisor = Supervisor::where('emp_id', $user->emp_id)->first();
            if ($supervisor) {
                // Store group code in session
                session(['supervisor_group' => $supervisor->group_code]);
                return redirect()->route('supervisor.dashboard')->with('success', 'Group code stored in session.');
            } else {
                session()->flash('error', 'No group assigned to this supervisor.');
                return redirect()->route('login.form');
            }
        }
        elseif ($user->role == 'reporter') {
            return redirect()->route('reporter.dashboard');
        }
        else {
            return redirect()->route('user.dashboard');
        }
    }

    return back()->withErrors(['emp_id' => 'Invalid Employee ID or Password'])->withInput();
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

