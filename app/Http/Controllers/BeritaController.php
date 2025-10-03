<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.aksi.index', compact('beritas'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.aksi.show', compact('berita'));
    }

    public function create()
    {
        return view('admin.aksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'isi'      => 'required',
            'gambar'   => 'nullable|string',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'penulis'  => 'required|string|max:100'
        ]);

        $validated['status'] = 'draft'; // default

        Berita::create($validated);

    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

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
            'penulis'  => 'required|string|max:100'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update($validated);

    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function publish($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->update(['status' => 'published']);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dipublikasikan!');
    }
}
