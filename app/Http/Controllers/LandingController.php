<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman landing page portal.
     */
    public function index(): View
    {
        return view('landingPage');
    }
}