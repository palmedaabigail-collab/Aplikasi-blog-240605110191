<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return view('admin.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('admin.penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:penulis,user_name',
            'password' => 'required|string|min:4',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->only(['nama_depan', 'nama_belakang', 'user_name', 'password']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/penulis'), $filename);
            $input['foto'] = 'uploads/penulis/' . $filename;
        } else {
            $input['foto'] = '';
        }

        Penulis::create($input);

        return redirect()->route('admin.penulis.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:penulis,user_name,' . $id,
            'password' => 'nullable|string|min:4',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->only(['nama_depan', 'nama_belakang', 'user_name']);

        if ($request->filled('password')) {
            $input['password'] = $request->password;
        }

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($penulis->foto && File::exists(public_path($penulis->foto))) {
                File::delete(public_path($penulis->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/penulis'), $filename);
            $input['foto'] = 'uploads/penulis/' . $filename;
        }

        $penulis->update($input);

        return redirect()->route('admin.penulis.index')->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);

        // Check if penulis has articles
        if ($penulis->artikel()->count() > 0) {
            return redirect()->route('admin.penulis.index')->with('error', 'Penulis tidak dapat dihapus karena memiliki artikel yang terkait.');
        }

        // Delete photo
        if ($penulis->foto && File::exists(public_path($penulis->foto))) {
            File::delete(public_path($penulis->foto));
        }

        $penulis->delete();

        return redirect()->route('admin.penulis.index')->with('success', 'Penulis berhasil dihapus.');
    }
}
