<?php

namespace App\Http\Controllers;

use App\Models\DisputeResolution;
use App\Models\Disputes;
use Illuminate\Http\Request;

class DisputeResolutionController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'resolution_description' => 'required|string',
        ]);

        $dispute = Disputes::findOrFail($id);

        DisputeResolution::create([
            'dispute_id' => $dispute->id,
            'resolution_description' => $request->resolution_description,
            'resolution_status' => 'resolved',
        ]);

        $dispute->update(['status' => 'resolved']);

        return redirect()->route('dispute.details', $dispute->id)->with('success', 'Dispute resolved successfully.');
    }
}

