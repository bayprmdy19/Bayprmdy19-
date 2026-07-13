@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-4xl">
    <!-- Alert Pesan Error jika terjadi kegagalan pengisian form -->
    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl">
            <div class="flex items-center gap-2 font-bold mb-2">
                <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" class="h-5 w-5 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span class="text-sm">Gagal menyimpan berita karena:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1 font-semibold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-gray-200 p-8 sm:p-10 shadow-sm">
        <div class="mb-8 pb-6 border-b border-gray-100">
            <h3 class="text-xl font-extrabold text-gray-900">Tulis Berita Baru</h3>
            <p class="text-xs text-gray-400 mt-1">Formulir ini menggunakan parameter database lokal Anda (judul, isi, gambar).</p>
        </div>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Baris Judul -->
            <div class="space-y-2">
                <label for="judul" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Judul Berita</label>
                <input type="text" 
                       class="w-full bg-gray-50 border border-gray-200 p-4 rounded-2xl focus:border-primary focus:bg-white outline-none font-bold transition-all text-sm @error('judul') border-rose-500 @enderror" 
                       id="judul" 
                       name="judul" 
                       value="{{ old('judul') }}" 
                       required 
                       placeholder="Masukkan judul berita yang menarik...">
            </div>

            <!-- Baris Isi Berita (DISINKRONKAN: Menggunakan name="isi" agar lolos validasi) -->
            <div class="space-y-2">
                <label for="isi" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Isi Berita</label>
                <textarea class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl focus:border-primary focus:bg-white outline-none font-semibold leading-relaxed transition-all text-sm resize-none @error('isi') border-rose-500 @enderror" 
                          id="isi" 
                          name="isi" 
                          rows="6" 
                          required 
                          placeholder="Tuliskan berita lengkap Anda di sini...">{{ old('isi') }}</textarea>
            </div>

            <!-- Baris Gambar Berita -->
            <div class="space-y-2">
                <label for="gambar" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Gambar Berita</label>
                <div class="border-2 border-dashed border-gray-200 p-6 rounded-2xl hover:border-primary transition-all bg-gray-50">
                    <input type="file" 
                           class="text-sm font-bold text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-primary/10 file:text-primary hover:file:bg-primary/20" 
                           id="gambar" 
                           name="gambar">
                    <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase">Format gambar wajib: JPEG, PNG, JPG, GIF, SVG (Maks. 2MB)</p>
                </div>
            </div>

            <!-- Tombol Navigasi Batal & Simpan -->
            <div class="flex items-center gap-4 pt-6 border-t border-gray-100 justify-end">
                <a href="{{ route('admin.berita.index') }}" class="px-6 py-4 rounded-2xl font-bold text-sm text-gray-500 hover:bg-gray-100 transition-all">Batal</a>
                <button type="submit" class="bg-primary text-white px-8 py-4 rounded-2xl font-bold text-sm hover:shadow-xl hover:shadow-blue-200 transition-all active:scale-95 flex items-center gap-2">
                    <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
</div>
@endsection