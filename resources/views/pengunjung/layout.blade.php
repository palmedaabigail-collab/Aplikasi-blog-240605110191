<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Publik - Inspirasi & Pengetahuan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #d97706 0%, #f59e0b 50%, #fbbf24 100%);
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --accent-color: #fbbf24;
            --slate-dark: #0f172a;
            --slate-medium: #1e293b;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Premium Navbar */
        .navbar {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 2px solid rgba(217, 119, 6, 0.2);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .navbar-brand:hover {
            opacity: 0.9;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            transition: color 0.2s ease;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #fbbf24 !important;
        }

        /* Hero Header */
        .hero-section {
            background: radial-gradient(circle at top right, rgba(217, 119, 6, 0.15) 0%, rgba(15, 23, 42, 0) 60%), linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 90px 0;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(217, 119, 6, 0.1);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        /* Cards styling */
        .card {
            background: var(--card-bg);
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -15px rgba(217, 119, 6, 0.12);
            border-color: rgba(217, 119, 6, 0.25);
        }

        .card-img-top-container {
            position: relative;
            overflow: hidden;
            height: 240px;
            background: #f1f5f9;
        }

        .card-img-top-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .card:hover .card-img-top-container img {
            transform: scale(1.05);
        }

        /* Custom Sidebar style */
        .sidebar {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
            border: 1px solid rgba(15, 23, 42, 0.03);
        }

        .sidebar-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
            position: relative;
        }

        .sidebar-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-gradient);
        }

        /* Categories List styling */
        .category-item {
            border: none;
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: 12px !important;
            font-weight: 500;
            color: var(--text-secondary);
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .category-item:hover, .category-item.active {
            background: var(--primary-gradient);
            color: #0f172a !important;
            font-weight: 600;
            transform: translateX(4px);
        }

        .category-item a {
            color: inherit;
            text-decoration: none;
            display: block;
            width: 100%;
        }

        /* Related posts styling */
        .related-item {
            border: none;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .related-item:last-child {
            border-bottom: none;
        }

        .related-item a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 600;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s ease;
        }

        .related-item a:hover {
            color: #d97706;
        }

        .related-date {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* Button styling */
        .btn-primary {
            background: var(--primary-gradient);
            color: #0f172a !important;
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(217, 119, 6, 0.2);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
            background: linear-gradient(135deg, #b45309 0%, #d97706 100%);
            color: #ffffff !important;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text-secondary);
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            color: var(--text-primary);
        }

        /* Footer styling */
        .footer {
            margin-top: auto;
            background: #0f172a;
            color: #94a3b8;
            border-top: 1px solid #1e293b;
        }

        .footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer a:hover {
            color: #fbbf24;
        }
    </style>
</head>
<body>

    <!-- Premium Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa-solid fa-feather-pointed me-2"></i>InspirasiBlog
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3" href="{{ route('home') }}">Beranda</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
                        <i class="fa-solid fa-lock me-1"></i> Admin Panel
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Yield Hero Section if applicable or display Default -->
    @yield('hero')

    <!-- Main Content -->
    <div class="container mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer py-5 text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold" style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; display: inline-block;">
                        <i class="fa-solid fa-feather-pointed me-2"></i>InspirasiBlog
                    </h5>
                    <p class="small mb-0">Platform publikasi tulisan, opini, berita, dan pengetahuan terkini.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="small">&copy; {{ date('Y') }} InspirasiBlog. Dibuat untuk Tugas UAS Pemrograman Web.</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>