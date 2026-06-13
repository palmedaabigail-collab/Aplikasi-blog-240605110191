@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Kategori Artikel</h1>
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary shadow-sm">+ Tambah Kategori</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50" class="ps-4">No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th width="150" class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $index => $k)
                        <tr>
                            <td class="ps-4">{{ $index + 1 }}</td>
                            <td>
                                <span class="fw-semibold text-dark">{{ $k->nama_kategori }}</span>
                            </td>
                            <td>{{ $k->keterangan ?: '-' }}</td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.kategori.edit', $k->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                Tidak ada data kategori tersedia. Klik "+ Tambah Kategori" untuk menambahkan data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
