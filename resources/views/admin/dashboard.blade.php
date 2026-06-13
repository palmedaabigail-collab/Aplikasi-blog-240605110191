@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card p-5 text-white shadow-sm border-0" style="background: radial-gradient(circle at top right, rgba(251, 191, 36, 0.15) 0%, rgba(15, 23, 42, 0) 60%), linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: 20px;">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-2">Selamat Datang di Panel Admin</h1>
                    <p class="lead mb-0 opacity-75">Kelola artikel, kategori, dan informasi penulis blog Anda secara mudah dan efisien.</p>
                </div>
                <div class="col-md-4 text-end d-none d-md-block">
                    <i class="fa-solid fa-feather-pointed fa-5x text-warning opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card border-0 h-100 shadow-sm p-4" style="background: white;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted fw-semibold mb-2">TOTAL ARTIKEL</h6>
                    <h2 class="display-6 fw-bold mb-0 text-dark">{{ $totalArtikel }}</h2>
                </div>
                <div class="rounded-circle text-warning d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); font-size: 24px;">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-top border-light">
                <a href="{{ route('admin.artikel.index') }}" class="text-decoration-none fw-semibold text-warning small">
                    Kelola Artikel <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 h-100 shadow-sm p-4" style="background: white;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted fw-semibold mb-2">TOTAL KATEGORI</h6>
                    <h2 class="display-6 fw-bold mb-0 text-dark">{{ $totalKategori }}</h2>
                </div>
                <div class="rounded-circle text-warning d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); font-size: 24px;">
                    <i class="fa-solid fa-tags"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-top border-light">
                <a href="{{ route('admin.kategori.index') }}" class="text-decoration-none fw-semibold text-warning small">
                    Kelola Kategori <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 h-100 shadow-sm p-4" style="background: white;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted fw-semibold mb-2">TOTAL PENULIS</h6>
                    <h2 class="display-6 fw-bold mb-0 text-dark">{{ $totalPenulis }}</h2>
                </div>
                <div class="rounded-circle text-warning d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); font-size: 24px;">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-top border-light">
                <a href="{{ route('admin.penulis.index') }}" class="text-decoration-none fw-semibold text-warning small">
                    Kelola Penulis <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold mb-4 text-dark"><i class="fa-solid fa-bolt me-2 text-warning"></i> Tindakan Cepat</h5>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('admin.artikel.create') }}" class="btn btn-warning px-4 py-2.5 rounded-pill fw-semibold shadow-sm" style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); border: none;">
                    <i class="fa-solid fa-plus me-1"></i> Tulis Artikel Baru
                </a>
                <a href="{{ route('admin.kategori.create') }}" class="btn btn-outline-dark px-4 py-2.5 rounded-pill fw-semibold">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Kategori
                </a>
                <a href="{{ route('admin.penulis.create') }}" class="btn btn-outline-dark px-4 py-2.5 rounded-pill fw-semibold">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Penulis
                </a>
            </div>
        </div>
    </div>
</div>
@endsection