<!-- Layout Blade with role-based navbar logic (Home hidden for admin) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sovia Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #fff9c4, #f4f4f4, #e8f5e8);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* HEADER */
        .navbar {
            background: linear-gradient(135deg, #fff9c4, #f9ca24, #ff6b35);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(255, 107, 53, 0.2);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(45deg, #ff6b35, #f9ca24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 107, 53, 0.1);
            color: #ff6b35 !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            background: linear-gradient(45deg, #ff6b35, #f9ca24);
            color: white !important;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .search-input {
            background: rgba(255, 255, 255, 0.8) !important;
            border: 1px solid rgba(255, 107, 53, 0.3) !important;
            border-radius: 25px !important;
            color: #333 !important;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #ff6b35 !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25) !important;
        }

        .btn-search {
            background: linear-gradient(45deg, #ff6b35, #f9ca24) !important;
            border: none !important;
            color: white !important;
            border-radius: 25px !important;
            transition: transform 0.3s ease;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            color: white !important;
        }

        .btn-login {
            border: 2px solid #ff6b35 !important;
            color: #ff6b35 !important;
            background: rgba(255, 255, 255, 0.8) !important;
            border-radius: 25px !important;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(45deg, #ff6b35, #f9ca24) !important;
            color: white !important;
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border: 2px solid #ff6b35;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ff6b35' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* CONTENT WRAPPER */
        .content-wrapper {
            flex: 1;
            padding-top: 100px;
            padding-bottom: 80px;
            overflow-y: auto;
        }

        /* FOOTER */
        footer {
            background: linear-gradient(135deg, #fff9c4, #f9ca24, #ff6b35);
            color: #333;
            text-align: center;
            padding: 1.5rem;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 -2px 20px rgba(255, 107, 53, 0.2);
            backdrop-filter: blur(10px);
        }

        footer small {
            font-weight: 500;
            font-size: 0.9rem;
            position: relative;
        }

        footer small::before {
            content: '✨';
            margin-right: 8px;
            animation: sparkle 2s ease-in-out infinite;
        }

        footer small::after {
            content: '✨';
            margin-left: 8px;
            animation: sparkle 2s ease-in-out infinite reverse;
        }

        @keyframes sparkle {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .navbar-nav {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 15px;
                padding: 1rem;
                margin-top: 1rem;
                border: 1px solid rgba(255, 107, 53, 0.2);
            }

            .search-login-wrapper {
                margin-top: 1rem;
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.3rem;
            }

            .content-wrapper {
                padding-top: 90px;
                padding-bottom: 70px;
            }

            footer {
                padding: 1rem;
            }

            footer small {
                font-size: 0.8rem;
            }
        }

        /* SCROLL */
        .content-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        .content-wrapper::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .content-wrapper::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #ff6b35, #f9ca24);
            border-radius: 10px;
        }

        /* Design CSS tetap, tidak diubah sesuai permintaan */
        /* Paste semua CSS asli kamu di sini tanpa perubahan */
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.beranda') }}">
                <i class="fas fa-calendar-check me-2"></i>Event PNP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">

                    {{-- Menu untuk guest atau user biasa --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home.beranda') ? 'active' : '' }}"
                                href="{{ route('home.beranda') }}">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home.homepage') ? 'active' : '' }}"
                                href="{{ route('home.homepage') }}">
                                <i class="fas fa-calendar-alt me-1"></i>Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home.kontak') ? 'active' : '' }}"
                                href="{{ route('home.kontak') }}">
                                <i class="fas fa-envelope me-1"></i>Kontak
                            </a>
                        </li>
                    @endguest

                    @auth
                        @if (!in_array(Auth::user()->role, ['admin', 'super_admin']))
                            {{-- Hanya untuk user biasa --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home.beranda') ? 'active' : '' }}"
                                    href="{{ route('home.beranda') }}">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home.homepage') ? 'active' : '' }}"
                                    href="{{ route('home.homepage') }}">
                                    <i class="fas fa-calendar-alt me-1"></i>Events
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home.kontak') ? 'active' : '' }}"
                                    href="{{ route('home.kontak') }}">
                                    <i class="fas fa-envelope me-1"></i>Kontak
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin')
                            {{-- Admin dan Super Admin hanya bisa lihat menu admin --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.data_events') ? 'active' : '' }}"
                                    href="{{ route('admin.data_events') }}">
                                    <i class="fas fa-database me-1"></i>Data Events
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role === 'super_admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
                                    href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users-cog me-1"></i>Kelola Akun
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <form class="d-flex" action="{{ route('home.homepage') }}" method="GET">
                        <input class="form-control search-input" type="search" name="q"
                            placeholder="Cari event..." value="{{ request('q') }}">
                        <button class="btn btn-search ms-2" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-login">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login.form') }}" class="btn btn-login">
                            <i class="fas fa-user me-1"></i>Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer>
        <small>&copy; {{ date('Y') }} by Soviatul Qhoziyah</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
