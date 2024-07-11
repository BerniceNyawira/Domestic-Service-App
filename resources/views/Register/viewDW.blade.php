<!-- resources/views/admin/domestic_workers/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Domestic Workers</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Skills</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domesticWorkers as $worker)
                                <tr>
                                    <td>{{ $worker->first_name }} {{ $worker->last_name }}</td>
                                    <td>{{ $worker->skills }}</td>
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
