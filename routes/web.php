<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::view('/login', 'admin.login')->name('admin.login');
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

Route::get('/admin/berita', [beritaController::class, 'index'])->name('berita.index');
Route::get('/admin/berita/create', [beritaController::class, 'create'])->name('berita.create');
Route::post('/admin/berita', [beritaController::class, 'store'])->name('berita.store');