<!-- resources/views/admin/disputes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Disputes</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Employer</th>
                                <th>Domestic Worker</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Resolution</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disputes as $dispute)
                                <tr>
                                    <td>{{ $dispute->employer->name }}</td>
                                    <td>{{ $dispute->domesticWorker->first_name }} {{ $dispute->domesticWorker->last_name }}</td>
                                    <td>{{ $dispute->description }}</td>
                                    <td>{{ ucfirst($dispute->status) }}</td>
                                    <td>{{ $dispute->resolution ?? 'N/A' }}</td>
                                    <td>
                                        @if ($dispute->status == 'pending')
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#resolveDisputeModal-{{ $dispute->id }}">
                                                Resolve
                                            </button>

                                            <!-- Resolve Dispute Modal -->
                                            <div class="modal fade" id="resolveDisputeModal-{{ $dispute->id }}" tabindex="-1" role="dialog" aria-labelledby="resolveDisputeModalLabel-{{ $dispute->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="resolveDisputeModalLabel-{{ $dispute->id }}">Resolve Dispute</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="{{ route('admin.disputes.resolve', $dispute->id) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="resolution">Resolution</label>
                                                                    <textarea name="resolution" id="resolution" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            Resolved
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
