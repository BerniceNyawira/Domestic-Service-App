<!-- resources/views/admin/requests/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employer Requests</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employer</th>
                                <th>Domestic Worker</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->employer->name }}</td>
                                    <td>{{ $request->domesticWorker->first_name }} {{ $request->domesticWorker->last_name }}</td>
                                    <td>{{ ucfirst($request->status) }}</td>
                                    <td>
                                        @if ($request->status == 'pending')
                                            <form method="POST" action="{{ route('admin.requests.approve', $request->id) }}" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.requests.decline', $request->id) }}" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                            </form>
                                        @else
                                            <span>{{ ucfirst($request->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
