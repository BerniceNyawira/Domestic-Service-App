<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function viewRequests()
    {
        return view('admin.requests.index');
    }

    public function viewRelationships()
    {
        return view('admin.relationships.index');
    }

    public function viewDisputes()
    {
        return view('admin.disputes.index');
    }
}

