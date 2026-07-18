<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class beritaController extends Controller
{
    /**
     * Menampilkan daftar berita di dashboard admin.
     */
    public function index(Request $request): View
    {
        $beritas = Berita::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->string('search')->value());

                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('judul', 'like', "%{$search}%")
                        ->orWhere('isi', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', [
            'beritas' => $beritas,
            'filters' => $request->only(['search']),
        ]);
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
        // 1. Validasi input: Pastikan form mengirimkan parameter 'judul', 'isi', dan 'gambar'
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Menyimpan data baru ke database
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->isi   = $request->input('isi');

        if ($request->hasFile('gambar')) {
            $berita->gambar = $this->storeGambar($request->file('gambar'));
        } else {
            $berita->gambar = null;
        }

        $berita->save();

        // 3. Redirect ke halaman index dengan nama rute asli Anda
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

        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita->judul = $request->input('judul');
        $berita->isi   = $request->input('isi');

        if ($request->hasFile('gambar')) {
            $this->deleteStoredFile($berita->gambar);
            $berita->gambar = $this->storeGambar($request->file('gambar'));
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

        $this->deleteStoredFile($berita->gambar);

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function storeGambar($file): string
    {
        $directory = public_path('assets/berita');
        File::ensureDirectoryExists($directory);

        $filename = now()->format('YmdHis').'-'.Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'assets/berita/'.$filename;
    }

    private function deleteStoredFile(?string $path): void
    {
        if (blank($path)) {
            return;
        }

        $publicFile = public_path($path);

        if (File::exists($publicFile)) {
            File::delete($publicFile);

            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
