<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIGAP UMKM')</title>

    {{-- Asset utama (Bootstrap, app.js, app.scss via Vite) --}}
    @vite(['resources/js/app.js'])

    {{-- Tempat inject CSS per-halaman --}}
    @stack('styles')
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">SIGAP UMKM</a>

            {{-- Tombol 3 garis (hamburger) untuk mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
                aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu kanan --}}
            <div class="collapse navbar-collapse justify-content-end" id="navMain">
                <ul class="navbar-nav align-items-lg-center">

                    {{-- Dropdown User --}}
                    <li class="nav-item dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            <span class="d-none d-lg-inline">Akun</span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten utama --}}
    <main class="container my-4">
        {{-- area flash message (opsional) --}}
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-top py-3 mt-5">
        <div class="container text-muted small text-center">
            © {{ date('Y') }} All Rights Reserved | SIGAP UMKM
        </div>
    </footer>

    {{-- Tempat inject JS per-halaman --}}
    @stack('scripts')
</body>

</html>
