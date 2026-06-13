<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArtikel = Artikel::count();
        $totalKategori = KategoriArtikel::count();
        $totalPenulis = Penulis::count();

        return view('admin.dashboard', compact('totalArtikel', 'totalKategori', 'totalPenulis'));
    }
}
