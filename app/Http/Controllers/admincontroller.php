<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DomesticWorker;
use App\Models\Dispute;
use App\Models\Relationship;
use App\Models\Request as EmployerRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function createDomesticWorker()
    {
        return view('admin.domestic_workers.create');
    }

    public function storeDomesticWorker(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:domestic_workers',
            'date_of_birth' => 'required|date',
            'skills' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'telephone' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $domesticWorker = new DomesticWorker();
        $domesticWorker->first_name = $request->first_name;
        $domesticWorker->last_name = $request->last_name;
        $domesticWorker->username = $request->username;
        $domesticWorker->date_of_birth = $request->date_of_birth;
        $domesticWorker->skills = $request->skills;
        $domesticWorker->gender = $request->gender;
        $domesticWorker->address = $request->address;
        $domesticWorker->telephone = $request->telephone;
        $domesticWorker->password = bcrypt($request->password);
        $domesticWorker->save();

        return redirect()->route('admin.domestic-workers.index')->with('success', 'Domestic worker registered successfully.');
    }

    public function viewDomesticWorkers()
    {
        $domesticWorkers = DomesticWorker::all();
        return view('admin.domestic_workers.index', compact('domesticWorkers'));
    }

    public function viewRequests()
    {
        $requests = EmployerRequest::with('employer', 'domesticWorker')->get();
        return view('admin.requests.index', compact('requests'));
    }

    public function approveRequest($id)
    {
        $request = EmployerRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        // Create a new relationship
        Relationship::create([
            'employer_id' => $request->employer_id,
            'domestic_worker_id' => $request->domestic_worker_id,
        ]);

        return redirect()->route('admin.requests.index')->with('success', 'Request approved successfully.');
    }

    public function declineRequest($id)
    {
        $request = EmployerRequest::findOrFail($id);
        $request->status = 'declined';
        $request->save();

        return redirect()->route('admin.requests.index')->with('success', 'Request declined successfully.');
    }

    public function viewRelationships()
    {
        $relationships = Relationship::with('employer', 'domesticWorker')->get();
        return view('admin.relationships.index', compact('relationships'));
    }

    public function terminateRelationship($id)
    {
        $relationship = Relationship::findOrFail($id);
        $relationship->delete();

        return redirect()->route('admin.relationships.index')->with('success', 'Relationship terminated successfully.');
    }

    public function viewDisputes()
    {
        $disputes = Dispute::with('employer', 'domesticWorker')->get();
        return view('admin.disputes.index', compact('disputes'));
    }

    public function resolveDispute(Request $request, $id)
    {
        $request->validate([
            'resolution' => 'required|string',
        ]);

        $dispute = Dispute::findOrFail($id);
        $dispute->status = 'resolved';
        $dispute->resolution = $request->resolution;
        $dispute->save();

        return redirect()->route('admin.disputes.index')->with('success', 'Dispute resolved successfully.');
    }
}
