<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- Navigation Panel -->
    <nav>
        <div class="logo">
            <img src="/images/MNDS Logo.png" alt="Company Logo">
        </div>
        <div class="welcome-banner">
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <p><em>Mbali Nhlapo Domestic Services</em></p>
        </div>
        <ul class="navigation-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li>
                <form id = "logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Contact Information Column -->
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p><strong>Phone:</strong> +254 700 000 000 </p>
            <p><strong>Address:</strong> Nairobi, Kenya </p>
            <p><strong>Email:</strong> mndomesticservices@gmail.com</p>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Mbali Nhlapo Domestic Services. All rights reserved.</p>
        </div>
    </footer>

    @yield('scripts')
</body>

</html>