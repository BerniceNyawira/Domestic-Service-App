@extends('user.layout')

@section('content')
    <div class="hire-page">
        <h1>Find Domestic Workers</h1>
        <form action="{{ route('employer.find.dw') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for domestic workers..." />
            <button type="submit">Search</button>
        </form>

        <div class="workers-list">
            @foreach ($workers as $worker)
                <div class="worker-card">
                    <img src="{{ $worker->profile_picture }}" alt="Profile Picture">
                    <div class="worker-details">
                        <h3>{{ $worker->name }}</h3>
                        <p>{{ $worker->description }}</p>
                        <a href="{{ route('hire.worker', $worker->id) }}" class="view-profile">View Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
