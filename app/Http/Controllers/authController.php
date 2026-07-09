<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login()
    {
        // Menampilkan halaman login
        return view('admin.login'); 
    }

    public function authenticate(Request $request)
    {
        // Validasi input dari form login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);



        // Mencoba untuk melakukan autentikasi
        if (auth()->attempt($credentials)) {
            // Jika berhasil, redirect ke halaman dashboard
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // Melakukan logout
        Auth::logout();

        // Menghapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login');
    }

    public function index()
    {
        // Menampilkan halaman dashboard
        return view('admin.dashboard');
    }
}
