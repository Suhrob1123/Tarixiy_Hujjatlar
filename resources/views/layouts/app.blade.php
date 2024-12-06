<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tarixiy Hujjatlar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-link:hover {
            transform: scale(1.1);
            color: #007bff !important;
        }

        .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link.active, .navbar-brand {
            font-weight: bold;
        }

        .navbar-brand {
            color: #343a40;
        }

        .nav-item a.nav-link.admin-link {
            color: #0d6efd;
            font-weight: 800;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                text-shadow: 0 0 5px #0d6efd, 0 0 10px #0d6efd;
            }
            100% {
                text-shadow: 0 0 10px #0d6efd, 0 0 20px #0d6efd;
            }
        }

        .nav-item a.hujjat-btn {
            border: 2px solid #0d6efd;
            padding: 5px 15px;
            border-radius: 5px;
            color: #fff !important;
            background-color: #007bff;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .nav-item a.hujjat-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .nav-item a.chiqish {
            font-size: 0.8rem;
            color: #dc3545 !important;
        }

        .nav-item a.chiqish:hover {
            color: #bd2130 !important;
        }

        .brand-tarixiy {
        font-family: 'Georgia', serif;
        font-size: 2rem;
        font-weight: bold;
        color: #a0522d; /* Sarg‘ish-qizg‘ish rang */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        transform: rotate(-2deg);
        display: inline-block;
        }

        
        .brand-hujjatlar {
            font-family: 'Georgia', serif;
            font-size: 2rem;
            font-weight: bold;
            color: #a0522d; /* Sarg‘ish-qizg‘ish rang */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transform: rotate(2deg);
            display: inline-block;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><span class="brand-tarixiy">Tarixiy</span> <span class="brand-hujjatlar">Hujjatlar</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Bosh Sahifa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.category', 'rasmiy') }}">Rasmiy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.category', 'shaxsiy') }}">Shaxsiy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.category', 'harbiy') }}">Harbiy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.category', 'diniy') }}">Diniy</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link admin-link" href="{{ route('admin') }}">Admin Panel</a>
                        </li>
                    @endrole
                    <li class="nav-item">
                        <a class="nav-link hujjat-btn" href="{{ route('documents.create') }}">Hujjat Yuklash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link chiqish" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Chiqish</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Kirish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Ro‘yxatdan o‘tish</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
