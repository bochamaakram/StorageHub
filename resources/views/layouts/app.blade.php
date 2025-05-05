<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Management System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #4f46e5;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #5751c3;
        }

        .sidebar .navbar-brand {
            font-size: 1.2rem;
            padding: 0 20px 10px;
            font-weight: bold;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            overflow-y: auto;
            transition: all 0.3s ease-in-out;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="navbar-brand mb-4">
                <i class="fas fa-boxes me-2"></i>Storage
            </div>

            @auth
                <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('products.index') }}"><i class="fas fa-box-open me-2"></i>Products</a>
                <a href="{{ route('storage-areas.index') }}"><i class="fas fa-warehouse me-2"></i>Storage Areas</a>
                <a href="{{ route('availability.index') }}"><i class="fas fa-search me-2"></i>Check Availability</a>
            @endauth

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus me-2"></i>Register</a>
                @endif
            @endguest
        </div>

        <!-- Bottom User Dropdown -->
        @auth
        <div class="dropdown px-3 pb-3">
            <a class="dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item text-black" href="{{ route('profile.show') }}"><i class="fas fa-user me-1"></i>Profile</a></li>
                @if(Auth::user()->is_admin)
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-cog me-1"></i>Admin Panel</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-1"></i>Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Success Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Status Messages -->
        @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-dismiss alerts after 5 seconds
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(alert => {
                    new bootstrap.Alert(alert).close();
                });
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>
