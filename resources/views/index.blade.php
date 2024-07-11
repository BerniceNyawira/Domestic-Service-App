<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mbali Nhlapo Domestic Services</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Navigation Panel -->
    <nav>
        <div class="logo">
            <img src="/images/MNDS Logo.png" alt="Company Logo">
        </div>
        <div class="welcome-banner">
            <h1>Mbali Nhlapo Domestic Services</h1>
            <p><em>Connecting employers and domestic workers</em></p>
        </div>
        <ul class="navigation-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Hire</a></li>
            <li><a href="{{ route('dispute.create') }}">Dispute Resolution</a></li>
            <li><a href="{{ route('register.newuser') }}">Sign Up</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content">
        <h2>Welcome to Mbali Nhlapo Domestic Services!</h2>
        <p>We are dedicated to providing a seamless platform for connecting employers and domestic workers. Here's what
            you can do on our website:</p>
        <section class="features">
            <div class="feature">
                <h3>Find Domestic Workers</h3>
                <p>Explore domestic workers based on your specific needs and preferences.</p>
            </div>
            <div class="feature">
                <h3>Request Workers</h3>
                <p>Request domestic workers of your choice and await approval once terms & conditions are met.</p>
            </div>
            <div class="feature">
                <h3>Manage Disputes</h3>
                <p>Our dispute resolution mechanism ensures fair resolution of any issues that may arise.</p>
            </div>
        </section>
    </div>


    <!-- How It Works Section -->
    <section class="how-it-works">
        <h2>How It Works</h2>
        <ol>
            <li>
                <p> Step 1: Explore domestic workers based on your needs</p>
            </li>
            <li>
                <p> Step 2: View their profiles and make decisions</p>
            </li>
            <li>
                <p> Step 3: Request domestic worker of choice</p>
            </li>
            <li>
                <p> Step 4: Await approval and get notified</p>
            </li>
            <li>
                <p> Step 5: Get started once terms and conditions are met</p>
            </li>
        </ol>

        <div class="how-it-works-button">
            <a href="{{ route('register.newuser') }}">Sign Up to Get Started Today!</a>
        </div>
    </section>

    <!-- Terms and Conditions -->
    <section class="terms-conditions">
        <h2>Terms & Conditions</h2>
        <p>By using our platform, you agree to the following terms and conditions:</p>
        <ul>
            <li><strong>User Agreement:</strong> Both employers and domestic workers must adhere to our user
                agreement, which includes respectful communication, timely payments, and compliance with all
                relevant labor laws.</li>
            <li><strong>Approval Process:</strong> Requests for domestic workers are subject to approval. Both
                parties must agree to the terms before proceeding with the engagement.</li>
            <li><strong>Dispute Resolution:</strong> Any disputes that arise will be managed through our dispute
                resolution mechanism. Both parties are expected to participate in good faith to resolve issues.</li>
            <li><strong>Termination:</strong> We reserve the right to terminate accounts that violate our terms and
                conditions or engage in any form of misconduct.</li>
        </ul>
    </section>


    <!-- Footer Section -->
    <footer>
        <div class="logo">
            <img src="/images/MNDS Logo.png" alt="Company Logo">
        </div>

        <h2>Contact Us</h2>
        <div class="contact-info">
            <div class="contact-item">
                <i class="fa fa-map-marker"></i>
                <p>Nairobi, Kenya</p>
            </div>
            <div class="contact-item">
                <i class="fa fa-phone"></i>
                <p>+254 700 000 000</p>
            </div>
            <div class="contact-item">
                <i class="fa fa-envelope"></i>
                <p>mndomesticservices@gmail.com</p>
            </div>
        </div>

        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="/send-message" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Mbali Nhlapo Domestic Services. All rights reserved.</p>
        </div>

    </footer>
</body>

</html>
