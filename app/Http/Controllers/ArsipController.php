<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArsipController extends Controller
{
    public function adminIndex(): View
    {
        return view('admin.arsip.index', [
            'arsips' => Arsip::query()
                ->when(request()->filled('search'), function ($query) {
                    $search = trim(request()->string('search')->value());

                    $query->where(function ($innerQuery) use ($search) {
                        $innerQuery
                            ->where('judul', 'like', "%{$search}%")
                            ->orWhere('deskripsi', 'like', "%{$search}%")
                            ->orWhere('original_name', 'like', "%{$search}%");
                    });
                })
                ->when(request()->filled('tanggal_dari'), function ($query) {
                    $query->whereDate('tanggal_arsip', '>=', request()->date('tanggal_dari'));
                })
                ->when(request()->filled('tanggal_sampai'), function ($query) {
                    $query->whereDate('tanggal_arsip', '<=', request()->date('tanggal_sampai'));
                })
                ->orderByDesc('tanggal_arsip')
                ->latest()
                ->paginate(10)
                ->withQueryString(),
            'filters' => request()->only(['search', 'tanggal_dari', 'tanggal_sampai']),
        ]);
    }

    public function create(): View
    {
        return view('admin.arsip.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_arsip' => 'required|date',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|max:10240',
        ]);

        $file = $request->file('file');

        // Ambil metadata sebelum file dipindahkan (move() menghapus file temporary)
        $originalName = $file->getClientOriginalName();
        $mimeType     = $file->getClientMimeType();
        $ukuran       = $file->getSize();
        $filePath     = $this->storeArsipFile($file);

        Arsip::create([
            'judul'         => $data['judul'],
            'tanggal_arsip' => $data['tanggal_arsip'],
            'deskripsi'     => $data['deskripsi'] ?? null,
            'file_path'     => $filePath,
            'original_name' => $originalName,
            'mime_type'     => $mimeType,
            'ukuran'        => $ukuran,
        ]);

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil diupload.');
    }

    public function edit(Arsip $arsip): View
    {
        return view('admin.arsip.edit', compact('arsip'));
    }

    public function adminDownload(Arsip $arsip)
    {
        return $this->buildDownloadResponse($arsip, route('admin.arsip.index'));
    }

    public function update(Request $request, Arsip $arsip): RedirectResponse
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_arsip' => 'required|date',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|max:10240',
        ]);

        $payload = [
            'judul' => $data['judul'],
            'tanggal_arsip' => $data['tanggal_arsip'],
            'deskripsi' => $data['deskripsi'] ?? null,
        ];

        if ($request->hasFile('file')) {
            $this->deleteStoredFile($arsip->file_path);

            $file = $request->file('file');

            // Ambil metadata sebelum file dipindahkan (move() menghapus file temporary)
            $payload['original_name'] = $file->getClientOriginalName();
            $payload['mime_type']     = $file->getClientMimeType();
            $payload['ukuran']        = $file->getSize();
            $payload['file_path']     = $this->storeArsipFile($file);
        }

        $arsip->update($payload);

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy(Arsip $arsip): RedirectResponse
    {
        $this->deleteStoredFile($arsip->file_path);
        $arsip->delete();

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }

    public function memberIndex(): View
    {
        return view('anggota.arsip.index', [
            'arsips' => Arsip::orderByDesc('tanggal_arsip')->latest()->paginate(12),
        ]);
    }

    public function download(Arsip $arsip)
    {
        return $this->buildDownloadResponse($arsip, route('anggota.arsip.index'));
    }

    private function storeArsipFile($file): string
    {
        $directory = public_path('assets/arsip');
        File::ensureDirectoryExists($directory);

        $filename = now()->format('YmdHis').'-'.Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'assets/arsip/'.$filename;
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

    private function buildDownloadResponse(Arsip $arsip, string $fallbackRoute)
    {
        $publicFile = public_path($arsip->file_path);

        if (File::exists($publicFile)) {
            return response()->download($publicFile, $arsip->original_name);
        }

        if (Storage::disk('public')->exists($arsip->file_path)) {
            return Storage::disk('public')->download($arsip->file_path, $arsip->original_name);
        }

        return redirect()->to($fallbackRoute)->with('error', 'File arsip tidak ditemukan di server.');
    }
}
