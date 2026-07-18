<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AnggotaProfileController extends Controller
{
    private const JABATAN_OPTIONS = [
        'ketua_umum' => 'Ketua Umum',
        'sekretaris_umum' => 'Sekretaris Umum',
        'bendahara_umum' => 'Bendahara Umum',
        'ketua_bidang' => 'Ketua Bidang',
        'sekretaris_bidang' => 'Sekretaris Bidang',
        'bendahara_bidang' => 'Bendahara Bidang',
        'anggota' => 'Anggota',
    ];

    public function edit(): View
    {
        return view('anggota.profile.edit', [
            'anggota' => Auth::guard('anggota')->user(),
            'bidangs' => Bidang::orderBy('nama')->get(),
            'jabatanOptions' => self::JABATAN_OPTIONS,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $anggota = Auth::guard('anggota')->user();

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => ['required', Rule::in(array_keys(self::JABATAN_OPTIONS))],
            'username' => 'required|string|max:50|alpha_dash|unique:anggota,username,'.$anggota->id,
            'email' => 'nullable|email|max:255|unique:anggota,email,'.$anggota->id,
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:30',
            'bidang_id' => 'nullable|exists:bidang,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (in_array($data['jabatan'], \App\Models\Anggota::JABATAN_UMUM, true)) {
            $data['bidang_id'] = null;
        } elseif (blank($data['bidang_id'] ?? null)) {
            return back()->withErrors([
                'bidang_id' => 'Bidang wajib dipilih untuk jabatan ini.',
            ])->withInput();
        }

        if (!$request->filled('password')) {
            unset($data['password']);
        }

        $anggota->update($data);

        return redirect()->route('anggota.profile.edit')->with('success', 'Profile berhasil diperbarui.');
    }
}
