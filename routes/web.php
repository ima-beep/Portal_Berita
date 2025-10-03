<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EditBeritaController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\ReporterBeritaController;
use App\Http\Controllers\ReporterPreviewController;

// ====================== HOME ======================
Route::get('/', fn () => view('home.public'))->name('home');

// ====================== AUTH ======================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');           // Halaman login
    Route::post('/login', 'login')->name('login.submit');   // Proses login
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// ====================== ADMIN ======================
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita
    Route::resource('berita', BeritaController::class);
    Route::get('berita/{id}/publish', [BeritaController::class, 'publish'])->name('berita.publish');

    // Reporter
    Route::resource('reporters', ReporterController::class);
});

// ====================== BERITA EDIT ======================
// 👉 Sebenernya ini bisa digabung ke `BeritaController`, 
// tapi kalau memang dipisah tetap oke
Route::middleware(['auth'])->group(function () {
    Route::get('berita/{id}/edit', [EditBeritaController::class, 'edit'])->name('berita.edit');
    Route::put('berita/{id}', [EditBeritaController::class, 'update'])->name('berita.update');
});

// ====================== REPORTER ======================
Route::prefix('reporter')->middleware(['auth'])->name('reporter.')->group(function () {
    Route::resource('berita', ReporterBeritaController::class);

    Route::prefix('preview/{id}')->group(function () {
        Route::get('/', [ReporterPreviewController::class, 'show'])->name('preview.show');
        Route::post('/publish', [ReporterPreviewController::class, 'publish'])->name('preview.publish');
        Route::post('/draft', [ReporterPreviewController::class, 'draft'])->name('preview.draft');
    });
});
