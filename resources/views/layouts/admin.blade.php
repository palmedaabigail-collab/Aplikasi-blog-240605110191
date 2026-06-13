<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Administrator - Blog CMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #0f172a !important;
            border-bottom: 2px solid rgba(217, 119, 6, 0.25);
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.75) !important;
            transition: all 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #fbbf24 !important;
        }
        .card {
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 20px 35px -10px rgba(217, 119, 6, 0.06);
            border-color: rgba(217, 119, 6, 0.15);
        }
        .footer {
            margin-top: auto;
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <span class="text-white">CMS</span><span style="color: #fbbf24;">Admin</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-chart-line me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.penulis.*') ? 'active' : '' }}" href="{{ route('admin.penulis.index') }}">
                            <i class="fa-solid fa-users me-1"></i> Penulis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.kategori.*') ? 'active' : '' }}" href="{{ route('admin.kategori.index') }}">
                            <i class="fa-solid fa-tags me-1"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.artikel.*') ? 'active' : '' }}" href="{{ route('admin.artikel.index') }}">
                            <i class="fa-solid fa-newspaper me-1"></i> Artikel
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('home') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold" target="_blank">
                        <i class="fa-solid fa-globe me-1"></i> Lihat Website
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4" role="alert">
                <div class="d-flex align-items-center">
                    <div>
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 border-start border-danger border-4" role="alert">
                <div class="d-flex align-items-center">
                    <div>
                        <strong>Gagal!</strong> {{ session('error') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="footer py-3 text-center">
        <div class="container">
            <span class="text-muted small">&copy; {{ date('Y') }} CMS Administrator - Sistem Manajemen Blog. All rights reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
