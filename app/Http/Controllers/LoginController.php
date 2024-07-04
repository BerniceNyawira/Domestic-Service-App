<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show login form
    public function showLoginForm(){
        return view('Register.login');
    }

    //handle login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //check if the user is an employer
            if(Auth::user()->role == 'employer'){
                return redirect()->route('employer.dashboard');
            }
            
            //check if user is admin
            //check if user is domestic worker 
        }
        
        //failed
        return back()->withInput()->withErrors(['email' => 'Invalid Credentials']);
    }

    //log out user 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); 
    }
}