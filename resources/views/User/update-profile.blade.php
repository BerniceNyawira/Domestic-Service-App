@extends('User.layout')

@section('content')
    <h2>Update Profile</h2>
    <p> Make changes to your profile information.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('employer.update.profile') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" id="f_name" value="{{ old('f_name', $employer->f_name) }}" required>
            @error('f_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" id="l_name" value="{{ old('l_name', $employer->l_name ) }}" required>
            @error('l_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $employer->address) }}" required>
            @error('address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $employer->date_of_birth) }}" required>
            @error('date_of_birth')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="telephone_no">Telephone Number</label>
            <input type="text" name="telephone_no" id="telephone_no" value="{{ old('telephone_no', $employer->telephone_no) }}" required>
            @error('telephone_no')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender', $employer->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $employer->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="size_of_homestead">Size of Homestead</label>
            <input type="text" name="size_of_homestead" id="size_of_homestead" value="{{ old('size_of_homestead', $employer->size_of_homestead) }}" required>
            @error('size_of_homestead')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="married">Married</label>
            <select name="married" id="married" required>
                <option value="">Select Marital Status</option>
                <option value="Married" {{ old('married', $employer->married) == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Not married" {{ old('married', $employer->married) == 'Not Married' ? 'selected' : '' }}>Not Married</option>
            </select>
            @error('married')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="children">Number of Children</label>
            <input type="number" name="children" id="children" value="{{ old('children', $employer->children) }}">
            @error('children')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="ages_of_children">Ages of Children</label>
            <input type="text" name="ages_of_children" id="ages_of_children" value="{{ old('ages_of_children', $employer->ages_of_children) }}">
            @error('ages_of_children')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="preferred_skills">Preferred Skills of Domestic Workers</label>
            <input type="text" name="preferred_skills" id="preferred_skills" value="{{ old('preferred_skills', $employer->preferred_skills) }}">
            @error('preferred_skills')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
</div>
@endsection