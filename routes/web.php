<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Menghubungkan URL root (/) ke method index di LandingController
Route::get('/', [LandingController::class, 'index'])->name('landing');