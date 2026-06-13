@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Penulis</h1>
            <a href="{{ route('admin.penulis.index') }}" class="btn btn-outline-secondary shadow-sm">&larr; Kembali</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.penulis.update', $penulis->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_depan" class="form-label fw-bold">Nama Depan</label>
                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $penulis->nama_depan) }}" required>
                            @error('nama_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nama_belakang" class="form-label fw-bold">Nama Belakang</label>
                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $penulis->nama_belakang) }}" required>
                            @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="user_name" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name', $penulis->user_name) }}" required>
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                        <div class="form-text text-muted">Password saat ini: <code>{{ $penulis->password }}</code></div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label fw-bold">Foto Profil Baru</label>
                        @if($penulis->foto)
                            <div class="mb-2">
                                <img src="{{ asset($penulis->foto) }}" alt="Foto Lama" class="rounded object-fit-cover shadow-sm border" width="100" height="100">
                                <div class="form-text text-muted">Foto saat ini</div>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto. Format gambar: jpeg, png, jpg, gif (Max: 2MB).</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary px-4">Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
