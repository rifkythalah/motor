<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MotoRen - Sewa Motor Praktis dan Nyaman</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.1-web/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('css/user/styles.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .custom-font { font-family: 'Lobster', cursive; font-size: 24px; font-weight: bold; color: white; }
    </style>
</head>
<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container px-5">
            <a class="navbar-brand custom-font" href="{{ route('pengguna.index') }}">MotoRen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.index') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.about') }}">About</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.faq') }}">FAQ</a></li>
    @if(!session('user'))
        <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.register') }}">Register</a></li>
    @else
        <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.riwayat') }}">Riwayat</a></li>
        <li class="nav-item"><span class="nav-link">{{ session('user.data.name') }}</span></li>
        <li class="nav-item">
            <form action="{{ route('pengguna.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer;">Logout</button>
            </form>
        </li>
    @endif
</ul>
            </div>
        </div>
    </nav>
    <main class="flex-shrink-0">
        @yield('content')
    </main>
    <footer class="py-4 mt-auto bg-primary">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="text-white small">&copy; MotoRen 2024</div></div>
                <div class="col-auto">
                    <a class="mx-1 link-light small" href="#"><i class="bi bi-whatsapp"></i></a>
                    <a class="mx-1 link-light small" href="#"><i class="bi bi-instagram"></i></a>
                    <a class="mx-1 link-light small" href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>