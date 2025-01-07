<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            } elseif ($user->role == 'supervisor') {
                return redirect()->route('supervisor.dashboard');
            } elseif ($user->role == 'reporter') {
                return redirect()->route('reporter.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

       
        return back()->withErrors(['emp_id' => 'Invalid User Name or Password'])->withInput();
    }

    public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}

}
