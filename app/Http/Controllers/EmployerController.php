<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployerController extends Controller
{
    //show employer dashboard
    public function showDashboard()
    {
        return view('user.employer');
    }

    //edit profile
    public function editProfile()
    {
        $employer = Auth::user()->employer;
        return view('User.update-profile', compact('employer'));
    }

    //update profile
    public function updateProfile(Request $request)
    {
        // Validate the request
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'telephone_no' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'size_of_homestead' => 'required|string|max:255',
            'married' => 'required|string|max:20',
            'children' => 'required|integer|min:0',
            'ages_of_children' => 'required|string|max:255',
            'preferred_skills' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $employer = $user->employer;

        if (!$employer) {
            return redirect()->route('employer.update.profile')->with('error', 'Employer profile not found!');
        }

        //update employer's information
        $employer->f_name = $request->f_name;
        $employer->l_name = $request->l_name;
        $employer->address = $request->address;
        $employer->date_of_birth = $request->date_of_birth;
        $employer->telephone_no = $request->telephone_no;
        $employer->gender = $request->gender;
        $employer->size_of_homestead = $request->size_of_homestead;
        $employer->married = $request->married;
        $employer->children = $request->children;
        $employer->ages_of_children = $request->ages_of_children;
        $employer->preferred_skills = $request->preferred_skills;

        // Save the changes
        $employer->save();

        // After updating fields and before saving
        Log::info('Employer after update: ', $employer->toArray());

        //Redirect with success message
        return redirect()->route('employer.update.profile')->with('success','Profile updated successfully!');
    }

    //find domestic worker
    public function findDw()
    {
        return view('User.find-dw');
    }

    //report disputes
    public function reportDisputes()
    {
        return view('user.report-disputes');
    }

    //view partnerships
    public function viewPartnerships()
    {
        return view('user.view-partnerships');
    }

    //pending requests
    public function pendingRequests()
    {
        return view('user.pending-requests');
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
