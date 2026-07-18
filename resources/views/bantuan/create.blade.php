<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan Pelajar | PC IPM Cileungsi</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8', // Biru
                        accentGreen: '#10b981', // Hijau
                        accentOrange: '#f97316', // Orange
                        pinkBrand: '#ec4899', // Pink
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
            background-color: #f8fafc;
            background-image: radial-gradient(#1a73e808 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-between text-gray-900 font-sans hero-pattern antialiased">

    <!-- NAVBAR (Professional Transparent Backdrop Blur) -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-150 py-4 transition-all">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('landing') }}" class="flex items-center space-x-3 group">
                <div class="bg-primary/5 p-1.5 rounded-xl w-10 h-10 flex items-center justify-center overflow-hidden group-hover:scale-105 transition-transform duration-200">
                    <img src="{{ asset('images/logo-ipm-cileungsi.png') }}" 
                         alt="Logo IPM Cileungsi" 
                         class="h-8 w-auto object-contain"
                         onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2050/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%231a73e8\' stroke-width=\'2.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\'/></svg>';">
                </div>
                <div class="leading-none">
                    <span class="font-extrabold text-sm uppercase tracking-tight text-gray-800">IPM Cileungsi</span>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Portal Bantuan</p>
                </div>
            </a>
            <a href="{{ route('landing') }}" class="text-xs font-bold text-gray-600 hover:text-primary bg-gray-100 hover:bg-blue-50 px-4 py-2.5 rounded-full transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- FORM WRAPPER -->
    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="w-full max-w-5xl">
            
            <!-- OUTER CONTAINER: warna HITAM (Professional Deep Navy/Black Card Frame) -->
            <div class="bg-slate-950 p-1 sm:p-2 rounded-[2.5rem] shadow-2xl border border-slate-900 transition-all duration-500" id="outer-container">
                
                <div class="grid lg:grid-cols-12 gap-0 overflow-hidden rounded-[2.3rem]">
                    
                    <!-- LEFT COLUMN: Dark Info Card (warna HITAM inside the border frame) -->
                    <div class="lg:col-span-4 bg-slate-950 p-8 sm:p-10 flex flex-col justify-between relative overflow-hidden text-white">
                        <!-- Subtle Background Glows -->
                        <div class="absolute -top-12 -left-12 w-44 h-44 bg-blue-600/10 rounded-full blur-3xl transition-colors duration-500" id="glow-1"></div>
                        <div class="absolute -bottom-12 -right-12 w-44 h-44 bg-orange-650/10 rounded-full blur-3xl transition-colors duration-500" id="glow-2"></div>

                        <div class="relative z-10 space-y-8">
                            <div>
                                <span class="bg-white/10 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider text-accentOrange mb-4 inline-block" id="badge-theme">
                                    Layanan Pengaduan
                                </span>
                                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight uppercase mt-2">Pusat Bantuan Pelajar</h2>
                                <p class="text-xs text-slate-400 font-medium leading-relaxed mt-4">
                                    Tempat aman, privat, dan rahasia bagi pelajar Muhammadiyah Cileungsi untuk mengadukan masalah dan berkonsultasi.
                                </p>
                            </div>

                            <!-- Confidentiality features list -->
                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center shrink-0 text-accentOrange" id="conf-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                    </div>
                                    <div>
                                        <h5 class="text-xs font-bold">100% Rahasia</h5>
                                        <p class="text-[10px] text-slate-450 mt-0.5">Identitas Anda terjamin dan terenkripsi aman di sistem kami.</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center shrink-0 text-primary" id="conf-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    </div>
                                    <div>
                                        <h5 class="text-xs font-bold">Opsi Anonim</h5>
                                        <p class="text-[10px] text-slate-450 mt-0.5">Lapor tanpa mencantumkan identitas email jika diinginkan.</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center shrink-0 text-emerald-450" id="conf-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    </div>
                                    <div>
                                        <h5 class="text-xs font-bold">Pendampingan Khusus</h5>
                                        <p class="text-[10px] text-slate-450 mt-0.5">Tim Advokasi PC IPM Cileungsi akan mendampingi kasus Anda hingga selesai.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 pt-6 border-t border-white/5 relative z-10 text-[10px] font-bold tracking-widest text-slate-500 uppercase">
                            PC IPM Cileungsi &bull; Advokasi Pelajar
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Inner White Form Card (warna putih) -->
                    <div class="lg:col-span-8 bg-white p-8 sm:p-12">
                        
                        <!-- ALERT NOTIFICATIONS -->
                        @if(session('success'))
                            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-850 rounded-2xl flex items-start gap-3">
                                <div class="p-1 rounded-lg bg-emerald-500 text-white shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-emerald-950 text-sm">Laporan Berhasil Terkirim</h4>
                                    <p class="text-xs mt-0.5">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-8 p-4 bg-rose-50 border border-rose-100 text-rose-850 rounded-2xl flex items-start gap-3">
                                <div class="p-1 rounded-lg bg-rose-500 text-white shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-rose-950 text-sm">Ada Beberapa Kesalahan Input</h4>
                                    <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- FORM -->
                        <form action="{{ route('bantuan.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- KATEGORI MASALAH (Dropdown with Select Icon) -->
                            <div>
                                <label for="kategori_masalah" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5">Kategori Masalah</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 transition-colors" id="icon-container-kategori">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                    </div>
                                    <select name="kategori_masalah" id="kategori_masalah" onchange="updateTheme(this.value)" class="w-full appearance-none bg-gray-50/50 border border-gray-200 text-gray-800 py-3.5 pl-11 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-bold text-sm transition-all">
                                        <option value="Bullying & Perundungan" {{ old('kategori_masalah', $defaultKategori) === 'Bullying & Perundungan' ? 'selected' : '' }}>Bullying & Perundungan</option>
                                        <option value="Kesehatan Mental & Stres Belajar" {{ old('kategori_masalah', $defaultKategori) === 'Kesehatan Mental & Stres Belajar' ? 'selected' : '' }}>Kesehatan Mental & Stres Belajar</option>
                                        <option value="Kekerasan Seksual & Pelecehan" {{ old('kategori_masalah', $defaultKategori) === 'Kekerasan Seksual & Pelecehan' ? 'selected' : '' }}>Kekerasan Seksual & Pelecehan</option>
                                        <option value="Masalah Akademik & Sekolah" {{ old('kategori_masalah', $defaultKategori) === 'Masalah Akademik & Sekolah' ? 'selected' : '' }}>Masalah Akademik & Sekolah</option>
                                        <option value="Masalah Keluarga & Pribadi" {{ old('kategori_masalah', $defaultKategori) === 'Masalah Keluarga & Pribadi' ? 'selected' : '' }}>Masalah Keluarga & Pribadi</option>
                                        <option value="Lainnya" {{ old('kategori_masalah', $defaultKategori) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- TINGKAT SEKOLAH -->
                                <div>
                                    <label for="tingkat_sekolah" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5">Tingkat Sekolah</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                                        </div>
                                        <select name="tingkat_sekolah" id="tingkat_sekolah" class="w-full appearance-none bg-gray-50/50 border border-gray-200 text-gray-800 py-3.5 pl-11 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-semibold text-sm transition-all">
                                            <option value="" disabled selected>Pilih Tingkat</option>
                                            <option value="SD / MI" {{ old('tingkat_sekolah') === 'SD / MI' ? 'selected' : '' }}>SD / MI</option>
                                            <option value="SMP / MTs" {{ old('tingkat_sekolah') === 'SMP / MTs' ? 'selected' : '' }}>SMP / MTs</option>
                                            <option value="SMA / SMK / MA" {{ old('tingkat_sekolah') === 'SMA / SMK / MA' ? 'selected' : '' }}>SMA / SMK / MA</option>
                                            <option value="Lainnya" {{ old('tingkat_sekolah') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- ASAL RANTING -->
                                <div>
                                    <label for="asal_ranting" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5">Asal Ranting / Sekolah</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 17-7-7 7-7"/><path d="M12 17v-4a4 4 0 0 1 4-4h4"/></svg>
                                        </div>
                                        <input type="text" name="asal_ranting" id="asal_ranting" value="{{ old('asal_ranting') }}" placeholder="Contoh: Ranting SMA Muhammadiyah" class="w-full bg-gray-50/50 border border-gray-200 text-gray-800 py-3.5 pl-11 pr-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-sm transition-all">
                                    </div>
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div>
                                <div class="flex justify-between mb-2.5">
                                    <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Email Pengirim</label>
                                    <span class="text-[10px] text-gray-400 font-bold" id="email-hint">Wajib diisi</span>
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="contoh@email.com" class="w-full bg-gray-50/50 border border-gray-200 text-gray-800 py-3.5 pl-11 pr-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-sm transition-all">
                                </div>
                            </div>

                            <!-- MESSAGE -->
                            <div>
                                <label for="message" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5">Deskripsi Masalah / Laporan</label>
                                <textarea name="message" id="message" rows="5" placeholder="Tuliskan keluhan secara lengkap, jelas, dan faktual di sini agar kami dapat segera melakukan tindakan..." class="w-full bg-gray-50/50 border border-gray-200 text-gray-800 py-3.5 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-sm transition-all">{{ old('message') }}</textarea>
                            </div>

                            <!-- SUBMIT BUTTON (Bottom Right, Styled) -->
                            <div class="flex justify-end pt-4">
                                <button type="submit" id="submit-btn" class="w-full sm:w-auto bg-primary text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-blue-150 hover:shadow-xl transition-all active:scale-95 flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                                    Kirim Laporan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white py-6 border-t border-gray-200 text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
        <p>© 2026 Pimpinan Cabang IPM Cileungsi. All Rights Reserved.</p>
    </footer>

    <!-- INTERACTIVE THEME LOGIC -->
    <script>
        function updateTheme(val) {
            const outerContainer = document.getElementById('outer-container');
            const submitBtn = document.getElementById('submit-btn');
            const emailHint = document.getElementById('email-hint');
            const emailInput = document.getElementById('email');
            const badgeTheme = document.getElementById('badge-theme');
            
            // Icon containers
            const iconKategori = document.getElementById('icon-container-kategori');
            const confIcon1 = document.getElementById('conf-icon-1');
            const confIcon2 = document.getElementById('conf-icon-2');
            const confIcon3 = document.getElementById('conf-icon-3');

            // Glow spheres
            const glow1 = document.getElementById('glow-1');
            const glow2 = document.getElementById('glow-2');

            // Reset classes
            outerContainer.className = "p-1 sm:p-2 rounded-[2.5rem] shadow-2xl border transition-all duration-500 ";
            submitBtn.className = "w-full sm:w-auto px-8 py-4 rounded-xl font-bold transition-all active:scale-95 flex items-center justify-center gap-2 text-white shadow-lg ";
            
            // Dynamic highlights reset
            const elementsToStyle = [emailInput, document.getElementById('tingkat_sekolah'), document.getElementById('asal_ranting'), document.getElementById('message'), document.getElementById('kategori_masalah')];
            elementsToStyle.forEach(el => {
                el.className = el.className.replace(/\bfocus:ring-\S+/g, '');
            });

            if (val === 'Kekerasan Seksual & Pelecehan') {
                // Pink theme (Ruang Aman)
                outerContainer.classList.add('bg-pink-900', 'border-pink-850');
                submitBtn.classList.add('bg-pinkBrand', 'hover:bg-pink-650', 'shadow-pink-100');
                badgeTheme.innerText = "Ruang Aman Ipmawati";
                badgeTheme.className = "bg-pink-500/20 text-pink-400 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block";
                
                emailHint.innerText = "Dibutuhkan untuk pendampingan";
                emailInput.required = false;

                // Color accent shifts
                iconKategori.className = iconKategori.className.replace(/\btext-\S+/g, '') + ' text-pink-500';
                confIcon1.className = confIcon1.className.replace(/\btext-\S+/g, '') + ' text-pink-500';
                confIcon2.className = confIcon2.className.replace(/\btext-\S+/g, '') + ' text-pink-500';
                confIcon3.className = confIcon3.className.replace(/\btext-\S+/g, '') + ' text-pink-500';

                glow1.className = "absolute -top-12 -left-12 w-44 h-44 bg-pink-500/20 rounded-full blur-3xl transition-colors duration-500";
                glow2.className = "absolute -bottom-12 -right-12 w-44 h-44 bg-rose-500/20 rounded-full blur-3xl transition-colors duration-500";

                elementsToStyle.forEach(el => el.classList.add('focus:ring-pinkBrand'));
            } else if (val === 'Bullying & Perundungan') {
                // Black/Dark theme (Secure Anonim)
                outerContainer.classList.add('bg-slate-900', 'border-slate-800');
                submitBtn.classList.add('bg-slate-900', 'hover:bg-slate-800', 'shadow-slate-200/10', 'border', 'border-slate-700');
                badgeTheme.innerText = "Laporan Aman & Anonim";
                badgeTheme.className = "bg-slate-800 text-slate-350 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block";
                
                emailHint.innerText = "Opsional (Bisa dikosongkan)";
                emailInput.required = false;

                iconKategori.className = iconKategori.className.replace(/\btext-\S+/g, '') + ' text-slate-400';
                confIcon1.className = confIcon1.className.replace(/\btext-\S+/g, '') + ' text-slate-400';
                confIcon2.className = confIcon2.className.replace(/\btext-\S+/g, '') + ' text-slate-400';
                confIcon3.className = confIcon3.className.replace(/\btext-\S+/g, '') + ' text-slate-400';

                glow1.className = "absolute -top-12 -left-12 w-44 h-44 bg-slate-700/20 rounded-full blur-3xl transition-colors duration-500";
                glow2.className = "absolute -bottom-12 -right-12 w-44 h-44 bg-slate-850/20 rounded-full blur-3xl transition-colors duration-500";

                elementsToStyle.forEach(el => el.classList.add('focus:ring-slate-800'));
            } else {
                // Default Blue theme (Standard Aduan)
                outerContainer.classList.add('bg-slate-950', 'border-slate-900');
                submitBtn.classList.add('bg-primary', 'hover:bg-blue-600', 'shadow-blue-150');
                badgeTheme.innerText = "Aduan & Konsultasi Umum";
                badgeTheme.className = "bg-blue-500/20 text-blue-450 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block";
                
                emailHint.innerText = "Wajib diisi";
                emailInput.required = true;

                iconKategori.className = iconKategori.className.replace(/\btext-\S+/g, '') + ' text-primary';
                confIcon1.className = confIcon1.className.replace(/\btext-\S+/g, '') + ' text-accentOrange';
                confIcon2.className = confIcon2.className.replace(/\btext-\S+/g, '') + ' text-primary';
                confIcon3.className = confIcon3.className.replace(/\btext-\S+/g, '') + ' text-accentGreen';

                glow1.className = "absolute -top-12 -left-12 w-44 h-44 bg-blue-650/15 rounded-full blur-3xl transition-colors duration-500";
                glow2.className = "absolute -bottom-12 -right-12 w-44 h-44 bg-orange-500/10 rounded-full blur-3xl transition-colors duration-500";

                elementsToStyle.forEach(el => el.classList.add('focus:ring-primary'));
            }
        }

        // Initialize theme on load
        document.addEventListener('DOMContentLoaded', () => {
            updateTheme(document.getElementById('kategori_masalah').value);
        });
    </script>

</body>
</html>
