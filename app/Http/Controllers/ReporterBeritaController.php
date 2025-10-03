<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- Tambahkan ini kalau mau pakai Auth::

class ReporterBeritaController extends Controller
{
    public function index()
    {
        $username = Auth::check() ? Auth::user()->username : 'reporter1';

        $beritas = Berita::where('penulis', $username)->latest()->get();
        return view('reporter.kelola_berita.index', compact('beritas'));
    }

    // method lainnya (create, store, edit, update, destroy) tetap di bawah sini...
}
