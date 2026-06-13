@extends('pengunjung.layout')

@section('content')
<div class="row mt-4">
    <!-- Main Content Detail -->
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm p-4 p-md-5">
            <!-- Article Header Info -->
            <div class="d-flex align-items-center gap-3 mb-4">
                @if($artikel->penulis && $artikel->penulis->foto)
                    <img src="{{ asset($artikel->penulis->foto) }}" alt="{{ $artikel->penulis->user_name }}" class="rounded-circle object-fit-cover border shadow-sm" width="50" height="50">
                @else
                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center border" style="width: 50px; height: 50px; font-size: 16px; font-weight: bold;">
                        {{ strtoupper(substr($artikel->penulis->nama_depan ?? 'A', 0, 1)) }}{{ strtoupper(substr($artikel->penulis->nama_belakang ?? 'N', 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h6 class="mb-0 fw-bold text-dark">{{ $artikel->penulis ? $artikel->penulis->nama_depan . ' ' . $artikel->penulis->nama_belakang : 'Anonim' }}</h6>
                    <span class="text-muted small">
                        <i class="fa-regular fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($artikel->hari_tanggal)->translatedFormat('d F Y') }}
                    </span>
                </div>
                <div class="ms-auto">
                    @if($artikel->kategori)
                        <a href="{{ route('visitor.kategori', $artikel->id_kategori) }}" class="badge bg-light text-primary text-decoration-none fw-semibold px-3 py-2 border border-primary-subtle rounded-pill">
                            {{ $artikel->kategori->nama_kategori }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Title -->
            <h1 class="display-6 fw-bold mb-4 text-dark">{{ $artikel->judul }}</h1>

            <!-- Image Cover -->
            @if($artikel->gambar)
                <div class="mb-4 rounded-4 overflow-hidden border shadow-sm" style="max-height: 450px;">
                    <img src="{{ asset($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-100 object-fit-cover" style="max-height: 450px;">
                </div>
            @endif

            <!-- Article Body -->
            <div class="article-content fs-5 text-secondary mb-5" style="line-height: 1.8; white-space: pre-line;">
                {!! e($artikel->isi) !!}
            </div>

            <hr class="text-light-emphasis my-4">

            <!-- Back to home -->
            <div class="d-flex justify-content-start">
                <a href="{{ route('home') }}" class="btn btn-secondary px-4 py-2.5 rounded-pill">
                    <i class="fa-solid fa-arrow-left-long me-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Related Articles Sidebar -->
    <div class="col-lg-4">
        <div class="sidebar position-sticky" style="top: 100px;">
            <h4 class="sidebar-title">Artikel Terkait</h4>
            <ul class="list-group list-group-flush p-0 m-0">
                @forelse($terkait as $t)
                    <li class="list-group-item related-item bg-transparent px-0">
                        <a href="{{ route('visitor.detail', $t->id) }}" class="fw-bold d-block text-decoration-none text-dark hover-primary mb-1">
                            {{ $t->judul }}
                        </a>
                        <div class="related-date">
                            <i class="fa-regular fa-calendar-days me-1"></i>
                            {{ \Carbon\Carbon::parse($t->hari_tanggal)->translatedFormat('d M Y') }}
                        </div>
                    </li>
                @empty
                    <li class="list-group-item bg-transparent text-muted py-4 px-0">
                        <i class="fa-regular fa-face-meh me-1"></i> Tidak ada artikel terkait lainnya dari kategori ini.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection