<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StorageHub - Smart Inventory Management</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <style>
            :root {
                --primary-color: #4f46e5;
                --primary-dark: #4338ca;
                --primary-light: #e0e7ff;
                --secondary-color: #2d3748;
                --accent-color: #6366f1;
                --light-color: #f8f9fa;
                --dark-color: #212529;
                --success-color: #10b981;
                --danger-color: #ef4444;
                --warning-color: #f59e0b;
                --info-color: #3b82f6;
                --gray-100: #f8f9fa;
                --gray-200: #e9ecef;
                --gray-300: #dee2e6;
                --gray-400: #ced4da;
                --gray-500: #adb5bd;
                --gray-600: #6c757d;
                --gray-700: #495057;
                --gray-800: #343a40;
                --gray-900: #212529;
                --transition-fast: 0.3s;
                --transition-medium: 0.5s;
                --transition-slow: 0.8s;
                --border-radius-sm: 0.25rem;
                --border-radius: 0.5rem;
                --border-radius-lg: 1rem;
                --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                --box-shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.1);
                --box-shadow-lg: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            body {
                font-family: 'Instrument Sans', 'Poppins', sans-serif;
                color: var(--gray-800);
                line-height: 1.6;
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }

            h1, h2, h3, h4, h5, h6 {
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
            }

            /* Navbar Styles */
            .navbar {
                padding: 1rem 2rem;
                background-color: rgba(255, 255, 255, 0.6);
                backdrop-filter: blur(100px);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                transition: all var(--transition-fast);
            }

            .navbar.scrolled {
                padding: 0.75rem 2rem;
                background-color: rgba(255, 255, 255, 0.98) !important;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand {
                font-family: 'Montserrat', sans-serif;
                font-weight: 800;
                font-size: 1.75rem;
                color: var(--primary-color) !important;
                letter-spacing: -0.5px;
            }

            .navbar-brand span {
                color: var(--secondary-color);
            }

            .nav-link {
                font-weight: 500;
                color: var(--gray-700) !important;
                margin: 0 0.5rem;
                position: relative;
                transition: all var(--transition-fast);
            }

            .nav-link:hover {
                color: var(--primary-color) !important;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: 0;
                left: 0;
                background-color: var(--primary-color);
                transition: width var(--transition-fast);
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .nav-link.active {
                color: var(--primary-color) !important;
                font-weight: 600;
            }

            .nav-link.active::after {
                width: 100%;
            }

            .navbar-toggler {
                border: none;
                padding: 0.5rem;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }

            /* Hero Section */
            .hero-section {
                position: relative;
                min-height: 100vh;
                display: flex;
                align-items: center;
                color: white;
                overflow: hidden;
                background:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url("{{ asset('storage.jpg') }}") no-repeat center center/cover;
            }

            .hero-content {
                position: relative;
                z-index: 2;
                text-align: center;
                max-width: 800px;
                margin: 0 auto;
                padding: 2rem;
                transform: translateY(30px);
                opacity: 0;
                transition: all var(--transition-slow) ease;
            }

            .hero-content.active {
                transform: translateY(0);
                opacity: 1;
            }

            .hero-title {
                font-size: 3.5rem;
                font-weight: 800;
                margin-bottom: 1.5rem;
                line-height: 1.2;
                text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }

            .hero-subtitle {
                font-size: 1.25rem;
                margin-bottom: 2rem;
                opacity: 0.9;
                line-height: 1.6;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                padding: 0.75rem 2rem;
                font-weight: 600;
                border-radius: var(--border-radius);
                transition: all var(--transition-fast);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                position: relative;
                overflow: hidden;
                z-index: 1;
                text-decoration: none;
                margin: 0 0.5rem;
            }

            .btn-primary {
                background-color: var(--primary-color);
                color: white;
                border: 2px solid var(--primary-color);
            }

            .btn-secondary {
                background-color: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.5);
            }

            .btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 0;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.2);
                transition: all 0.5s;
                z-index: -1;
            }

            .btn:hover::before {
                width: 100%;
            }

            .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            }

            .btn-primary:hover {
                background-color: var(--primary-dark);
                border-color: var(--primary-dark);
            }

            .btn-secondary:hover {
                background-color: rgba(255, 255, 255, 0.1);
                border-color: white;
            }

            .btn:active {
                transform: translateY(0);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            /* Section Styles */
            .section {
                padding: 5rem 0;
                position: relative;
            }

            .section-title {
                position: relative;
                margin-bottom: 3rem;
                font-weight: 700;
                text-align: center;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: -15px;
                left: 50%;
                transform: translateX(-50%);
                width: 80px;
                height: 3px;
                background-color: var(--primary-color);
                border-radius: 3px;
            }

            /* Features Section */
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-bottom: 60px;
            }

            .feature-card {
                text-align: center;
                padding: 2rem;
                border-radius: var(--border-radius);
                background-color: white;
                box-shadow: var(--box-shadow);
                transition: all var(--transition-fast);
                position: relative;
                z-index: 1;
                overflow: hidden;
                height: 100%;
            }

            .feature-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 0;
                background-color: var(--primary-light);
                transition: all var(--transition-medium);
                z-index: -1;
            }

            .feature-card:hover::before {
                height: 100%;
            }

            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: var(--box-shadow-hover);
            }

            .feature-icon {
                width: 80px;
                height: 80px;
                margin: 0 auto 1.5rem;
                background-color: var(--primary-light);
                color: var(--primary-color);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                transition: all var(--transition-fast);
            }

            .feature-card:hover .feature-icon {
                background-color: var(--primary-color);
                color: white;
                transform: rotateY(360deg);
            }

            .feature-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--gray-800);
            }

            .feature-description {
                font-size: 0.9rem;
                color: var(--gray-600);
                line-height: 1.6;
            }

            /* Stats Section */
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 30px;
                text-align: center;
                margin-bottom: 60px;
            }

            .stat-card {
                background-color: white;
                padding: 2rem;
                border-radius: var(--border-radius);
                box-shadow: var(--box-shadow);
                transition: all var(--transition-fast);
            }

            .stat-card:hover {
                transform: translateY(-10px);
                box-shadow: var(--box-shadow-hover);
            }

            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 0.5rem;
                transition: all var(--transition-fast);
            }

            .stat-card:hover .stat-number {
                transform: scale(1.1);
            }

            .stat-label {
                font-size: 1rem;
                color: var(--gray-600);
            }

            /* CTA Section */
            .cta-section {
                text-align: center;
                padding: 4rem 0;
                background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
                color: white;
                position: relative;
                overflow: hidden;
            }

            .cta-section::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(rgba(255, 255, 255, 0.1), transparent);
                transform: rotate(30deg);
            }

            .cta-content {
                position: relative;
                z-index: 1;
                max-width: 700px;
                margin: 0 auto;
            }

            .cta-title {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .cta-description {
                font-size: 1.1rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }

            /* Divider */
            .divider {
                border: 0;
                height: 1px;
                background-color: var(--gray-200);
                margin: 2rem 0;
            }

            /* Back to Top Button */
            .back-to-top {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background-color: var(--primary-color);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.25rem;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                opacity: 0;
                visibility: hidden;
                transition: all var(--transition-fast);
                z-index: 999;
            }

            .back-to-top.active {
                opacity: 1;
                visibility: visible;
            }

            .back-to-top:hover {
                background-color: var(--primary-dark);
                transform: translateY(-5px);
            }

            /* Responsive Styles */
            @media (max-width: 1199.98px) {
                .hero-title {
                    font-size: 3rem;
                }
            }

            @media (max-width: 991.98px) {
                .hero-title {
                    font-size: 2.5rem;
                }

                .hero-subtitle {
                    font-size: 1.1rem;
                }

                .section-title {
                    font-size: 2rem;
                }
            }

            @media (max-width: 767.98px) {
                .hero-section {
                    text-align: center;
                }

                .hero-title {
                    font-size: 2.2rem;
                }

                .btn {
                    display: block;
                    width: 100%;
                    max-width: 250px;
                    margin: 0.5rem auto;
                }

                .feature-card {
                    max-width: 320px;
                    margin-left: auto;
                    margin-right: auto;
                }
            }

            @media (max-width: 575.98px) {
                .hero-title {
                    font-size: 2rem;
                }

                .hero-subtitle {
                    font-size: 1rem;
                }

                .section-title {
                    font-size: 1.75rem;
                }
            }

            /* Animation Classes */
            .fade-up {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .fade-up.active {
                opacity: 1;
                transform: translateY(0);
            }

            .fade-in {
                opacity: 0;
                transition: opacity 0.8s ease;
            }

            .fade-in.active {
                opacity: 1;
            }

            .zoom-in {
                opacity: 0;
                transform: scale(0.9);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .zoom-in.active {
                opacity: 1;
                transform: scale(1);
            }

            .slide-right {
                opacity: 0;
                transform: translateX(-30px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .slide-right.active {
                opacity: 1;
                transform: translateX(0);
            }

            .slide-left {
                opacity: 0;
                transform: translateX(30px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .slide-left.active {
                opacity: 1;
                transform: translateX(0);
            }

            /* Staggered Animation Delays */
            .delay-1 {
                transition-delay: 0.1s;
            }

            .delay-2 {
                transition-delay: 0.2s;
            }

            .delay-3 {
                transition-delay: 0.3s;
            }

            .delay-4 {
                transition-delay: 0.4s;
            }

            .delay-5 {
                transition-delay: 0.5s;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">StorageHub</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content fade-up">
                    <h1 class="hero-title">Manage Your Inventory with StorageHub</h1>
                    <p class="hero-subtitle">A simple, powerful inventory management system designed to help you track, organize, and optimize your storage.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">View Inventory</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="section">
            <div class="container">
                <h2 class="section-title fade-up">Key Features</h2>

                <div class="features">
                    <div class="feature-card fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h3 class="feature-title">Inventory Management</h3>
                        <p class="feature-description">Track all your items in one place. Add, edit, and remove items with ease. Monitor stock levels and get alerts when supplies run low.</p>
                    </div>

                    <div class="feature-card fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="feature-title">Location Tracking</h3>
                        <p class="feature-description">Organize items by location. Create custom storage areas and quickly find where everything is stored.</p>
                    </div>

                    <div class="feature-card fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="feature-title">Secure Access</h3>
                        <p class="feature-description">Control who can view and modify your inventory with user accounts and permission settings. Keep your data safe and secure.</p>
                    </div>

                    <div class="feature-card fade-up" data-aos-delay="400">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="feature-title">Detailed Reports</h3>
                        <p class="feature-description">Generate comprehensive reports on inventory status, low stock items, and storage utilization. Export data for further analysis.</p>
                    </div>

                    <div class="feature-card fade-up" data-aos-delay="500">
                        <div class="feature-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3 class="feature-title">Activity Tracking</h3>
                        <p class="feature-description">Monitor all changes to your inventory with a detailed activity log. See who made changes and when they were made.</p>
                    </div>

                    <div class="feature-card fade-up" data-aos-delay="600">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="feature-title">Powerful Search</h3>
                        <p class="feature-description">Find items instantly with our powerful search functionality. Filter by name, location, or quantity to quickly locate what you need.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="section bg-light">
            <div class="container">
                <h2 class="section-title fade-up">Trusted by Businesses</h2>

                <div class="stats">
                    <div class="stat-card fade-up" data-aos-delay="100">
                        <h4 class="stat-number">500+</h4>
                        <p class="stat-label">Active Users</p>
                    </div>

                    <div class="stat-card fade-up" data-aos-delay="200">
                        <h4 class="stat-number">10,000+</h4>
                        <p class="stat-label">Items Tracked</p>
                    </div>

                    <div class="stat-card fade-up" data-aos-delay="300">
                        <h4 class="stat-number">98%</h4>
                        <p class="stat-label">Customer Satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content fade-up">
                    <h2 class="cta-title">Ready to Get Started?</h2>
                    <p class="cta-description">Take control of your inventory today and streamline your storage management.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer text-center bg-dark text-white py-4">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mb-3">StorageHub</h3>
                        <p>© {{ date('Y') }} StorageHub. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Back to Top Button -->
        <a href="#" class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });

            // Navbar Scroll Effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Back to Top Button
            const backToTopButton = document.getElementById('backToTop');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('active');
                } else {
                    backToTopButton.classList.remove('active');
                }
            });

            backToTopButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Activate hero content animation
            document.addEventListener('DOMContentLoaded', function() {
                const heroContent = document.querySelector('.hero-content');
                setTimeout(() => {
                    heroContent.classList.add('active');
                }, 300);
            });

            // Custom Animation for Elements
            const animateElements = document.querySelectorAll('.fade-up, .fade-in, .zoom-in, .slide-right, .slide-left');

            function checkIfInView() {
                animateElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;

                    if (elementTop < windowHeight - 100) {
                        element.classList.add('active');
                    }
                });
            }

            checkIfInView();

            window.addEventListener('scroll', checkIfInView);
        </script>
    </body>
</html>
