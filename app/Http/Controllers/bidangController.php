<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BidangController extends Controller
{
    public function index(Request $request): View
    {
        $bidangs = Bidang::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->string('search')->value());

                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('nama', 'like', "%{$search}%")
                        ->orWhere('tipe', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('tipe'), function ($query) use ($request) {
                $query->where('tipe', $request->string('tipe')->value());
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('admin.bidang.index', [
            'bidangs' => $bidangs,
            'filters' => $request->only(['search', 'tipe']),
            'tipeOptions' => Bidang::query()->select('tipe')->distinct()->orderBy('tipe')->pluck('tipe'),
        ]);
    }

    public function create()
    {
        // Menampilkan form untuk membuat bidang baru
        return view('admin.bidang.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Menyimpan bidang baru ke database
        $bidang = new Bidang();
        $bidang->nama = $request->input('nama');
        $bidang->tipe = $request->input('tipe');
        $bidang->deskripsi = $request->input('deskripsi');
        $bidang->save();

        // Redirect ke halaman index bidang dengan pesan sukses
        return redirect()->route('admin.bidang.index')->with('success', 'bidang berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail bidang tertentu
        $bidang = Bidang::findOrFail($id);
        return view('admin.bidang.show', compact('bidang'));
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit bidang tertentu
        $bidang = Bidang::findOrFail($id);
        return view('admin.bidang.edit', compact('bidang'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Memperbarui bidang tertentu di database
        $bidang = Bidang::findOrFail($id);
        $bidang->nama = $request->input('nama');
        $bidang->tipe = $request->input('tipe');
        $bidang->deskripsi = $request->input('deskripsi');
        $bidang->save();

        // Redirect ke halaman index bidang dengan pesan sukses
        return redirect()->route('admin.bidang.index')->with('success', 'bidang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menghapus bidang tertentu dari database
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        // Redirect ke halaman index bidang dengan pesan sukses
        return redirect()->route('admin.bidang.index')->with('success', 'bidang berhasil dihapus.');
    }
}
