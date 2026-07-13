<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\anggotaController;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [authController::class, 'index'])->name('admin.dashboard');

    // Routes untuk mengelola bidang
    Route::get('/admin/bidang', [BidangController::class, 'index'])->name('bidang.index');
    Route::get('/admin/bidang/create', [BidangController::class, 'create'])->name('bidang.create');
    Route::post('/admin/bidang', [BidangController::class, 'store'])->name('bidang.store');
    Route::get('/admin/bidang/{id}', [BidangController::class, 'show'])->name('bidang.show');
    Route::get('/admin/bidang/{id}/edit', [BidangController::class, 'edit'])->name('bidang.edit');
    Route::put('/admin/bidang/{id}', [BidangController::class, 'update'])->name('bidang.update');
    Route::delete('/admin/bidang/{id}', [BidangController::class, 'destroy'])->name('bidang.destroy');

    // Routes untuk mengelola anggota
    Route::get('/admin/anggota', [anggotaController::class, 'index'])->name('admin.anggota.index');
    Route::get('/admin/anggota/create', [anggotaController::class, 'create'])->name('admin.anggota.create');
    Route::post('/admin/anggota', [anggotaController::class, 'store'])->name('admin.anggota.store');
    Route::get('/admin/anggota/{id}/edit', [anggotaController::class, 'edit'])->name('admin.anggota.edit');
    Route::put('/admin/anggota/{id}', [anggotaController::class, 'update'])->name('admin.anggota.update');
    Route::delete('/admin/anggota/{id}', [anggotaController::class, 'destroy'])->name('admin.anggota.destroy');

    // Routes untuk mengelola berita (Disinkronkan dengan name 'admin.berita.*' agar sesuai dengan views)
    Route::get('/admin/berita', [beritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [beritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [beritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{id}/edit', [beritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{id}', [beritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [beritaController::class, 'destroy'])->name('admin.berita.destroy');
});

Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [authController::class, 'logout'])->name('logout');