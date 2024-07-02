<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employer',
        ]);

        Employer::create([
            'user_id' => $user->id,
            'f_name' => '', // You can update this later
            'l_name' => '', // You can update this later
            'address' => '', // You can update this later
            'date_of_birth' => null, // You can update this later
            'telephone_no' => '', // You can update this later
            'gender' => '', // You can update this later
            'size_of_homestead' => '', // You can update this later
            'married' => '', // You can update this later
            'children' => '', // You can update this later
            'ages_of_children' => '', // You can update this later
            'preferred_skills' => '', // You can update this later
        ]);
        
        //log the user in
        auth()->login($user);

        //redirect to desired page
        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}