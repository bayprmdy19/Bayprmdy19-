<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BidangController;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [authController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/bidang', [BidangController::class, 'index'])->name('bidang.index');
    Route::get('/admin/bidang/create', [BidangController::class, 'create'])->name('bidang.create');
    Route::post('/admin/bidang', [BidangController::class, 'store'])->name('bidang.store');
    Route::get('/admin/bidang/{id}', [BidangController::class, 'show'])->name('bidang.show');
    Route::get('/admin/bidang/{id}/edit', [BidangController::class, 'edit'])->name('bidang.edit');
    Route::put('/admin/bidang/{id}', [BidangController::class, 'update'])->name('bidang.update');
    Route::delete('/admin/bidang/{id}', [BidangController::class, 'destroy'])->name('bidang.destroy');
});

Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::get('/admin/berita', [beritaController::class, 'index'])->name('berita.index');
Route::get('/admin/berita/create', [beritaController::class, 'create'])->name('berita.create');
Route::post('/admin/berita', [beritaController::class, 'store'])->name('berita.store');