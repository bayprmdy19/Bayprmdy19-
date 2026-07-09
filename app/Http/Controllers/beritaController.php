<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class beritaController extends Controller
{
    /**
     * Menampilkan daftar berita di dashboard admin.
     */
    public function index()
    {
        // Mengambil semua data berita terbaru berdasarkan database Anda
        $beritas = Berita::query()->latest()->paginate(10); // Menampilkan 10 berita per halaman
        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * Menampilkan formulir tambah berita baru.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Menyimpan berita baru ke database Anda.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form (Disesuaikan dengan kolom: judul, isi, gambar)
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Menyimpan berita baru ke database
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->isi   = $request->input('isi');

        // Proses unggah gambar jika ada file gambar yang dipilih
        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        } else {
            $berita->gambar = null;
        }

        $berita->save();

        // 3. Redirect ke halaman index berita admin dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit berita.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Memperbarui data berita yang sudah ada di database Anda.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validasi input
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita->judul = $request->input('judul');
        $berita->isi   = $request->input('isi');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada untuk menghemat kapasitas penyimpanan
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar dari server jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}