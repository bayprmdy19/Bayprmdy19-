<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Arsip;
use App\Models\Berita;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class authController extends Controller
{
    public function login(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::guard('anggota')->check()) {
            return redirect()->route('landing');
        }

        return view('admin.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) && Auth::attempt([
            'email' => $credentials['login'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        if (Auth::guard('anggota')->attempt([
            'username' => $credentials['login'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();

            return redirect()->intended(route('landing'));
        }

        return back()->withErrors([
            'login' => 'Email/username atau password salah.',
        ])->onlyInput('login');
    }

    public function logout(Request $request): RedirectResponse
    {
        $redirectTo = route('login');

        if (Auth::guard('anggota')->check()) {
            Auth::guard('anggota')->logout();
            $redirectTo = route('landing');
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to($redirectTo);
    }

    public function index(): View
    {
        $latestContents = $this->buildLatestContents();

        return view('admin.dashboard', [
            'totalBidang' => Bidang::count(),
            'totalBerita' => Berita::count(),
            'totalAnggota' => Anggota::count(),
            'totalArsip' => Arsip::count(),
            'latestContents' => $latestContents,
        ]);
    }

    private function buildLatestContents(): Collection
    {
        $beritas = Berita::query()
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($berita) => [
                'title' => $berita->judul,
                'category' => 'Berita',
                'meta' => Str::limit(strip_tags($berita->isi), 80),
                'date' => $berita->created_at,
                'link' => route('admin.berita.edit', $berita->id),
            ]);

        $arsips = Arsip::query()
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($arsip) => [
                'title' => $arsip->judul,
                'category' => 'Arsip',
                'meta' => $arsip->original_name,
                'date' => $arsip->created_at,
                'link' => route('admin.arsip.edit', $arsip->id),
            ]);

        $anggotas = Anggota::query()
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($anggota) => [
                'title' => $anggota->nama,
                'category' => 'Anggota',
                'meta' => Str::of($anggota->jabatan)->replace('_', ' ')->title()->value(),
                'date' => $anggota->created_at,
                'link' => route('admin.anggota.edit', $anggota->id),
            ]);

        $bidangs = Bidang::query()
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($bidang) => [
                'title' => $bidang->nama,
                'category' => 'Bidang',
                'meta' => $bidang->tipe,
                'date' => $bidang->created_at,
                'link' => route('admin.bidang.edit', $bidang->id),
            ]);

        return collect()
            ->merge($beritas)
            ->merge($arsips)
            ->merge($anggotas)
            ->merge($bidangs)
            ->sortByDesc('date')
            ->take(8)
            ->values();
    }
}
