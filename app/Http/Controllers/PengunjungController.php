<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PengunjungController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->orderBy('hari_tanggal', 'desc')
            ->take(5)
            ->get();

        $kategori = KategoriArtikel::all();

        return view('pengunjung.index', compact('artikel', 'kategori'));
    }

    public function kategori($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->where('id_kategori', $id)
            ->orderBy('hari_tanggal', 'desc')
            ->get();

        $kategori = KategoriArtikel::all();

        return view('pengunjung.index', compact('artikel', 'kategori'));
    }

    public function detail($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])
            ->findOrFail($id);

        $kategori = KategoriArtikel::all();

        $terkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->take(5)
            ->get();

        return view('pengunjung.detail', compact(
            'artikel',
            'kategori',
            'terkait'
        ));
    }
}