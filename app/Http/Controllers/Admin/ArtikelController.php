<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->get();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $penulis = Penulis::all();
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.create', compact('penulis', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penulis' => 'required|exists:penulis,id',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'hari_tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->only(['id_penulis', 'id_kategori', 'judul', 'isi', 'hari_tanggal']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artikel'), $filename);
            $input['gambar'] = 'uploads/artikel/' . $filename;
        } else {
            $input['gambar'] = '';
        }

        Artikel::create($input);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $penulis = Penulis::all();
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.edit', compact('artikel', 'penulis', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'id_penulis' => 'required|exists:penulis,id',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'hari_tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->only(['id_penulis', 'id_kategori', 'judul', 'isi', 'hari_tanggal']);

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($artikel->gambar && File::exists(public_path($artikel->gambar))) {
                File::delete(public_path($artikel->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artikel'), $filename);
            $input['gambar'] = 'uploads/artikel/' . $filename;
        }

        $artikel->update($input);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Delete image
        if ($artikel->gambar && File::exists(public_path($artikel->gambar))) {
            File::delete(public_path($artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
