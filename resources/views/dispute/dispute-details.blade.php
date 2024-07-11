@extends('dispute.layout')

@section('content')
    <div class="dispute-details">
        <h1>Dispute Details</h1>
        <div class="dispute-info">
            <p><strong>Subject:</strong> {{ $dispute->subject }}</p>
            <p><strong>Description:</strong> {{ $dispute->description }}</p>
            <p><strong>Status:</strong> {{ ucfirst($dispute->status) }}</p>
        </div>
        <div class="dispute-resolutions">
            <h2>Resolutions</h2>
            @if($resolutions->count())
                <ul>
                    @foreach($resolutions as $resolution)
                        <li>{{ $resolution->resolution_description }}</li>
                    @endforeach
                </ul>
            @else
                <p>No resolutions yet.</p>
            @endif
        </div>
    </div>
@endsection
