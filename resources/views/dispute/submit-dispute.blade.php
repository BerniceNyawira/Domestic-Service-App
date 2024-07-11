@extends('dispute.layout')

@section('content')
    <div class="dispute-resolution">
        <h1>Submit a Dispute</h1>
        <form action="{{ route('dispute.submit') }}" method="POST" class="dispute-form">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>
            <button type="submit">Submit Dispute</button>
        </form>
    </div>
@endsection