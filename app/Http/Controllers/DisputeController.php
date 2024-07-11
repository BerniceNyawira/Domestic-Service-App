<?php

namespace App\Http\Controllers;

use App\Models\DisputeResolution;
use App\Models\Disputes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisputeController extends Controller
{
    public function submitForm()
    {
        return view('dispute.submit-dispute');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dispute = Disputes::create([
            'user_id' => auth()->user()->id,
            'role' => auth()->user()->role,
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'status' => 'pending', // Set default status
        ]);

        return redirect()->route('dispute.create')->with('success', 'Dispute submitted successfully.');
    }

    public function pendingDisputes()
    {
        $disputes = Disputes::where('status', 'pending')->get();
        return view('employer.pending-disputes', compact('disputes'));
    }

    public function show($id)
    {
        $dispute = Disputes::findOrFail($id);
        $resolutions = $dispute->resolutions;

        return view('dispute.dispute-details', compact('dispute', 'resolutions'));
    }

    public function resolveForm($id)
    {
        $dispute = Disputes::findOrFail($id);
        return view('admin.resolve-dispute', compact('dispute'));
    }

public function resolve(Request $request, $id)
{
    $request->validate([
        'resolution_description' => 'required|string',
    ]);
    
    $dispute = Disputes::findOrFail($id);
    $dispute->status = 'resolved';
    $dispute->save();

    DisputeResolution::create([
        'dispute_id' => $dispute->id,
        'resolution_description' => $request->input('resolution_description'),
    ]);

    return redirect()->route('dispute.pending')->with('success', 'Dispute resolved successfully.');
}

}
