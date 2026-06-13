# Aplikasi Sistem Manajemen Blog (CMS) & Halaman Publik

Tugas UAS Pemrograman Web - Sistem Manajemen Blog menggunakan Laravel dan database `db_blog`.

## Identitas Mahasiswa
- **Nama**: [Palmeda Abigail Yunta Paris]
- **NIM**: [240605110191]

## Deskripsi Aplikasi
Aplikasi ini adalah Sistem Manajemen Blog (CMS) yang dikembangkan dengan framework Laravel 11. Aplikasi terdiri dari dua area utama:
1. **CMS/Admin**: Digunakan untuk mengelola data penulis, kategori artikel, dan artikel blog (CRUD).
2. **Halaman Publik/Pengunjung**: Dapat diakses tanpa login (tidak menggunakan middleware auth), menampilkan artikel terbaru, filter berdasarkan kategori, detail artikel, dan widget artikel terkait.

## Fitur Utama
1. **Halaman Beranda Pengunjung**:
   - Menampilkan 5 artikel terbaru.
   - Menampilkan kategori artikel di sidebar.
   - Fitur filter artikel berdasarkan kategori yang dipilih.
   - Didesain dengan estetika modern, premium, responsif, dan elegan menggunakan Bootstrap 5.
2. **Halaman Detail Artikel**:
   - Menampilkan judul, tanggal publikasi (diformat), penulis, gambar cover, dan konten artikel secara lengkap.
   - Widget sidebar yang menampilkan maksimal 5 artikel terkait dalam kategori yang sama.
   - Tombol kembali ke halaman beranda.
3. **CMS/Admin Panel**:
   - Dashboard Admin.
   - **CRUD Penulis**: Tambah data penulis (Nama Depan, Nama Belakang, Username, Password, Upload Foto), Edit data penulis, Hapus data penulis.
   - **CRUD Kategori**: Tambah kategori (Nama Kategori, Keterangan), Edit kategori, Hapus kategori.
   - **CRUD Artikel**: Tambah artikel (dropdown relasi penulis & kategori, judul, isi, upload gambar, tanggal publikasi), Edit artikel, Hapus artikel.

## Cara Menjalankan Aplikasi

1. **Prasyarat**:
   - Pastikan XAMPP terinstal di sistem Anda.
   - PHP versi 8.2 atau lebih baru.
   - Composer terinstal.

2. **Pengaturan Database**:
   - Pastikan database MySQL XAMPP Anda aktif.
   - Database yang digunakan adalah `db_blog`. Pastikan database tersebut sudah di-import/ada di server MySQL Anda.
   - Konfigurasikan file `.env` di root proyek:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3308   # Sesuaikan dengan port MySQL Anda (biasanya 3306 atau 3308)
     DB_DATABASE=db_blog
     DB_USERNAME=root
     DB_PASSWORD=
     ```

3. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

4. **Jalankan Web Server**:
   Anda dapat menjalankan Apache melalui XAMPP Control Panel atau menggunakan perintah Artisan berikut:
   ```bash
   php artisan serve
   ```

5. **Akses Aplikasi**:
   - Halaman Utama: `http://localhost/aplikasi-blog/public/` (atau `http://127.0.0.1:8000/`)
   - Halaman Admin: `http://localhost/aplikasi-blog/public/admin` (atau `http://127.0.0.1:8000/admin`)

## Demonstrasi Video YouTube
- Link Video: [Isi Link Video YouTube Anda di Sini]
