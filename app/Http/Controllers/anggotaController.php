<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class anggotaController extends Controller
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

    public function index(): View
    {
        $anggotas = Anggota::with('bidang')
            ->when(request()->filled('search'), function ($query) {
                $search = trim(request()->string('search')->value());

                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('nama', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('no_telp', 'like', "%{$search}%");
                });
            })
            ->when(request()->filled('jabatan'), function ($query) {
                $query->where('jabatan', request()->string('jabatan')->value());
            })
            ->when(request()->filled('bidang_id'), function ($query) {
                $query->where('bidang_id', request()->integer('bidang_id'));
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('admin.anggota.index', [
            'anggotas' => $anggotas,
            'filters' => request()->only(['search', 'jabatan', 'bidang_id']),
            'jabatanOptions' => self::JABATAN_OPTIONS,
            'bidangOptions' => Bidang::orderBy('nama')->get(['id', 'nama']),
        ]);
    }

    public function create(): View
    {
        return view('admin.anggota.create', [
            'bidangs' => Bidang::orderBy('nama')->get(),
            'jabatanOptions' => self::JABATAN_OPTIONS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => ['required', Rule::in(array_keys(self::JABATAN_OPTIONS))],
            'username' => 'required|string|max:50|alpha_dash|unique:anggota,username',
            'email' => 'nullable|email|max:255|unique:anggota,email',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:30',
            'bidang_id' => 'nullable|exists:bidang,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['bidang_id'] = $this->resolveBidangId($data['jabatan'], $data['bidang_id'] ?? null);

        Anggota::create($data);

        return redirect()->route('admin.anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $anggota = Anggota::findOrFail($id);
        
        return view('admin.anggota.edit', [
            'anggota' => $anggota,
            'bidangs' => Bidang::orderBy('nama')->get(),
            'jabatanOptions' => self::JABATAN_OPTIONS,
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);

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

        $data['bidang_id'] = $this->resolveBidangId($data['jabatan'], $data['bidang_id'] ?? null);

        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        } else {
            unset($data['password']);
        }

        $anggota->update($data);

        return redirect()->route('admin.anggota.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('admin.anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }

    private function resolveBidangId(string $jabatan, mixed $bidangId): ?int
    {
        if (in_array($jabatan, Anggota::JABATAN_UMUM, true)) {
            return null;
        }

        if (blank($bidangId)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'bidang_id' => 'Bidang wajib dipilih untuk jabatan ini.',
            ]);
        }

        return (int) $bidangId;
    }
}
