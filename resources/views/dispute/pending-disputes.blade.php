@extends('dispute.layout')

@section('content')
    <div class="pending-disputes">
        <h1>Pending Disputes</h1>
        @if($disputes->isEmpty())
            <p>No pending disputes at the moment.</p>
        @else
            <ul class="dispute-list">
                @foreach($disputes as $dispute)
                    <li>
                        <a href="{{ route('dispute.details', $dispute->id) }}">
                            <strong>{{ $dispute->subject }}</strong>
                            <p>{{ Str::limit($dispute->description, 50) }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
