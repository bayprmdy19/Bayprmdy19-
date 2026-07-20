<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan Pelajar | PC IPM Cileungsi</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8',
                        accentGreen: '#10b981',
                        accentOrange: '#f97316',
                        pinkBrand: '#ec4899',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#1a73e811 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .group:hover .dropdown-menu { display: block; }
    </style>
</head>
<body class="bg-white text-gray-900 font-sans selection:bg-blue-100 selection:text-primary">
    @php
        $anggotaAuth = auth('anggota')->user();
        $adminAuth = auth()->user();
        $arsipUrl = $anggotaAuth ? route('anggota.arsip.index') : route('login');
    @endphp

    <nav class="sticky top-0 z-50 bg-primary border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-20 items-center">
            <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                <div class="bg-white p-1 rounded-xl shadow-md w-12 h-12 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo-ipm-cileungsi.png') }}"
                         alt="Logo IPM Cileungsi"
                         class="h-10 w-auto object-contain"
                         onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%231a73e8\' stroke-width=\'2.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\'/></svg>';">
                </div>
                <div class="leading-none">
                    <span class="text-xl font-extrabold tracking-tighter text-white uppercase">IPM Cileungsi</span>
                    <p class="text-[9px] font-bold text-blue-100 uppercase tracking-widest">Portal Web Resmi</p>
                </div>
            </a>

            <div class="hidden md:flex items-center space-x-6 text-sm font-bold">
                <a href="{{ route('landing') }}" class="text-blue-50 hover:text-white transition-colors py-2">Beranda</a>
                <a href="{{ route('landing') }}#struktur" class="text-blue-50 hover:text-white transition-colors py-2">Struktur</a>
                <a href="{{ route('landing') }}#berita" class="text-blue-50 hover:text-white transition-colors py-2">Berita</a>
                <a href="{{ route('bantuan.create') }}" class="text-white bg-white/10 px-4 py-2 rounded-full transition-all">Pusat Bantuan</a>
                @if ($anggotaAuth)
                    <div class="group relative">
                        <button class="flex items-center gap-2 rounded-full border border-white px-5 py-2.5 text-white transition-all hover:bg-white/10">
                            {{ $anggotaAuth->nama }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="dropdown-menu absolute right-0 hidden w-52 rounded-2xl border border-gray-100 bg-white p-2 text-gray-800 shadow-2xl">
                            <a href="{{ route('anggota.profile.edit') }}" class="block rounded-xl p-3 transition-colors hover:bg-gray-50">Profile</a>
                            <a href="{{ route('anggota.arsip.index') }}" class="block rounded-xl p-3 transition-colors hover:bg-gray-50">Arsip</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full rounded-xl p-3 text-left transition-colors hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    </div>
                @elseif ($adminAuth)
                    <a href="{{ route('admin.dashboard') }}" class="border border-white text-white px-6 py-2.5 rounded-full transition-all hover:bg-white/10">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="border border-white text-white px-6 py-2.5 rounded-full transition-all hover:bg-white/10">Login</a>
                @endif
            </div>

            <div class="md:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-primary border-t border-white/10 p-6 flex flex-col gap-4 font-bold text-blue-50">
            <a href="{{ route('landing') }}" class="text-white">Beranda</a>
            <a href="{{ route('landing') }}#struktur" class="hover:text-white">Struktur Organisasi</a>
            <a href="{{ route('landing') }}#berita" class="hover:text-white">Berita</a>
            <a href="{{ $arsipUrl }}" class="hover:text-white">Arsip</a>
            <a href="{{ route('bantuan.create') }}" class="bg-accentOrange text-white text-center py-4 rounded-2xl">Pusat Bantuan Pelajar</a>
            @if ($anggotaAuth)
                <a href="{{ route('anggota.profile.edit') }}" class="border border-white text-white text-center py-4 rounded-2xl">{{ $anggotaAuth->nama }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full border border-white text-white text-center py-4 rounded-2xl">Logout</button>
                </form>
            @elseif ($adminAuth)
                <a href="{{ route('admin.dashboard') }}" class="border border-white text-white text-center py-4 rounded-2xl">Dashboard Admin</a>
            @else
                <a href="{{ route('login') }}" class="border border-white text-white text-center py-4 rounded-2xl">Login</a>
            @endif
        </div>
    </nav>

    <main class="hero-pattern">
        <section class="pt-14 pb-8 sm:pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[1.05fr_1.25fr] items-start">
                    <div class="space-y-6">
                        <div class="inline-flex items-center gap-2 rounded-full border border-orange-100 bg-orange-50 px-4 py-2 text-xs font-extrabold uppercase tracking-widest text-accentOrange">
                            <span class="h-2 w-2 rounded-full bg-accentOrange"></span>
                            Ruang Aman Pelajar
                        </div>

                        <div>
                            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tighter text-primary leading-[1.05]">
                                Ceritakan masalahmu dengan tenang.
                            </h1>
                            <p class="mt-5 max-w-xl text-base sm:text-lg font-medium leading-8 text-gray-500">
                                Kamu bisa menyampaikan keluhan, keresahan, atau situasi yang sedang dihadapi dengan lebih aman. Tim pusat bantuan akan menjaga kerahasiaan laporanmu dan menanganinya dengan hati-hati.
                            </p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div class="rounded-[2rem] border border-blue-100 bg-white p-5 shadow-sm">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Ruang Cerita</p>
                                <p class="mt-2 text-sm font-bold text-gray-800">Sampaikan aduan tanpa merasa sendirian</p>
                            </div>
                            <div class="rounded-[2rem] border border-pink-100 bg-white p-5 shadow-sm">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Kerahasiaan</p>
                                <p class="mt-2 text-sm font-bold text-gray-800">Identitasmu dijaga sesuai kebutuhanmu</p>
                            </div>
                            <div class="rounded-[2rem] border border-emerald-100 bg-white p-5 shadow-sm">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Pendampingan</p>
                                <p class="mt-2 text-sm font-bold text-gray-800">Laporanmu dibaca dan ditindaklanjuti</p>
                            </div>
                        </div>

                        <div class="rounded-[2rem] bg-slate-950 p-6 text-white shadow-2xl shadow-slate-200">
                            <div class="flex items-start gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/10 text-accentOrange">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[0.22em] text-blue-200">Komitmen Kerahasiaan</p>
                                    <p class="mt-3 text-sm leading-7 text-slate-300">
                                        Setiap informasi yang kamu kirim diperlakukan secara hati-hati untuk kebutuhan penanganan dan pendampingan. Jika ingin tetap lebih privat, isi hanya data yang memang perlu kamu bagikan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2.5rem] border border-white/70 bg-white/90 p-5 shadow-[0_25px_80px_rgba(26,115,232,0.14)] backdrop-blur-sm sm:p-7">
                        <div class="rounded-[2rem] bg-gradient-to-br from-blue-50 via-white to-orange-50 p-6 sm:p-8 border border-blue-100/60">
                            <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
                                <div>
                                    <p id="badge-theme" class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-primary">
                                        Aduan dan Konsultasi Umum
                                    </p>
                                    <h2 class="mt-4 text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">Sampaikan laporanmu dengan aman</h2>
                                    <p class="mt-2 text-sm leading-7 text-gray-500">
                                        Tuliskan seperlunya dengan bahasa yang nyaman buatmu. Kami membaca laporan ini sebagai ruang bantuan, bukan ruang menghakimi.
                                    </p>
                                </div>
                                <a href="{{ route('landing') }}#bantuan" class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-4 py-2 text-xs font-bold text-gray-600 transition hover:border-primary hover:text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                                    Kembali ke kartu layanan
                                </a>
                            </div>

                            @if(session('success'))
                                <div class="mb-6 rounded-2xl border border-emerald-100 bg-emerald-50 p-4 text-sm text-emerald-800">
                                    <p class="font-bold text-emerald-950">Laporan berhasil terkirim.</p>
                                    <p class="mt-1">{{ session('success') }}</p>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="mb-6 rounded-2xl border border-rose-100 bg-rose-50 p-4 text-sm text-rose-800">
                                    <p class="font-bold text-rose-950">Masih ada input yang perlu diperbaiki.</p>
                                    <ul class="mt-2 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>- {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('bantuan.store') }}" method="POST" class="space-y-5">
                                @csrf

                                <div>
                                    <label for="kategori_masalah" class="mb-2 block text-[11px] font-black uppercase tracking-[0.18em] text-gray-400">Kategori Masalah</label>
                                    <div class="relative">
                                        <div id="icon-container-kategori" class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        </div>
                                        <select name="kategori_masalah" id="kategori_masalah" onchange="updateTheme(this.value)" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white py-4 pl-11 pr-12 text-sm font-bold text-gray-800 outline-none transition focus:border-transparent focus:ring-2 focus:ring-primary">
                                            <option value="Bullying & Perundungan" {{ old('kategori_masalah', $defaultKategori) === 'Bullying & Perundungan' ? 'selected' : '' }}>Bullying & Perundungan</option>
                                            <option value="Kesehatan Mental & Stres Belajar" {{ old('kategori_masalah', $defaultKategori) === 'Kesehatan Mental & Stres Belajar' ? 'selected' : '' }}>Kesehatan Mental & Stres Belajar</option>
                                            <option value="Kekerasan Seksual & Pelecehan" {{ old('kategori_masalah', $defaultKategori) === 'Kekerasan Seksual & Pelecehan' ? 'selected' : '' }}>Kekerasan Seksual & Pelecehan</option>
                                            <option value="Masalah Akademik & Sekolah" {{ old('kategori_masalah', $defaultKategori) === 'Masalah Akademik & Sekolah' ? 'selected' : '' }}>Masalah Akademik & Sekolah</option>
                                            <option value="Masalah Keluarga & Pribadi" {{ old('kategori_masalah', $defaultKategori) === 'Masalah Keluarga & Pribadi' ? 'selected' : '' }}>Masalah Keluarga & Pribadi</option>
                                            <option value="Lainnya" {{ old('kategori_masalah', $defaultKategori) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid gap-5 sm:grid-cols-2">
                                    <div>
                                        <label for="tingkat_sekolah" class="mb-2 block text-[11px] font-black uppercase tracking-[0.18em] text-gray-400">Tingkat Sekolah</label>
                                        <select name="tingkat_sekolah" id="tingkat_sekolah" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-4 text-sm font-semibold text-gray-800 outline-none transition focus:border-transparent focus:ring-2 focus:ring-primary">
                                            <option value="" disabled {{ old('tingkat_sekolah') ? '' : 'selected' }}>Pilih Tingkat</option>
                                            <option value="SMP / MTs" {{ old('tingkat_sekolah') === 'SMP / MTs' ? 'selected' : '' }}>SMP / MTs</option>
                                            <option value="SMA / SMK / MA" {{ old('tingkat_sekolah') === 'SMA / SMK / MA' ? 'selected' : '' }}>SMA / SMK / MA</option>
                                            <option value="Lainnya" {{ old('tingkat_sekolah') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="asal_ranting" class="mb-2 block text-[11px] font-black uppercase tracking-[0.18em] text-gray-400">Asal Ranting atau Sekolah</label>
                                        <input type="text" name="asal_ranting" id="asal_ranting" value="{{ old('asal_ranting') }}" placeholder="Contoh: SMA Muhammadiyah Cileungsi" class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-sm font-medium text-gray-800 outline-none transition focus:border-transparent focus:ring-2 focus:ring-primary">
                                    </div>
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center justify-between gap-3">
                                        <label for="email" class="block text-[11px] font-black uppercase tracking-[0.18em] text-gray-400">Email Pengirim</label>
                                        <span id="email-hint" class="text-[11px] font-bold text-gray-400">Wajib diisi</span>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="contoh@email.com" class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-sm font-medium text-gray-800 outline-none transition focus:border-transparent focus:ring-2 focus:ring-primary">
                                </div>

                                <div>
                                    <label for="message" class="mb-2 block text-[11px] font-black uppercase tracking-[0.18em] text-gray-400">Deskripsi Masalah</label>
                                    <textarea name="message" id="message" rows="6" placeholder="Tuliskan situasi yang sedang Anda hadapi secara jelas agar kami bisa membantu dengan lebih tepat." class="w-full rounded-[1.5rem] border border-gray-200 bg-white px-4 py-4 text-sm font-medium leading-7 text-gray-800 outline-none transition focus:border-transparent focus:ring-2 focus:ring-primary">{{ old('message') }}</textarea>
                                </div>

                                <div class="rounded-[1.75rem] border border-gray-100 bg-white px-5 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-primary" id="conf-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        </div>
                                        <div class="space-y-1 text-sm text-gray-500">
                                            <p class="font-bold text-gray-900">Laporanmu dipakai untuk keperluan bantuan dan pendampingan.</p>
                                            <p>Jika ingin lebih aman, kamu bisa membatasi identitas yang ditulis dan tetap menjelaskan masalah inti yang sedang terjadi.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                                    <a href="{{ route('landing') }}#bantuan" class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 transition hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                                        Kembali ke landing page
                                    </a>
                                    <button type="submit" id="submit-btn" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-extrabold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-600 sm:w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                                        Kirim Laporan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-50 border-t border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-3 text-center sm:flex-row sm:items-center sm:justify-between sm:text-left">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-widest text-primary">IPM Cileungsi</p>
                <p class="mt-1 text-xs font-bold uppercase tracking-[0.18em] text-gray-400">Pusat Bantuan Pelajar</p>
            </div>
            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-gray-400">2026 Pimpinan Cabang IPM Cileungsi. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function updateTheme(val) {
            const submitBtn = document.getElementById('submit-btn');
            const emailHint = document.getElementById('email-hint');
            const emailInput = document.getElementById('email');
            const badgeTheme = document.getElementById('badge-theme');
            const iconKategori = document.getElementById('icon-container-kategori');
            const confIcon1 = document.getElementById('conf-icon-1');
            const formFields = [
                document.getElementById('tingkat_sekolah'),
                document.getElementById('asal_ranting'),
                document.getElementById('message'),
                document.getElementById('kategori_masalah'),
                emailInput
            ];

            submitBtn.className = 'inline-flex w-full items-center justify-center gap-2 rounded-2xl px-7 py-4 text-sm font-extrabold text-white shadow-lg transition sm:w-auto';
            iconKategori.className = 'pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4';
            confIcon1.className = 'mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl';

            formFields.forEach((field) => {
                field.className = field.className.replace(/\bfocus:ring-\S+/g, '').trim();
            });

            if (val === 'Kekerasan Seksual & Pelecehan') {
                submitBtn.classList.add('bg-pinkBrand', 'hover:bg-pink-600', 'shadow-pink-200');
                badgeTheme.textContent = 'Ruang Aman Ipmawati';
                badgeTheme.className = 'inline-flex rounded-full bg-pink-100 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-pink-600';
                emailHint.textContent = 'Dibutuhkan bila ingin dihubungi';
                emailInput.required = false;
                iconKategori.classList.add('text-pink-500');
                confIcon1.classList.add('bg-pink-50', 'text-pink-500');
                formFields.forEach((field) => field.classList.add('focus:ring-pinkBrand'));
                return;
            }

            if (val === 'Bullying & Perundungan') {
                submitBtn.classList.add('bg-slate-900', 'hover:bg-slate-800', 'shadow-slate-200');
                badgeTheme.textContent = 'Laporan Aman dan Anonim';
                badgeTheme.className = 'inline-flex rounded-full bg-slate-100 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-slate-700';
                emailHint.textContent = 'Opsional bila ingin anonim';
                emailInput.required = false;
                iconKategori.classList.add('text-slate-600');
                confIcon1.classList.add('bg-slate-100', 'text-slate-700');
                formFields.forEach((field) => field.classList.add('focus:ring-slate-800'));
                return;
            }

            submitBtn.classList.add('bg-primary', 'hover:bg-blue-600', 'shadow-blue-200');
            badgeTheme.textContent = 'Aduan dan Konsultasi Umum';
            badgeTheme.className = 'inline-flex rounded-full bg-blue-100 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-primary';
            emailHint.textContent = 'Wajib diisi';
            emailInput.required = true;
            iconKategori.classList.add('text-primary');
            confIcon1.classList.add('bg-blue-50', 'text-primary');
            formFields.forEach((field) => field.classList.add('focus:ring-primary'));
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateTheme(document.getElementById('kategori_masalah').value);
        });
    </script>
</body>
</html>
