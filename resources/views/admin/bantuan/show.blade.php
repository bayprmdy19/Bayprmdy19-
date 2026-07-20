@extends('layouts.admin')

@section('title', 'Detail Laporan Bantuan')
@section('page_title', 'Detail Laporan')
@section('page_subtitle', 'Informasi lengkap laporan aduan pelajar')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Breadcrumb & Tombol Kembali --}}
    <div class="flex items-center justify-between">
        <nav class="flex items-center gap-2 text-xs font-bold text-gray-400">
            <a href="{{ route('admin.bantuan.index') }}" class="hover:text-primary transition-colors">Bantuan Pelajar</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <span class="text-gray-600">Detail Laporan #{{ $bantuan->id }}</span>
        </nav>
        <a href="{{ route('admin.bantuan.index') }}"
           class="inline-flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-4 py-2 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            Kembali
        </a>
    </div>

    {{-- Header Laporan --}}
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-primary/5 to-transparent">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#1a73e8" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-black uppercase tracking-widest text-gray-400 mb-0.5">Laporan Aduan Pelajar</p>
                    <h2 class="text-xl font-extrabold text-gray-900">Detail Laporan #{{ $bantuan->id }}</h2>
                </div>
            </div>

            {{-- Badge Kategori --}}
            @if ($bantuan->kategori_masalah === 'Kekerasan Seksual & Pelecehan')
                <span class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-black text-white" style="background-color:#ec4899">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/70"></span>
                    Kekerasan & Pelecehan
                </span>
            @elseif ($bantuan->kategori_masalah === 'Bullying & Perundungan')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-900 px-4 py-2 text-xs font-black text-white">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/70"></span>
                    Bullying & Perundungan
                </span>
            @elseif ($bantuan->kategori_masalah === 'Kesehatan Mental & Stres Belajar')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-accentGreen px-4 py-2 text-xs font-black text-white">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/70"></span>
                    Kesehatan Mental
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary px-4 py-2 text-xs font-black text-white">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/70"></span>
                    {{ $bantuan->kategori_masalah }}
                </span>
            @endif
        </div>

        {{-- Info Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 divide-x divide-y divide-gray-100 border-b border-gray-100">

            {{-- Tanggal Laporan --}}
            <div class="p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    Tanggal Laporan
                </p>
                <p class="text-base font-extrabold text-gray-900">
                    {{ $bantuan->created_at->setTimezone('Asia/Jakarta')->format('d F Y') }}
                </p>
                <p class="text-sm font-semibold text-gray-500 mt-0.5">
                    {{ $bantuan->created_at->setTimezone('Asia/Jakarta')->format('H:i') }} WIB
                </p>
            </div>

            {{-- Kategori Masalah --}}
            <div class="p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                    Kategori Masalah
                </p>
                <p class="text-base font-extrabold text-gray-900">{{ $bantuan->kategori_masalah }}</p>
            </div>

            {{-- Tingkat Sekolah --}}
            <div class="p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    Tingkat Sekolah
                </p>
                <p class="text-base font-extrabold text-gray-900">{{ $bantuan->tingkat_sekolah }}</p>
            </div>

            {{-- Asal Ranting --}}
            <div class="p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    Asal Ranting / Sekolah
                </p>
                <p class="text-base font-extrabold text-gray-900">{{ $bantuan->asal_ranting ?: '-' }}</p>
            </div>

            {{-- Email Pengirim --}}
            <div class="p-6 col-span-2">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    Email Pengirim
                </p>
                @if ($bantuan->email)
                    <a href="mailto:{{ $bantuan->email }}"
                       class="text-base font-extrabold text-primary hover:underline">
                        {{ $bantuan->email }}
                    </a>
                @else
                    <p class="text-base font-extrabold text-gray-400 italic">Anonim — tidak dicantumkan</p>
                @endif
            </div>

        </div>

        {{-- Isi Pesan / Laporan --}}
        <div class="p-8">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4 flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Isi Laporan / Pesan
            </p>
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 text-gray-800 text-sm font-medium leading-relaxed"
                 style="white-space: pre-wrap; min-height: 160px;">{{ $bantuan->message }}</div>
        </div>

        {{-- Footer Aksi --}}
        <div class="flex items-center justify-between px-8 py-5 bg-gray-50 border-t border-gray-100 rounded-b-3xl">
            <a href="{{ route('admin.bantuan.index') }}"
               class="inline-flex items-center gap-2 rounded-2xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-bold text-gray-600 hover:bg-gray-100 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                Kembali ke Daftar
            </a>

            <form action="{{ route('admin.bantuan.destroy', $bantuan->id) }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini? Tindakan ini tidak bisa dibatalkan.')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-2xl bg-red-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-red-700 transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="m19 6-.867 12.142A2 2 0 0 1 16.138 20H7.862a2 2 0 0 1-1.995-1.858L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                    Hapus Laporan
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
