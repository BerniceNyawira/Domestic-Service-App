<!-- resources/views/admin/relationships/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Existing Relationships</div>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($relationships as $relationship)
                                <tr>
                                    <td>{{ $relationship->employer->name }}</td>
                                    <td>{{ $relationship->domesticWorker->first_name }} {{ $relationship->domesticWorker->last_name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.relationships.terminate', $relationship->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Terminate</button>
                                        </form>
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
