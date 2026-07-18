<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\AnggotaProfileController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\BantuanController;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Routes untuk Pusat Bantuan Pelajar
Route::get('/bantuan', [BantuanController::class, 'create'])->name('bantuan.create');
Route::post('/bantuan', [BantuanController::class, 'store'])->name('bantuan.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [authController::class, 'index']);
    Route::get('/admin/dashboard', [authController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/bidang', [BidangController::class, 'index'])->name('admin.bidang.index');
    Route::get('/admin/bidang/create', [BidangController::class, 'create'])->name('admin.bidang.create');
    Route::post('/admin/bidang', [BidangController::class, 'store'])->name('admin.bidang.store');
    Route::get('/admin/bidang/{id}', [BidangController::class, 'show'])->name('admin.bidang.show');
    Route::get('/admin/bidang/{id}/edit', [BidangController::class, 'edit'])->name('admin.bidang.edit');
    Route::put('/admin/bidang/{id}', [BidangController::class, 'update'])->name('admin.bidang.update');
    Route::delete('/admin/bidang/{id}', [BidangController::class, 'destroy'])->name('admin.bidang.destroy');

    Route::get('/admin/anggota', [anggotaController::class, 'index'])->name('admin.anggota.index');
    Route::get('/admin/anggota/create', [anggotaController::class, 'create'])->name('admin.anggota.create');
    Route::post('/admin/anggota', [anggotaController::class, 'store'])->name('admin.anggota.store');
    Route::get('/admin/anggota/{id}/edit', [anggotaController::class, 'edit'])->name('admin.anggota.edit');
    Route::put('/admin/anggota/{id}', [anggotaController::class, 'update'])->name('admin.anggota.update');
    Route::delete('/admin/anggota/{id}', [anggotaController::class, 'destroy'])->name('admin.anggota.destroy');

    Route::get('/admin/berita', [beritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [beritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [beritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{id}/edit', [beritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{id}', [beritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [beritaController::class, 'destroy'])->name('admin.berita.destroy');

    Route::get('/admin/arsip', [ArsipController::class, 'adminIndex'])->name('admin.arsip.index');
    Route::get('/admin/arsip/create', [ArsipController::class, 'create'])->name('admin.arsip.create');
    Route::post('/admin/arsip', [ArsipController::class, 'store'])->name('admin.arsip.store');
    Route::get('/admin/arsip/{arsip}/download', [ArsipController::class, 'adminDownload'])->name('admin.arsip.download');
    Route::get('/admin/arsip/{arsip}/edit', [ArsipController::class, 'edit'])->name('admin.arsip.edit');
    Route::put('/admin/arsip/{arsip}', [ArsipController::class, 'update'])->name('admin.arsip.update');
    Route::delete('/admin/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('admin.arsip.destroy');
    Route::get('/admin/bantuan', [BantuanController::class, 'index'])->name('admin.bantuan.index');
    Route::delete('/admin/bantuan/{id}', [BantuanController::class, 'destroy'])->name('admin.bantuan.destroy');
});

Route::middleware('auth:anggota')->group(function () {
    Route::get('/profile', [AnggotaProfileController::class, 'edit'])->name('anggota.profile.edit');
    Route::put('/profile', [AnggotaProfileController::class, 'update'])->name('anggota.profile.update');
    Route::get('/arsip', [ArsipController::class, 'memberIndex'])->name('anggota.arsip.index');
    Route::get('/arsip/{arsip}/download', [ArsipController::class, 'download'])->name('anggota.arsip.download');
});

Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [authController::class, 'logout'])->name('logout');
