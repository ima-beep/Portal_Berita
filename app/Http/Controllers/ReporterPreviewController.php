<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class ReporterPreviewController extends Controller
{
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('reporter.preview.index', compact('berita'));
    }

    public function publish($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->status = 'published';
        $berita->save();

        return redirect()->route('reporter.berita.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function draft($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->status = 'draft';
        $berita->save();

        return redirect()->route('reporter.berita.index')->with('success', 'Berita disimpan sebagai draft!');
    }
}
