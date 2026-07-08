<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class beritaController extends Controller
{
    public function index()
    {
        // Mengambil semua data berita dari database
        $berita = Berita::all();

        // Mengirim data berita ke view 'berita.index'
        // berita = folder, index = file 
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat berita baru
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan berita baru ke database
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->isi = $request->input('isi');  
        $berita->save();

        // Redirect ke halaman index berita dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }
}


// index = menampilkan semua data berita
// create = menampilkan form untuk membuat berita baru  
// store = menyimpan berita baru ke database
// show = menampilkan detail berita tertentu
// edit = menampilkan form untuk mengedit berita tertentu
// update = memperbarui berita tertentu di database
// destroy = menghapus berita tertentu dari database