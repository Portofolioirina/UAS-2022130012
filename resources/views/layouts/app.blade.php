<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (untuk ikon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Navbar Custom Styles */
        .navbar {
            background: linear-gradient(45deg, #007bff, #0056b3); /* Gradasi warna navbar */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan pada navbar */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white !important; /* Warna teks putih */
            font-weight: 600; /* Memberikan ketebalan font */
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ffc107 !important; /* Mengubah warna teks saat hover */
            background-color: rgba(255, 193, 7, 0.2); /* Efek hover dengan latar belakang cerah */
            border-radius: 5px;
        }

        .navbar-nav .nav-item .nav-link.active {
            font-weight: bold;
            color: #ffc107 !important; /* Warna teks aktif */
        }

        .navbar-toggler {
            border-color: #ffc107; /* Mengubah warna border tombol burger */
        }

        .navbar-toggler-icon {
            background-color: #ffc107; /* Mengubah warna ikon burger */
        }

        .dropdown-menu {
            background-color: #0056b3;
        }

        .dropdown-item {
            color: white !important; /* Warna teks dropdown */
        }

        .dropdown-item:hover {
            color: #007bff !important; /* Warna teks saat hover */
            background-color: #ffc107 !important; /* Background saat hover */
        }

        /* Menambahkan animasi saat hover pada navbar item */
        .navbar-nav .nav-item {
            transition: transform 0.3s ease;
        }

        .navbar-nav .nav-item:hover {
            transform: scale(1.1);
        }

        /* Mobile View Custom */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('movie.index') }}">
                                <i class="fas fa-film"></i> Movies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bioskop.index') }}">
                                <i class="fas fa-theater-masks"></i> Bioskop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showtime.index') }}">
                                <i class="fas fa-clock"></i> Showtime
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('booking.index') }}">
                                <i class="fas fa-ticket-alt"></i> Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seat.index') }}">
                                <i class="fas fa-chair"></i> Seat
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (untuk carousel dan komponen lainnya) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
