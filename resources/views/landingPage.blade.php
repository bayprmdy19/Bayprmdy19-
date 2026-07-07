<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Web IPM Cileungsi | Beranda</title>
    
    <!-- Font Utama: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8', // Biru Medium / Google Blue (Cerah, Bersih, dan Tidak Terlalu Gelap)
                        accentGreen: '#10b981', // Hijau
                        accentOrange: '#f97316', // Orange
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .section-padding { padding-top: 6rem; padding-bottom: 6rem; }
        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#1a73e811 1px, transparent 1px);
            background-size: 20px 20px;
        }
        /* Style untuk dropdown agar muncul saat hover */
        .group:hover .dropdown-menu { display: block; }
    </style>
</head>
<body class="bg-white text-gray-900 font-sans selection:bg-blue-100 selection:text-primary">

    <!-- NAVIGASI (Menggunakan Biru Medium yang Lebih Cerah & Fresh) -->
    <nav class="sticky top-0 z-50 bg-primary border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-20 items-center">
            <!-- Logo Resmi IPM Cileungsi yang Baru -->
            <a href="#" class="flex items-center space-x-3">
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
            
            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-bold">
                <a href="#" class="text-white bg-white/10 px-4 py-2 rounded-full transition-all">Beranda</a>
                
                <!-- Profil Dropdown -->
                <div class="group relative">
                    <button class="flex items-center gap-1 text-blue-50 hover:text-white transition-colors py-2">
                        Profil 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-2xl rounded-2xl p-2 w-52 border border-gray-100 mt-0 text-gray-800">
                        <a href="#sejarah" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors">Sejarah</a>
                        <a href="#struktur" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors font-semibold text-primary">Struktur Organisasi</a>
                        <a href="#arsip" class="block p-3 hover:bg-gray-50 rounded-xl border-t mt-1 transition-colors text-accentOrange">Arsip</a>
                    </div>
                </div>

                <!-- Label Dropdown -->
                <div class="group relative">
                    <button class="flex items-center gap-1 text-blue-50 hover:text-white transition-colors py-2">
                        Label 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-2xl rounded-2xl p-2 w-48 border border-gray-100 mt-0 text-gray-800">
                        <a href="#berita" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors">Berita</a>
                        <a href="#kegiatan" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors">Kegiatan</a>
                        <a href="#opini" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors">Opini</a>
                    </div>
                </div>
                
                <!-- Tombol Pusat Bantuan dengan Aksen Orange Terbaca -->
                <a href="#bantuan" class="bg-accentOrange text-white px-6 py-2.5 rounded-full hover:shadow-xl hover:bg-orange-600 transition-all active:scale-95">Pusat Bantuan</a>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Mobile) -->
        <div id="mobile-menu" class="hidden md:hidden bg-primary border-t border-white/10 p-6 flex flex-col gap-4 font-bold text-blue-50">
            <a href="#" class="text-white">Beranda</a>
            <a href="#sejarah" class="hover:text-white">Sejarah</a>
            <a href="#struktur" class="hover:text-white">Struktur Organisasi</a>
            <a href="#arsip" class="hover:text-white">Arsip</a>
            <hr class="border-white/10">
            <a href="#berita" class="hover:text-white">Berita</a>
            <a href="#kegiatan" class="hover:text-white">Kegiatan</a>
            <a href="#opini" class="hover:text-white">Opini</a>
            <a href="#bantuan" class="bg-accentOrange text-white text-center py-4 rounded-2xl">Pusat Bantuan Pelajar</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="section-padding hero-pattern overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 items-center gap-16">
            <div class="animate-in fade-in slide-in-from-left duration-700">
                <div class="inline-flex items-center gap-2 bg-orange-50 text-accentOrange px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-widest mb-8 border border-orange-100">
                    <span class="w-2 h-2 bg-accentOrange rounded-full animate-pulse"></span>
                    Nuansa Pelajar Berkemajuan
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-primary leading-[1.05] mb-8 tracking-tighter">
                    Inspirasi <span class="text-accentOrange">Karya</span>,<br>Wadah <span class="text-accentGreen">Aspirasi</span>.
                </h1>
                <p class="text-xl text-gray-500 font-medium leading-relaxed mb-12 max-w-lg">
                    Portal resmi Pimpinan Cabang IPM Cileungsi. Satu pintu untuk berita terbaru, arsip digital, dan bantuan keamanan pelajar.
                </p>
                <div class="flex flex-col sm:flex-row gap-5">
                    <a href="#bantuan" class="bg-primary text-white text-center px-10 py-5 rounded-[2rem] font-extrabold text-lg shadow-2xl shadow-blue-200 hover:scale-105 transition-all">Pusat Bantuan Pelajar</a>
                    <a href="#arsip" class="bg-white border-2 border-gray-100 text-gray-700 text-center px-10 py-5 rounded-[2rem] font-extrabold text-lg hover:bg-gray-50 transition-all">Jelajahi Arsip</a>
                </div>
            </div>
            <div class="relative animate-in fade-in slide-in-from-right duration-1000">
                <!-- Frame Gambar Utama Lanskap (Mendukung file hero-ipm.jpg Anda) -->
                <div class="bg-gray-100 aspect-[4/3] rounded-[4rem] shadow-2xl border-[12px] border-white rotate-2 overflow-hidden flex items-center justify-center text-gray-300 font-bold italic text-xl text-center">
                    <img src="{{ asset('images/hero-ipm.jpg') }}" 
                         alt="Pelantikan PC IPM Cileungsi" 
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%231a73e8\' stroke-width=\'2.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><rect width=\'18\' height=\'18\' x=\'3\' y=\'3\' rx=\'2\' ry=\'2\'/><circle cx=\'9\' cy=\'9\' r=\'2\'/><path d=\'m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21\'/></svg>';">
                </div>
                <div class="absolute -bottom-8 -left-8 bg-accentGreen p-8 rounded-[2.5rem] shadow-xl text-white hidden md:block border-4 border-white">
                    <p class="text-4xl font-black leading-none mb-1">10+</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-90">Bidang Organisasi</p>
                </div>
            </div>
        </div>
    </header>

    <!-- SECTION: SEJARAH -->
    <section id="sejarah" class="section-padding bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-extrabold text-primary mb-8 uppercase tracking-tighter">Sejarah & Perjalanan</h2>
            <div class="prose prose-lg text-gray-600 leading-[2] font-medium italic">
                "Ikatan Pelajar Muhammadiyah (IPM) Cileungsi merupakan bagian integral dari gerakan dakwah Muhammadiyah di wilayah Bogor Timur. Berdiri dengan semangat kemajuan, IPM Cileungsi terus berupaya menjadi wadah pemberdayaan, literasi, dan advokasi yang inklusif bagi seluruh pelajar."
            </div>
        </div>
    </section>

    <!-- SECTION: STRUKTUR ORGANISASI (INTERAKTIF & DRILL-DOWN) -->
    <section id="struktur" class="section-padding bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-primary mb-4 uppercase tracking-tighter">Struktur Kepengurusan</h2>
                <div class="w-20 h-1.5 bg-accentOrange mx-auto mt-4 rounded-full"></div>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-4">Pimpinan Umum & Bidang PC IPM Cileungsi</p>
                <p class="text-gray-400 text-sm italic mt-2">Klik pada setiap pengurus atau bidang untuk melihat detail anggota dan fokus gerakan</p>
            </div>
            
            <!-- Pimpinan Umum -->
            <div class="grid md:grid-cols-3 gap-6 mb-16">
                <div class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm text-center hover:border-primary hover:shadow-md transition-all group cursor-pointer" onclick="showDrillDown('umum')">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-2 group-hover:text-primary">Ketua Umum</p>
                    <h4 class="text-xl font-bold text-gray-800">Zaki Muhammad</h4>
                </div>
                <div class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm text-center hover:border-primary hover:shadow-md transition-all group cursor-pointer" onclick="showDrillDown('umum')">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-2 group-hover:text-primary">Sekretaris Umum</p>
                    <h4 class="text-xl font-bold text-gray-800">Ahmad Faiz</h4>
                </div>
                <div class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm text-center hover:border-primary hover:shadow-md transition-all group cursor-pointer" onclick="showDrillDown('umum')">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-2 group-hover:text-primary">Bendahara Umum</p>
                    <h4 class="text-xl font-bold text-gray-800">Siti Aisyah</h4>
                </div>
            </div>

            <!-- Bidang-Bidang -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                <button onclick="showDrillDown('perkaderan')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Perkaderan</button>
                <button onclick="showDrillDown('kdi')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Kajian Dakwah Islam (KDI)</button>
                <button onclick="showDrillDown('pip')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang PIP</button>
                <button onclick="showDrillDown('asbo')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Apresiasi Seni Budaya dan Olahraga (Asbo)</button>
                <button onclick="showDrillDown('pkk')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Pengembangan Kreatifitas dan Kewirausahaan</button>
                <button onclick="showDrillDown('keipmawatian')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Keipmawatian</button>
                <button onclick="showDrillDown('advokasi')" class="bg-blue-50 p-6 rounded-2xl border border-blue-100/60 font-bold text-sm text-center hover:bg-primary hover:text-white transition-all text-primary duration-300 active:scale-95 outline-none">Bidang Advokasi</button>
                <div class="bg-gray-100 p-6 rounded-2xl border border-gray-200 font-bold text-sm text-center opacity-50 flex items-center justify-center italic text-gray-500 select-none">Pusat Data Pengurus</div>
            </div>

            <!-- Panel Detail Drill-Down Dinamis -->
            <div id="drilldown-panel" class="hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-xl p-8 md:p-12 transition-all duration-500 transform translate-y-4 opacity-0 max-w-4xl mx-auto">
                <div class="flex justify-between items-start border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <span id="dd-badge" class="bg-blue-100 text-primary text-[10px] font-black px-3 py-1 rounded-full uppercase">BIDANG</span>
                        <h3 id="dd-title" class="text-3xl font-extrabold text-primary mt-2">Nama Struktur</h3>
                    </div>
                    <button onclick="closeDrillDown()" class="text-gray-400 hover:text-gray-600 bg-gray-50 p-2 rounded-full transition-colors outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                    </button>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h5 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Struktur Anggota</h5>
                        <ul id="dd-members" class="space-y-3 text-gray-700 font-medium">
                            <!-- Diisi via JS -->
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Fokus Gerakan & Program</h5>
                        <p id="dd-desc" class="text-gray-500 leading-relaxed text-sm mb-4">
                            <!-- Diisi via JS -->
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: LABEL (BERITA, KEGIATAN, OPINI) -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-primary uppercase tracking-tighter">Update Terbaru</h2>
                <div class="w-20 h-1.5 bg-accentOrange mx-auto mb-6 rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Berita -->
                <article id="berita" class="bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-video bg-gray-100 flex items-center justify-center text-gray-300 font-bold italic">Thumbnail Berita</div>
                    <div class="p-8">
                        <span class="bg-blue-100 text-primary text-[10px] font-black px-3 py-1 rounded-full uppercase">Berita</span>
                        <h3 class="text-xl font-bold mt-4 mb-2 group-hover:text-primary transition-colors">Peluncuran Portal Web Resmi IPM Cileungsi</h3>
                        <p class="text-gray-500 text-sm mb-6">Langkah digitalisasi organisasi untuk memudahkan akses informasi bagi seluruh pelajar...</p>
                        <a href="#" class="text-primary font-bold text-xs uppercase inline-flex items-center gap-2">Baca Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-7-7 7 7-7 7"/></svg></a>
                    </div>
                </article>

                <!-- Kegiatan -->
                <article id="kegiatan" class="bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-video bg-gray-100 flex items-center justify-center text-gray-300 font-bold italic">Thumbnail Kegiatan</div>
                    <div class="p-8">
                        <span class="bg-green-100 text-accentGreen text-[10px] font-black px-3 py-1 rounded-full uppercase">Kegiatan</span>
                        <h3 class="text-xl font-bold mt-4 mb-2 group-hover:text-primary transition-colors">Fortasi 2024: Semangat Kader Berkemajuan</h3>
                        <p class="text-gray-500 text-sm mb-6">Melihat keseruan penyambutan siswa baru di lingkungan perguruan Muhammadiyah Cileungsi...</p>
                        <a href="#" class="text-primary font-bold text-xs uppercase inline-flex items-center gap-2">Lihat Laporan <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-7-7 7 7-7 7"/></svg></a>
                    </div>
                </article>

                <!-- Opini -->
                <article id="opini" class="bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-video bg-gray-100 flex items-center justify-center text-gray-300 font-bold italic">Thumbnail Opini</div>
                    <div class="p-8">
                        <span class="bg-orange-100 text-accentOrange text-[10px] font-black px-3 py-1 rounded-full uppercase">Opini</span>
                        <h3 class="text-xl font-bold mt-4 mb-2 group-hover:text-primary transition-colors">Literasi Digital di Era Milenial</h3>
                        <p class="text-gray-500 text-sm mb-6">Tulisan menarik dari kader mengenai tantangan informasi di media sosial saat ini...</p>
                        <a href="#" class="text-primary font-bold text-xs uppercase inline-flex items-center gap-2">Baca Opini <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-7-7 7 7-7 7"/></svg></a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- SECTION: ARSIP -->
    <section id="arsip" class="py-24 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 mb-12">
                <div>
                    <h2 class="text-4xl font-extrabold mb-4 uppercase tracking-tighter">Pusat Arsip Digital</h2>
                    <p class="text-gray-400 font-medium italic">Pusat berkas, administrasi, dan panduan organisasi.</p>
                </div>
                <div class="flex gap-4 w-full md:w-auto">
                    <input type="text" placeholder="Cari dokumen..." class="bg-white/10 border border-white/20 px-6 py-4 rounded-2xl w-full md:w-80 outline-none focus:bg-white/20 font-bold">
                    <button class="bg-primary px-8 py-4 rounded-2xl font-bold hover:bg-blue-600 text-white">Cari</button>
                </div>
            </div>
            
            <div class="grid gap-4">
                <div class="bg-white/5 p-6 rounded-2xl border border-white/10 flex items-center justify-between group hover:bg-white/10 transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        <span class="font-bold">Panduan Administrasi IPM v1.2</span>
                    </div>
                    <span class="text-[10px] font-bold text-gray-500 uppercase">Download PDF</span>
                </div>
                <div class="bg-white/5 p-6 rounded-2xl border border-white/10 flex items-center justify-between group hover:bg-white/10 transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        <span class="font-bold">SK Kepengurusan PC IPM Cileungsi 2023-2025</span>
                    </div>
                    <span class="text-[10px] font-bold text-gray-500 uppercase">Download PDF</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: PUSAT BANTUAN PELAJAR -->
    <section id="bantuan" class="section-padding bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-extrabold text-primary mb-4 uppercase tracking-tighter">Pusat Bantuan Pelajar</h2>
            <div class="w-20 h-1.5 bg-accentOrange mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-500 max-w-2xl mx-auto font-medium italic mb-16">
                Kami hadir sebagai teman ceritamu. Tempat aman untuk mengadu, konsultasi, dan mencari solusi secara anonim.
            </p>
            
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <!-- Layanan Aduan -->
                <div class="bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="w-16 h-16 bg-blue-50 text-primary rounded-2xl flex items-center justify-center mb-10 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Aduan & Konsultasi</h4>
                    <p class="text-gray-500 font-medium leading-relaxed mb-10">
                        Butuh pendampingan masalah sekolah atau teman bercerita? Tim kami siap mendampingi.
                    </p>
                    <button class="w-full bg-primary text-white py-4 rounded-2xl font-bold hover:shadow-lg transition-all active:scale-95">Mulai Sesi</button>
                </div>

                <!-- Ruang Aman Ipmawati -->
                <div class="bg-white p-12 rounded-[3.5rem] border-2 border-primary shadow-2xl shadow-blue-100 md:scale-110 relative z-10">
                    <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center mb-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-pink-600">Ruang Aman Ipmawati</h4>
                    <p class="text-gray-500 font-medium leading-relaxed mb-10">
                        Konsultasi khusus isu perempuan dan kesehatan remaja putri secara privat.
                    </p>
                    <button class="w-full bg-pink-500 text-white py-4 rounded-2xl font-bold hover:shadow-lg transition-all active:scale-95">Konsultasi Khusus</button>
                </div>

                <!-- Formulir Anonim -->
                <div class="bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mb-10 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88 1.45 1.45"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><circle cx="12" cy="12" r="3"/><path d="m2 2 20 20"/></svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Formulir Anonim</h4>
                    <p class="text-gray-500 font-medium leading-relaxed mb-10">
                        Lapor tanpa ragu. Sistem kami menjamin kerahasiaan identitas pelapor sepenuhnya.
                    </p>
                    <button class="w-full border-2 border-gray-900 py-4 rounded-2xl font-bold hover:bg-gray-900 hover:text-white transition-all active:scale-95">Lapor Sekarang</button>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-50 border-t border-gray-100 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-16 mb-20 text-left">
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-8">
                    <!-- Footer Logo (Menggunakan Logo Resmi) -->
                    <div class="bg-white p-1 rounded-xl shadow-md w-12 h-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo-ipm-cileungsi.png') }}" 
                             alt="Logo IPM Cileungsi" 
                             class="h-10 w-auto object-contain"
                             onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%231a73e8\' stroke-width=\'2.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z\'/></svg>';">
                    </div>
                    <span class="text-2xl font-black text-primary uppercase tracking-tighter">IPM Cileungsi</span>
                </div>
                <p class="text-gray-500 max-w-sm font-medium leading-[1.8] mb-10">
                    Pimpinan Cabang Ikatan Pelajar Muhammadiyah Cileungsi. Berdaya bersama mewujudkan nuansa baru bagi pelajar berkemajuan.
                </p>
                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center text-primary cursor-pointer hover:bg-primary hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="font-black text-gray-900 mb-8 uppercase text-[10px] tracking-widest opacity-50">Informasi</h4>
                <ul class="space-y-4 text-sm font-bold text-gray-500">
                    <li><a href="#sejarah" class="hover:text-primary transition-colors">Sejarah Kami</a></li>
                    <li><a href="#struktur" class="hover:text-primary transition-colors">Struktur Kepengurusan</a></li>
                    <li><a href="#arsip" class="hover:text-primary transition-colors">Arsip Dokumen</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-black text-gray-900 mb-8 uppercase text-[10px] tracking-widest opacity-50">Layanan</h4>
                <ul class="space-y-4 text-sm font-bold text-gray-500">
                    <li><a href="#bantuan" class="hover:text-primary transition-colors">Pusat Bantuan</a></li>
                    <li>
                        <a href="#" class="text-red-500 flex items-center gap-2 hover:underline transition-all font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg> 
                            Laporan Penyalahgunaan
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 pt-12 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            <p>© 2024 Pimpinan Cabang IPM Cileungsi. All Rights Reserved.</p>
            <div class="flex gap-10 mt-6 md:mt-0">
                <span class="hover:text-primary cursor-pointer transition-colors">Sitemap</span>
                <span class="hover:text-primary cursor-pointer transition-colors text-primary uppercase font-black">Versi 1.2 Final</span>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT LOGIC UNTUK INTERAKTIF DRILL-DOWN & MOBILE MENU -->
    <script>
        // Repositori Data Pengurus Dinamis
        const strukturData = {
            umum: {
                title: "Pimpinan Umum Harian",
                badge: "Inti Organisasi",
                desc: "Pimpinan Harian bertanggung jawab penuh atas arah kebijakan organisasi, koordinasi internal antar bidang, serta representasi eksternal Pimpinan Cabang IPM Cileungsi dalam gerakan dakwah pelajar.",
                members: [
                    "<strong>Ketua Umum:</strong> Zaki Muhammad",
                    "<strong>Sekretaris Umum:</strong> Ahmad Faiz",
                    "<strong>Bendahara Umum:</strong> Siti Aisyah"
                ]
            },
            perkaderan: {
                title: "Bidang Perkaderan",
                badge: "Jantung Organisasi",
                desc: "Fokus utama pada pengelolaan sistem kaderisasi, pelaksanaan Taruna Melati, serta pemetaan potensi kader secara berkala di seluruh lingkungan cabang Cileungsi.",
                members: [
                    "<strong>Ketua Bidang:</strong> Rahmawati Putri",
                    "<strong>Sekretaris Bidang:</strong> Budi Santoso",
                    "<strong>Anggota:</strong> Dedi Dermawan, Citra Lestari"
                ]
            },
            kdi: {
                title: "Bidang Kajian Dakwah Islam (KDI)",
                badge: "Spiritualitas Pelajar",
                desc: "Bertanggung jawab menyelenggarakan kajian keislaman kontemporer, pembentukan komunitas literasi Al-Qur'an, serta dakwah kreatif digital khusus kalangan remaja.",
                members: [
                    "<strong>Ketua Bidang:</strong> Lukman Hakim",
                    "<strong>Sekretaris Bidang:</strong> Hani Kamila",
                    "<strong>Anggota:</strong> Farhan Anshori, Yusuf Mansur"
                ]
            },
            pip: {
                title: "Bidang Pengkajian Ilmu Pengetahuan (PIP)",
                badge: "Literasi & Riset",
                desc: "Mengembangkan iklim keilmuan, riset pelajar, pengelolaan mading digital, serta kampanye literasi kritis bagi pelajar Muhammadiyah Cileungsi.",
                members: [
                    "<strong>Ketua Bidang:</strong> Rizky Ramadhan",
                    "<strong>Sekretaris Bidang:</strong> Anisa Fitri",
                    "<strong>Anggota:</strong> Gilang Permana, Rania Syifa"
                ]
            },
            asbo: {
                title: "Bidang Apresiasi Seni Budaya dan Olahraga (ASBO)",
                badge: "Kreativitas & Bakat",
                desc: "Wadah pengembangan minat bakat, penyelenggaraan kompetisi olahraga persahabatan, seni musik islami, serta apresiasi budaya kreatif.",
                members: [
                    "<strong>Ketua Bidang:</strong> Fathur Rahman",
                    "<strong>Sekretaris Bidang:</strong> Nabila Azzahra",
                    "<strong>Anggota:</strong> Kevin Sanjaya, Giska Amelia"
                ]
            },
            pkk: {
                title: "Bidang Pengembangan Kreatifitas & Kewirausahaan (PKK)",
                badge: "Kemandirian Ekonomi",
                desc: "Mendorong inkubasi bisnis mandiri pelajar, pelatihan keterampilan digital *entrepreneurship*, serta pengelolaan unit usaha organisasi.",
                members: [
                    "<strong>Ketua Bidang:</strong> Dimas Prayoga",
                    "<strong>Sekretaris Bidang:</strong> Eka Wahyuni",
                    "<strong>Anggota:</strong> Hendra Wijaya, Sasa Sabrina"
                ]
            },
            keipmawatian: {
                title: "Bidang Keipmawatian",
                badge: "Pemberdayaan Perempuan",
                desc: "Fokus terhadap pendampingan isu perempuan, kesehatan reproduksi remaja putri, kepemimpinan publik bagi ipmawati, serta integrasi dengan Ruang Aman.",
                members: [
                    "<strong>Ketua Bidang:</strong> Wardah Maulida",
                    "<strong>Sekretaris Bidang:</strong> Alya Nurul",
                    "<strong>Anggota:</strong> Tyas Utami, Mega Buana"
                ]
            },
            advokasi: {
                title: "Bidang Advokasi Pelajar",
                badge: "Pelindung Hak Pelajar",
                desc: "Mengelola integrasi sistem Pusat Bantuan Pelajar, edukasi hak anak, pencegahan *bullying* (perundungan), serta pendampingan hukum dasar bagi pelajar.",
                members: [
                    "<strong>Ketua Bidang:</strong> Teguh Iman",
                    "<strong>Sekretaris Bidang:</strong> Larasati Dwi",
                    "<strong>Anggota:</strong> Adi Saputra, Fahmi Idris"
                ]
            }
        };

        function showDrillDown(key) {
            const data = strukturData[key];
            if (!data) return;

            const panel = document.getElementById('drilldown-panel');
            
            // Set data ke komponen HTML
            document.getElementById('dd-title').innerText = data.title;
            document.getElementById('dd-badge').innerText = data.badge;
            document.getElementById('dd-desc').innerText = data.desc;
            
            // Render daftar anggota
            const membersList = document.getElementById('dd-members');
            membersList.innerHTML = '';
            data.members.forEach(member => {
                const li = document.createElement('li');
                li.className = 'bg-gray-50 p-3 rounded-xl border border-gray-100 text-sm';
                li.innerHTML = member;
                membersList.appendChild(li);
            });

            // Animasi kemunculan panel detail
            panel.classList.remove('hidden');
            setTimeout(() => {
                panel.classList.remove('translate-y-4', 'opacity-0');
                panel.classList.add('translate-y-0', 'opacity-100');
            }, 50);

            // Otomatis scroll fokus ke panel detail
            panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function closeDrillDown() {
            const panel = document.getElementById('drilldown-panel');
            panel.classList.remove('translate-y-0', 'opacity-100');
            panel.classList.add('translate-y-4', 'opacity-0');
            setTimeout(() => {
                panel.classList.add('hidden');
            }, 300);
        }
    </script>

</body>
</html>