<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Reporter;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalReporter = Reporter::count();
        $totalUser = User::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        return view('admin.dashboard.index', compact('totalBerita', 'totalReporter', 'totalUser', 'beritaTerbaru'));
    }
}
