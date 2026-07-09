@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita')
@section('page_subtitle', 'Tulis artikel berita baru di Portal IPM Cileungsi')

@section('content')
<div class="max-w-4xl">
    <!-- Kartu Konten Utama menggunakan styling Tailwind yang serasi dengan admin.blade.php -->
    <div class="bg-white rounded-[2.5rem] border border-gray-200 p-8 sm:p-10 shadow-sm">
        <div class="mb-8 pb-6 border-b border-gray-100">
            <h3 class="text-xl font-extrabold text-gray-900">Formulir Berita Baru</h3>
            <p class="text-xs text-gray-400 mt-1">Gunakan formulir di bawah ini untuk menyimpan artikel ke database lokal Anda.</p>
        </div>

        <!-- 1. Perbaikan: Ditambahkan enctype="multipart/form-data" agar upload gambar berfungsi -->
        <!-- 2. Perbaikan: Menggunakan rute yang benar dengan awalan admin. -->
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Baris Judul Berita -->
            <div class="space-y-2">
                <label for="judul" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Judul Berita</label>
                <input type="text" class="w-full bg-gray-50 border border-gray-200 p-4 rounded-2xl focus:border-primary focus:bg-white outline-none font-bold transition-all text-sm @error('judul') border-red-500 @enderror" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Masukkan judul berita di sini...">
                @error('judul')
                    <p class="text-xs text-red-500 font-bold mt-1 ml-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Baris Isi Berita (Textarea 'deskripsi' memetakan ke database 'isi') -->
            <div class="space-y-2">
                <label for="deskripsi" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Isi Berita</label>
                <textarea class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl focus:border-primary focus:bg-white outline-none font-semibold leading-relaxed transition-all text-sm resize-none @error('deskripsi') border-red-500 @enderror" id="deskripsi" name="deskripsi" rows="6" placeholder="Tuliskan berita lengkap Anda di sini..." required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-xs text-red-500 font-bold mt-1 ml-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Baris Gambar Sampul -->
            <div class="space-y-2">
                <label for="gambar" class="text-xs font-bold uppercase tracking-widest text-gray-400 ml-2">Gambar Sampul</label>
                <div class="border-2 border-dashed border-gray-200 p-6 rounded-2xl hover:border-primary transition-all bg-gray-50">
                    <input type="file" class="text-sm font-bold text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-primary/10 file:text-primary hover:file:bg-primary/20" id="gambar" name="gambar">
                    <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase">Format gambar wajib: JPEG, PNG, JPG, SVG (Maks. 2MB)</p>
                </div>
                @error('gambar')
                    <p class="text-xs text-red-500 font-bold mt-1 ml-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Navigasi Batal & Simpan -->
            <div class="flex items-center gap-4 pt-6 border-t border-gray-100 justify-end">
                <a href="{{ route('berita.index') }}" class="px-6 py-4 rounded-2xl font-bold text-sm text-gray-500 hover:bg-gray-100 transition-all">Batal</a>
                <button type="submit" class="bg-primary text-white px-8 py-4 rounded-2xl font-bold text-sm hover:shadow-xl hover:shadow-blue-200 transition-all active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Submit Berita
                </button>
            </div>
        </form>
    </div>
</div>
@endsection