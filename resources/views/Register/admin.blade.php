<!-- resources/views/admin/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('admin.domestic-workers.create') }}">Register Domestic Worker</a></li>
                        <li><a href="{{ route('admin.requests.index') }}">View Requests</a></li>
                        <li><a href="{{ route('admin.relationships.index') }}">View Relationships</a></li>
                        <li><a href="{{ route('admin.disputes.index') }}">View Disputes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
