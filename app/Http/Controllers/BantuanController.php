<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bantuan;

class BantuanController extends Controller
{
    /**
     * Show the form for creating a new bantuan request.
     */
    public function create(Request $request)
    {
        $kategori = $request->query('kategori');
        
        $defaultKategori = '';
        if ($kategori === 'bullying') {
            $defaultKategori = 'Bullying & Perundungan';
        } elseif ($kategori === 'kesehatan-mental') {
            $defaultKategori = 'Kesehatan Mental & Stres Belajar';
        } elseif ($kategori === 'kekerasan-seksual') {
            $defaultKategori = 'Kekerasan Seksual & Pelecehan';
        } elseif ($kategori === 'akademik') {
            $defaultKategori = 'Masalah Akademik & Sekolah';
        } elseif ($kategori === 'keluarga') {
            $defaultKategori = 'Masalah Keluarga & Pribadi';
        } elseif ($kategori === 'lainnya') {
            $defaultKategori = 'Lainnya';
        }

        return view('bantuan.create', compact('defaultKategori'));
    }

    /**
     * Store a newly created bantuan request in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_masalah' => 'required|string|in:Bullying & Perundungan,Kesehatan Mental & Stres Belajar,Kekerasan Seksual & Pelecehan,Masalah Akademik & Sekolah,Masalah Keluarga & Pribadi,Lainnya',
            'tingkat_sekolah' => 'required|string|in:SMP / MTs,SMA / SMK / MA,Lainnya',
            'email' => 'nullable|email',
            'asal_ranting' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Bantuan::create($request->all());

        return redirect()->back()->with('success', 'Laporan Anda berhasil dikirim dan akan segera diproses.');
    }

    /**
     * Display a listing of submissions in the admin area.
     */
    public function index()
    {
        $submissions = Bantuan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.bantuan.index', compact('submissions'));
    }

    /**
     * Display the detail of a single bantuan submission.
     */
    public function show($id)
    {
        $bantuan = Bantuan::findOrFail($id);
        return view('admin.bantuan.show', compact('bantuan'));
    }

    /**
     * Remove the specified submission from storage.
     */
    public function destroy($id)
    {
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();

        return redirect()->route('admin.bantuan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
