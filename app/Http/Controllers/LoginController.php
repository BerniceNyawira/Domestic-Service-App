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
            //successful
            return redirect()->intended('/dashboard');
        }
        //failed
        return back()->withInput()->withErrors(['email' => 'Invalid Credentials']);
    }

    //log out user 
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); 
    }
}