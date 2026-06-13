@extends('pengunjung.layout')

@section('hero')
<header class="hero-section text-center">
    <div class="container py-3">
        @php
            $activeId = request()->route('id');
            $activeCat = $activeId ? $kategori->firstWhere('id', $activeId) : null;
        @endphp
        @if($activeCat)
            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm">KATEGORI FILTRASI</span>
            <h1 class="display-4 fw-bold text-white">Kategori: <span style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $activeCat->nama_kategori }}</span></h1>
            <p class="lead text-white-50 fs-5 mb-0">{{ $activeCat->keterangan ?: 'Menampilkan artikel dalam kategori ' . $activeCat->nama_kategori }}</p>
        @elseif(request('search'))
            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm">PENCARIAN</span>
            <h1 class="display-4 fw-bold text-white">Hasil: "<span style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ request('search') }}</span>"</h1>
            <p class="lead text-white-50 fs-5 mb-4">Menampilkan artikel yang cocok dengan kata kunci pencarian Anda.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold"><i class="fa-solid fa-xmark me-1"></i> Bersihkan Pencarian</a>
        @else
            <h1 class="display-3 fw-bold text-white">Inspirasi & <span style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Pengetahuan</span></h1>
            <p class="lead text-white-50 fs-5 mb-4">Temukan artikel menarik seputar teknologi, pemrograman, dan dunia web dev.</p>
            
            <!-- Premium Search Bar -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <form action="{{ route('home') }}" method="GET">
                        <div class="input-group input-group-lg shadow-lg rounded-pill overflow-hidden border border-warning border-opacity-25" style="background: white;">
                            <span class="input-group-text bg-white border-0 ps-4 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-0 py-3 px-3 fs-6" placeholder="Cari judul atau isi artikel..." value="{{ request('search') }}" style="outline: none; box-shadow: none;">
                            <button class="btn btn-warning px-4 fw-bold text-dark" type="submit" style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%); border: none;">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</header>
@endsection

@section('content')
<div class="row">
    <!-- Articles List -->
    <div class="col-lg-8 mb-4">
        @forelse($artikel as $a)
            <article class="card mb-4 border-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="card-img-top-container h-100" style="min-height: 200px;">
                            @if($a->gambar)
                                <img src="{{ asset($a->gambar) }}" alt="{{ $a->judul }}">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                                    <i class="fa-solid fa-image fa-3x mb-2 text-warning opacity-75"></i>
                                    <span class="small text-muted opacity-75">No Cover Image</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 d-flex flex-column">
                        <div class="card-body p-4 d-flex flex-column h-100">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                @if($a->kategori)
                                    <a href="{{ route('visitor.kategori', $a->id_kategori) }}" class="badge text-decoration-none fw-bold px-3 py-1.5 border border-warning rounded-pill" style="background: rgba(245, 158, 11, 0.1); color: #d97706;">
                                        {{ $a->kategori->nama_kategori }}
                                    </a>
                                @endif
                                <span class="text-muted small">
                                    <i class="fa-regular fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($a->hari_tanggal)->translatedFormat('d M Y') }}
                                </span>
                            </div>

                            <h3 class="h4 fw-bold mb-2">
                                <a href="{{ route('visitor.detail', $a->id) }}" class="text-dark text-decoration-none" style="transition: color 0.2s ease;" onmouseover="this.style.color='#d97706'" onmouseout="this.style.color='#0f172a'">
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
                                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; font-size: 12px; font-weight: bold; background: #0f172a; border: 1px solid #fbbf24;">
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
            <div class="card p-5 text-center border-0 shadow-sm">
                <div class="card-body">
                    <i class="fa-regular fa-folder-open fa-3x mb-3 text-warning opacity-75"></i>
                    <h4 class="fw-bold">Belum ada artikel</h4>
                    <p class="text-muted">Tidak ditemukan artikel dalam kategori atau kata kunci pencarian ini.</p>
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