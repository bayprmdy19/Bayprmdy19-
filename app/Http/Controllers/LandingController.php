<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Bidang;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman landing page portal.
     */
    public function index(): View
    {
        $berita = Berita::latest()->take(3)->get();
        $anggotas = Anggota::with('bidang')->orderBy('nama')->get();
        $bidangs = Bidang::with(['anggotas' => function ($query) {
            $query->orderBy('nama');
        }])->orderBy('nama')->get();

        $jabatanLabels = [
            'ketua_umum' => 'Ketua Umum',
            'sekretaris_umum' => 'Sekretaris Umum',
            'bendahara_umum' => 'Bendahara Umum',
            'ketua_bidang' => 'Ketua Bidang',
            'sekretaris_bidang' => 'Sekretaris Bidang',
            'bendahara_bidang' => 'Bendahara Bidang',
            'anggota' => 'Anggota',
        ];

        $urutanPimpinanUmum = [
            'ketua_umum',
            'sekretaris_umum',
            'bendahara_umum',
        ];

        $pimpinanUmum = collect([
            'ketua_umum' => ['label' => 'Ketua Umum', 'nama' => '-'],
            'sekretaris_umum' => ['label' => 'Sekretaris Umum', 'nama' => '-'],
            'bendahara_umum' => ['label' => 'Bendahara Umum', 'nama' => '-'],
        ])->map(function (array $item, string $jabatan) use ($anggotas) {
            $anggota = $anggotas->firstWhere('jabatan', $jabatan);
            $item['nama'] = $anggota?->nama ?? '-';

            return $item;
        })->values();

        $anggotaPimpinanUmum = $anggotas
            ->whereIn('jabatan', $urutanPimpinanUmum)
            ->sortBy(fn ($anggota) => array_search($anggota->jabatan, $urutanPimpinanUmum, true))
            ->values();

        $strukturData = [
            'umum' => [
                'title' => 'Pimpinan Umum Harian',
                'badge' => 'Inti Organisasi',
                'desc' => 'Pimpinan Harian bertanggung jawab penuh atas arah kebijakan organisasi, koordinasi internal antar bidang, serta representasi eksternal Pimpinan Cabang IPM Cileungsi dalam gerakan dakwah pelajar.',
                'members' => $this->formatMembers($anggotaPimpinanUmum, $jabatanLabels),
            ],
        ];

        foreach ($bidangs as $bidang) {
            $key = Str::slug($bidang->nama, '_');

            $strukturData[$key] = [
                'title' => $bidang->nama,
                'badge' => $bidang->tipe ?: 'Bidang',
                'desc' => $bidang->deskripsi ?: 'Belum ada deskripsi bidang.',
                'members' => $this->formatMembers($bidang->anggotas, $jabatanLabels),
            ];
        }

        return view('landingPage', [
            'berita' => $berita,
            'pimpinanUmum' => $pimpinanUmum,
            'bidangs' => $bidangs,
            'strukturData' => $strukturData,
        ]);
    }

    private function formatMembers(Collection $anggotas, array $jabatanLabels): array
    {
        $sorted = $anggotas->sortBy(function ($anggota) {
            return match ($anggota->jabatan) {
                'ketua_umum', 'ketua_bidang' => 1,
                'sekretaris_umum', 'sekretaris_bidang' => 2,
                'bendahara_umum', 'bendahara_bidang' => 3,
                'anggota' => 4,
                default => 5,
            };
        })->values();

        if ($sorted->isEmpty()) {
            return ['<strong>Belum ada anggota:</strong> Data belum diinput'];
        }

        return $sorted->map(function ($anggota) use ($jabatanLabels) {
            $label = $jabatanLabels[$anggota->jabatan] ?? Str::of($anggota->jabatan)->replace('_', ' ')->title();

            return "<strong>{$label}:</strong> {$anggota->nama}";
        })->all();
    }
}
