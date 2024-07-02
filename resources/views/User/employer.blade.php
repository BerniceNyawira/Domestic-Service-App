@extends('User.layout')

@section('content')
    <!-- Main Content-->
        <div class="main-content">
            <h2>Employer Dashboard</h2>
            <!-- Menu Section -->
            <div id="menu-section" class="menu-section hidden">
                <div class="menu-item">
                    <a href="{{ route('employer.update.profile') }}">
                        <div class="circle">Update Profile</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('employer.find.dw') }}">
                        <div class="circle">Search for a Domestic Worker</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('employer.view.partnerships') }}">
                        <div class="circle">View Partnerships</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('employer.report.disputes') }}">
                        <div class="circle">Report Disputes</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('employer.pending.requests') }}">
                        <div class="circle">Pending Requests</div>
                    </a>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
            document.getElementById('menu-section').classList.toggle('hidden');
        });
    </script>

@endsection