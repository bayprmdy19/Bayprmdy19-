<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin IPM Cileungsi | Dashboard Portal</title>
    
    <!-- Font Utama: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons untuk estetika ikon dasbor -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8', // Biru Google / IPM Blue
                        accentGreen: '#10b981', // Hijau Sukses
                        accentOrange: '#f97316', // Orange Aksen
                        bgLight: '#f8fafd'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #f8fafd;
        }
    </style>
</head>
<body class="text-gray-900 font-sans selection:bg-blue-100 selection:text-primary min-h-screen flex">

    <!-- SIDEBAR KIRI (Poin Utama Modifikasi Label) -->
    <aside class="w-80 bg-white border-r border-gray-100 p-8 flex flex-col justify-between hidden md:flex sticky top-0 h-screen shrink-0">
        <div class="space-y-12">
            <!-- Header Brand -->
            <div class="flex items-center space-x-3">
                <div class="bg-primary/10 p-2.5 rounded-2xl text-primary">
                    <i data-lucide="shield" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-base font-extrabold tracking-tight text-gray-900 uppercase">ADMIN IPM</span>
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest leading-none mt-0.5">CILEUNGSI</p>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="space-y-2">
                <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest pl-4 mb-4">Utama</p>
                
                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl bg-primary text-white font-bold transition-all shadow-lg shadow-blue-100">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-gray-500 hover:text-primary hover:bg-blue-50/50 font-bold transition-all">
                    <i data-lucide="newspaper" class="w-5 h-5"></i>
                    <span class="text-sm">Berita</span>
                </a>

                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-gray-500 hover:text-primary hover:bg-blue-50/50 font-bold transition-all">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    <span class="text-sm">Kegiatan</span>
                </a>

                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-gray-500 hover:text-primary hover:bg-blue-50/50 font-bold transition-all">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                    <span class="text-sm">Arsip</span>
                </a>

                <!-- PERUBAHAN LABEL: Sekarang disederhanakan menjadi "Bidang" saja -->
                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-gray-500 hover:text-primary hover:bg-blue-50/50 font-bold transition-all">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="text-sm">Bidang</span>
                </a>

                <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-gray-500 hover:text-primary hover:bg-blue-50/50 font-bold transition-all">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    <span class="text-sm">Bantuan Pelajar</span>
                </a>
            </nav>
        </div>

        <!-- Tombol Keluar Sesi -->
        <div>
            <hr class="border-gray-100 mb-6">
            <a href="#" class="flex items-center space-x-4 px-4 py-4 rounded-2xl text-red-500 hover:bg-red-50 font-bold transition-all">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span class="text-sm">Keluar</span>
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA (KANAN) -->
    <main class="flex-1 p-6 md:p-12 overflow-y-auto">
        <!-- Header Atas -->
        <header class="flex justify-between items-center mb-12">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Dashboard</h1>
                <p class="text-xs text-gray-400 font-bold tracking-widest uppercase mt-1">RINGKASAN PENGELOLAAN PORTAL</p>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="/" target="_blank" class="hidden sm:flex items-center space-x-2 px-6 py-3 bg-white border border-gray-100 rounded-2xl font-bold text-sm text-gray-600 hover:border-primary hover:text-primary transition-all shadow-sm">
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                    <span>Lihat Website</span>
                </a>
                
                <!-- Identitas Admin -->
                <div class="flex items-center space-x-3 bg-white p-2.5 pr-6 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-extrabold text-sm shadow-md shadow-blue-100">
                        AD
                    </div>
                    <div class="leading-none hidden sm:block">
                        <span class="font-extrabold text-sm text-gray-800 block">ADMIN IPM</span>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-0.5">Cileungsi</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Baris Metrik (4 Kartu) -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Total Berita -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6">Total Berita</p>
                <div class="flex justify-between items-end">
                    <span class="text-4xl font-extrabold text-gray-800">24</span>
                    <span class="bg-blue-50 text-primary text-[10px] font-extrabold px-3 py-1.5 rounded-full">+4 bulan ini</span>
                </div>
            </div>

            <!-- Kegiatan -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6">Kegiatan</p>
                <div class="flex justify-between items-end">
                    <span class="text-4xl font-extrabold text-gray-800">12</span>
                    <span class="bg-emerald-50 text-emerald-500 text-[10px] font-extrabold px-3 py-1.5 rounded-full">Aktif</span>
                </div>
            </div>

            <!-- Arsip Dokumen -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6">Arsip</p>
                <div class="flex justify-between items-end">
                    <span class="text-4xl font-extrabold text-gray-800">36</span>
                    <span class="bg-orange-50 text-orange-500 text-[10px] font-extrabold px-3 py-1.5 rounded-full">Dokumen</span>
                </div>
            </div>

            <!-- Aduan Masuk -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between relative overflow-hidden">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6">Aduan Masuk</p>
                <div class="flex justify-between items-end">
                    <span class="text-4xl font-extrabold text-gray-800">7</span>
                    <span class="bg-rose-50 text-rose-500 text-[10px] font-extrabold px-3 py-1.5 rounded-full">Butuh cek</span>
                </div>
            </div>
        </section>

        <!-- Bagian Grid Konten Terbaru & Aksi Cepat -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sisi Kiri: Tabel Konten Terbaru -->
            <div class="lg:col-span-2 bg-white p-8 md:p-10 rounded-[2.5rem] border border-gray-100 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-xl font-extrabold text-gray-800">Konten Terbaru</h3>
                        <p class="text-xs text-gray-400 mt-1">Daftar konten statis untuk integrasi database mendatang.</p>
                    </div>
                    <button class="bg-primary text-white px-5 py-3 rounded-2xl text-xs font-bold hover:shadow-lg hover:shadow-blue-200 transition-all active:scale-95 flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Konten
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-50 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                <th class="pb-4">Judul</th>
                                <th class="pb-4">Kategori</th>
                                <th class="pb-4">Status</th>
                                <th class="pb-4">Tanggal</th>
                                <th class="pb-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                            <tr>
                                <td class="py-4 pr-4 font-bold text-gray-900">Peluncuran Portal Web Resmi IPM Cileungsi</td>
                                <td class="py-4">Berita</td>
                                <td class="py-4"><span class="bg-emerald-50 text-emerald-500 text-[10px] font-extrabold px-2.5 py-1 rounded-md">Publik</span></td>
                                <td class="py-4 text-xs text-gray-400">12 Jul 2026</td>
                                <td class="py-4 text-right"><a href="#" class="text-primary hover:underline font-bold text-xs">Edit</a></td>
                            </tr>
                            <tr>
                                <td class="py-4 pr-4 font-bold text-gray-900">Fortasi: Semangat Kader Berkemajuan</td>
                                <td class="py-4">Kegiatan</td>
                                <td class="py-4"><span class="bg-orange-50 text-orange-500 text-[10px] font-extrabold px-2.5 py-1 rounded-md">Draft</span></td>
                                <td class="py-4 text-xs text-gray-400">10 Jul 2026</td>
                                <td class="py-4 text-right"><a href="#" class="text-primary hover:underline font-bold text-xs">Edit</a></td>
                            </tr>
                            <tr>
                                <td class="py-4 pr-4 font-bold text-gray-900">Panduan Administrasi IPM v1.2</td>
                                <td class="py-4">Arsip</td>
                                <td class="py-4"><span class="bg-emerald-50 text-emerald-500 text-[10px] font-extrabold px-2.5 py-1 rounded-md">Publik</span></td>
                                <td class="py-4 text-xs text-gray-400">06 Jul 2026</td>
                                <td class="py-4 text-right"><a href="#" class="text-primary hover:underline font-bold text-xs">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sisi Kanan: Aksi Cepat & Catatan Integrasi -->
            <div class="space-y-6">
                <!-- Aksi Cepat -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <h4 class="text-lg font-extrabold text-gray-800 mb-6">Aksi Cepat</h4>
                    <div class="space-y-3">
                        <button class="w-full text-left p-4 rounded-2xl border border-gray-100 hover:border-primary hover:text-primary hover:bg-blue-50/30 transition-all font-bold text-sm text-gray-600 flex items-center justify-between">
                            <span>Tulis Berita Baru</span>
                            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                        </button>
                        <button class="w-full text-left p-4 rounded-2xl border border-gray-100 hover:border-primary hover:text-primary hover:bg-blue-50/30 transition-all font-bold text-sm text-gray-600 flex items-center justify-between">
                            <span>Upload Arsip Baru</span>
                            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                        </button>
                        <button class="w-full text-left p-4 rounded-2xl border border-gray-100 hover:border-primary hover:text-primary hover:bg-blue-50/30 transition-all font-bold text-sm text-gray-600 flex items-center justify-between">
                            <span>Tambah Anggota Bidang</span>
                            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                        </button>
                    </div>
                </div>

                <!-- Catatan Integrasi -->
                <div class="bg-gray-900 text-white p-8 rounded-[2.5rem] relative overflow-hidden shadow-xl">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/5 rounded-full blur-xl"></div>
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-primary bg-blue-100 text-primary px-3 py-1 rounded-full mb-6 inline-block">Catatan Integrasi</span>
                    <h4 class="text-lg font-extrabold mb-2">Template ini belum memakai auth.</h4>
                    <p class="text-xs text-gray-400 leading-relaxed font-medium">Nanti form login bisa diarahkan langsung ke controller, lalu route admin diproteksi menggunakan middleware Laravel auth.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Inisialisasi Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>