<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function redirectToPage(Request $request)
    {
        if (Auth::check()) {


            return redirect()->route('dashboard');
        } else {

            return redirect()->route('auth-login-basic');
        }
    }

    // Login function
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed
            return redirect()->route('dashboard');  // Redirect to the dashboard after login
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials. Please try again.'])
                     ->withInput(); // Retain the input values on failure
    }


    public function logout(Request $request)
    {

        Auth::logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('auth-login-basic');
    }
}
