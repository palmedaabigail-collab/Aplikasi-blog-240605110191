@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Penulis</h1>
    <a href="{{ route('admin.penulis.create') }}" class="btn btn-primary shadow-sm">+ Tambah Penulis</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50" class="ps-4">No</th>
                        <th width="80">Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th width="150" class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penulis as $index => $p)
                        <tr>
                            <td class="ps-4">{{ $index + 1 }}</td>
                            <td>
                                @if($p->foto)
                                    <img src="{{ asset($p->foto) }}" alt="Foto {{ $p->user_name }}" class="rounded-circle object-fit-cover" width="45" height="45">
                                @else
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; font-weight: bold;">
                                        {{ strtoupper(substr($p->nama_depan, 0, 1)) }}{{ strtoupper(substr($p->nama_belakang, 0, 1)) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold text-dark">{{ $p->nama_depan }} {{ $p->nama_belakang }}</span>
                            </td>
                            <td><code>{{ $p->user_name }}</code></td>
                            <td><code>{{ $p->password }}</code></td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.penulis.edit', $p->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('admin.penulis.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penulis ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Tidak ada data penulis tersedia. Klik "+ Tambah Penulis" untuk menambahkan data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
