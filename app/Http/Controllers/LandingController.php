<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Berita;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman landing page portal.
     */
    public function index(): View
    {
        $berita = Berita::latest()->take(3)->get();
        
        return view('landingPage', compact('berita'));
    }
}