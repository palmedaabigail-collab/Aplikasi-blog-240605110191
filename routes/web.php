<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ArtikelController;

// Public/Visitor Routes
Route::get('/', [PengunjungController::class, 'index'])->name('home');
Route::get('/kategori/{id}', [PengunjungController::class, 'kategori'])->name('visitor.kategori');
Route::get('/artikel/{id}', [PengunjungController::class, 'detail'])->name('visitor.detail');

// CMS Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('penulis', PenulisController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('artikel', ArtikelController::class);
});