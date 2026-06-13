@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Artikel</h1>
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary shadow-sm">+ Tambah Artikel</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50" class="ps-4">No</th>
                        <th width="100">Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tanggal Publikasi</th>
                        <th width="150" class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikel as $index => $a)
                        <tr>
                            <td class="ps-4">{{ $index + 1 }}</td>
                            <td>
                                @if($a->gambar)
                                    <img src="{{ asset($a->gambar) }}" alt="Gambar {{ $a->judul }}" class="rounded object-fit-cover border shadow-sm" width="80" height="50">
                                @else
                                    <div class="rounded bg-light text-muted d-flex align-items-center justify-content-center border" style="width: 80px; height: 50px; font-size: 11px;">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold text-dark">{{ $a->judul }}</span>
                            </td>
                            <td>
                                @if($a->penulis)
                                    {{ $a->penulis->nama_depan }} {{ $a->penulis->nama_belakang }}
                                @else
                                    <span class="text-danger small">Tanpa Penulis</span>
                                @endif
                            </td>
                            <td>
                                @if($a->kategori)
                                    <span class="badge bg-info text-dark">{{ $a->kategori->nama_kategori }}</span>
                                @else
                                    <span class="badge bg-secondary">Tanpa Kategori</span>
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($a->hari_tanggal)->translatedFormat('d M Y') }}
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.artikel.edit', $a->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('admin.artikel.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                Tidak ada data artikel tersedia. Klik "+ Tambah Artikel" untuk menambahkan data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
