@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Artikel Baru</h1>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary shadow-sm">&larr; Kembali</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="id_penulis" class="form-label fw-bold">Penulis</label>
                            <select class="form-select @error('id_penulis') is-invalid @enderror" id="id_penulis" name="id_penulis" required>
                                <option value="" disabled selected>-- Pilih Penulis --</option>
                                @foreach($penulis as $p)
                                    <option value="{{ $p->id }}" {{ old('id_penulis') == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_depan }} {{ $p->nama_belakang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_kategori" class="form-label fw-bold">Kategori Artikel</label>
                            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="judul" class="form-label fw-bold">Judul Artikel</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Ketik judul artikel..." required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="hari_tanggal" class="form-label fw-bold">Tanggal Publikasi</label>
                            <input type="date" class="form-control @error('hari_tanggal') is-invalid @enderror" id="hari_tanggal" name="hari_tanggal" value="{{ old('hari_tanggal', date('Y-m-d')) }}" required>
                            @error('hari_tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label fw-bold">Isi Artikel</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="10" placeholder="Tulis isi konten artikel lengkap..." required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-bold">Gambar Artikel</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                        <div class="form-text text-muted">Format gambar: jpeg, png, jpg, gif (Max: 2MB).</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-light me-md-2">Reset</button>
                        <button type="submit" class="btn btn-primary px-4">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
