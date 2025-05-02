<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StorageHub - Smart Inventory Management</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
                color: #333;
                line-height: 1.6;
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
            }
            .nav-links a {
                margin-left: 20px;
                text-decoration: none;
                color: #333;
                font-weight: 500;
            }
            .nav-links a:hover {
                color: #4f46e5;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 500;
            }
            .btn-primary {
                background-color: #4f46e5;
                color: white;
            }
            .btn-secondary {
                border: 1px solid #4f46e5;
                color: #4f46e5;
            }
            .hero {
                text-align: center;
                margin-bottom: 60px;
                height: 80dvh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                background: url('') no-repeat center center/cover;
            }
            .hero h1 {
                font-size: 2.5rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .hero p {
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 30px;
            }
            .section {
                margin-bottom: 60px;
            }
            .section-title {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 30px;
                text-align: center;
            }
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-bottom: 60px;
            }
            .feature {
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .feature h3 {
                font-size: 1.3rem;
                font-weight: 600;
                margin-bottom: 15px;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 30px;
                text-align: center;
                margin-bottom: 60px;
            }
            .stat h4 {
                font-size: 2.5rem;
                font-weight: 600;
                color: #4f46e5;
                margin-bottom: 10px;
            }
            .cta {
                text-align: center;
                padding: 40px;
                background-color: #f8fafc;
                border-radius: 8px;
            }
            .cta h2 {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            hr {
                border: 0;
                height: 1px;
                background-color: #e2e8f0;
                margin: 40px 0;
            }
        </style>
    </head>
    <body>
        <section class="header">
            <h1>StorageHub</h1>
            <div class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Log in</a>
                    @endif
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </section>

        <section class="hero">
            <h1>Manage Your Inventory with StorageHub</h1>
            <p>A simple, powerful inventory management system designed to help you track, organize, and optimize your storage.</p>
            <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">View Inventory</a>
            </div>
        </section>

        <hr>

        <section class="section">
            <h2 class="section-title">Key Features</h2>
            
            <div class="features">
                <div class="feature">
                    <h3>Inventory Management</h3>
                    <p>Track all your items in one place. Add, edit, and remove items with ease. Monitor stock levels and get alerts when supplies run low.</p>
                </div>
                
                <div class="feature">
                    <h3>Location Tracking</h3>
                    <p>Organize items by location. Create custom storage areas and quickly find where everything is stored.</p>
                </div>
                
                <div class="feature">
                    <h3>Secure Access</h3>
                    <p>Control who can view and modify your inventory with user accounts and permission settings. Keep your data safe and secure.</p>
                </div>
                
                <div class="feature">
                    <h3>Detailed Reports</h3>
                    <p>Generate comprehensive reports on inventory status, low stock items, and storage utilization. Export data for further analysis.</p>
                </div>
                
                <div class="feature">
                    <h3>Activity Tracking</h3>
                    <p>Monitor all changes to your inventory with a detailed activity log. See who made changes and when they were made.</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h3>Powerful Search</h3>
            <p>Find items instantly with our powerful search functionality. Filter by name, location, or quantity to quickly locate what you need.</p>
        </section>

        <hr>

        <section class="section">
            <h2 class="section-title">Trusted by Businesses</h2>
            
            <div class="stats">
                <div class="stat">
                    <h4>500+</h4>
                    <p>Active Users</p>
                </div>
                
                <div class="stat">
                    <h4>10,000+</h4>
                    <p>Items Tracked</p>
                </div>
                
                <div class="stat">
                    <h4>98%</h4>
                    <p>Customer Satisfaction</p>
                </div>
            </div>
        </section>

        <section class="cta">
            <h2>Ready to Get Started?</h2>
            <p>Take control of your inventory today and streamline your storage management.</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
        </section>
    </body>
</html>