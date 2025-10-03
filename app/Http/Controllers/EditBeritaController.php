<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class EditBeritaController extends Controller
{
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.aksi.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'isi'      => 'required',
            'gambar'   => 'nullable|string',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'penulis'  => 'required|string|max:100',
            'jurusan'  => 'nullable|string|max:100'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }
}
