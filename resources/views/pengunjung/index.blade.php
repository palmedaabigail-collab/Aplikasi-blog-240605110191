@extends('pengunjung.layout')

@section('hero')
<header class="hero-section text-center">
    <div class="container py-3">
        @php
            $activeId = request()->route('id');
            $activeCat = $activeId ? $kategori->firstWhere('id', $activeId) : null;
        @endphp
        @if($activeCat)
            <span class="badge bg-white text-primary rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm">FILTERED BY CATEGORY</span>
            <h1 class="display-4 fw-bold text-white">Kategori: {{ $activeCat->nama_kategori }}</h1>
            <p class="lead text-white-50 fs-5 mb-0">{{ $activeCat->keterangan ?: 'Menampilkan artikel dalam kategori ' . $activeCat->nama_kategori }}</p>
        @else
            <h1 class="display-3 fw-bold text-white">Inspirasi & Pengetahuan</h1>
            <p class="lead text-white-50 fs-5 mb-0">Temukan artikel menarik seputar teknologi, pemrograman, dan dunia web dev.</p>
        @endif
    </div>
</header>
@endsection

@section('content')
<div class="row">
    <!-- Articles List -->
    <div class="col-lg-8 mb-4">
        @forelse($artikel as $a)
            <article class="card mb-4 border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="card-img-top-container h-100" style="min-height: 200px;">
                            @if($a->gambar)
                                <img src="{{ asset($a->gambar) }}" alt="{{ $a->judul }}">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white" style="background: linear-gradient(135deg, #a5b4fc 0%, #c084fc 100%);">
                                    <i class="fa-solid fa-image fa-3x mb-2 opacity-50"></i>
                                    <span class="small opacity-75">No Cover Image</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 d-flex flex-column">
                        <div class="card-body p-4 d-flex flex-column h-100">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                @if($a->kategori)
                                    <a href="{{ route('visitor.kategori', $a->id_kategori) }}" class="badge bg-light text-primary text-decoration-none fw-semibold px-2 py-1.5 border border-primary-subtle">
                                        {{ $a->kategori->nama_kategori }}
                                    </a>
                                @endif
                                <span class="text-muted small">
                                    <i class="fa-regular fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($a->hari_tanggal)->translatedFormat('d M Y') }}
                                </span>
                            </div>

                            <h3 class="h4 fw-bold mb-2">
                                <a href="{{ route('visitor.detail', $a->id) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $a->judul }}
                                </a>
                            </h3>

                            <p class="text-muted small mb-4 flex-grow-1">
                                {{ Str::limit(strip_tags($a->isi), 120) }}
                            </p>

                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top border-light">
                                <div class="d-flex align-items-center gap-2">
                                    @if($a->penulis && $a->penulis->foto)
                                        <img src="{{ asset($a->penulis->foto) }}" alt="{{ $a->penulis->user_name }}" class="rounded-circle object-fit-cover border" width="36" height="36">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; font-size: 12px; font-weight: bold;">
                                            {{ strtoupper(substr($a->penulis->nama_depan ?? 'A', 0, 1)) }}{{ strtoupper(substr($a->penulis->nama_belakang ?? 'N', 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="lh-sm">
                                        <div class="fw-semibold text-dark small">{{ $a->penulis ? $a->penulis->nama_depan . ' ' . $a->penulis->nama_belakang : 'Anonim' }}</div>
                                        <div class="text-muted" style="font-size: 10px;">Penulis</div>
                                    </div>
                                </div>

                                <a href="{{ route('visitor.detail', $a->id) }}" class="btn btn-primary btn-sm px-3 rounded-pill fw-semibold">
                                    Kelanjutannya <i class="fa-solid fa-arrow-right-long ms-1 small"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <div class="card p-5 text-center shadow-sm border-0">
                <div class="card-body">
                    <i class="fa-regular fa-folder-open fa-3x mb-3 text-muted opacity-50"></i>
                    <h4 class="fw-bold">Belum ada artikel</h4>
                    <p class="text-muted">Tidak ditemukan artikel dalam kategori atau filter ini.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm rounded-pill mt-2">Kembali ke Beranda</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Sidebar Categories -->
    <div class="col-lg-4">
        <div class="sidebar position-sticky" style="top: 100px;">
            <h4 class="sidebar-title">Kategori Artikel</h4>
            <div class="list-group">
                <a href="{{ route('home') }}" class="list-group-item category-item {{ !request()->route('id') ? 'active' : '' }}">
                    Semua Kategori
                </a>
                @foreach($kategori as $k)
                    <a href="{{ route('visitor.kategori', $k->id) }}" class="list-group-item category-item {{ request()->route('id') == $k->id ? 'active' : '' }}">
                        {{ $k->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection