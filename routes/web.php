<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::view('/login', 'admin.login')->name('admin.login');
Route::view('/admin/login', 'admin.login')->name('admin.login.form');
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
