<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} | Portal Web IPM Cileungsi</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 160) }}">

    <!-- Font Utama: Plus Jakarta Sans -->
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
                        primary: '#1a73e8',
                        accentGreen: '#10b981',
                        accentOrange: '#f97316',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Style untuk dropdown agar muncul saat hover */
        .group:hover .dropdown-menu { display: block; }

        /* Styling konten artikel dari rich text */
        .article-content p { margin-bottom: 1.25rem; line-height: 1.85; color: #374151; }
        .article-content h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-top: 2rem; margin-bottom: 1rem; }
        .article-content h3 { font-size: 1.25rem; font-weight: 700; color: #111827; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .article-content ul, .article-content ol { margin-left: 1.5rem; margin-bottom: 1.25rem; }
        .article-content ul { list-style-type: disc; }
        .article-content ol { list-style-type: decimal; }
        .article-content li { margin-bottom: 0.5rem; color: #374151; line-height: 1.75; }
        .article-content strong { font-weight: 700; color: #111827; }
        .article-content blockquote {
            border-left: 4px solid #1a73e8;
            padding-left: 1.25rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #6b7280;
        }
        .article-content img { border-radius: 1rem; margin: 1.5rem 0; max-width: 100%; }
        .article-content a { color: #1a73e8; text-decoration: underline; }
    </style>
</head>
<body class="bg-white text-gray-900 font-sans selection:bg-blue-100 selection:text-primary">

    @php
        $anggotaAuth = auth('anggota')->user();
        $adminAuth = auth()->user();
        $arsipUrl = $anggotaAuth ? route('anggota.arsip.index') : route('login');
    @endphp

    <!-- NAVIGASI -->
    <nav class="sticky top-0 z-50 bg-primary border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-20 items-center">
            <!-- Logo -->
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

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-bold">
                <a href="{{ route('landing') }}" class="text-blue-50 hover:text-white transition-colors py-2">Beranda</a>

                <!-- Profil Dropdown -->
                <div class="group relative">
                    <button class="flex items-center gap-1 text-blue-50 hover:text-white transition-colors py-2">
                        Profil
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-2xl rounded-2xl p-2 w-52 border border-gray-100 mt-0 text-gray-800">
                        <a href="{{ route('landing') }}#sejarah" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors">Sejarah</a>
                        <a href="{{ route('landing') }}#struktur" class="block p-3 hover:bg-gray-50 rounded-xl transition-colors font-semibold text-primary">Struktur Organisasi</a>
                        <a href="{{ $arsipUrl }}" class="block p-3 hover:bg-gray-50 rounded-xl border-t mt-1 transition-colors text-accentOrange">Arsip</a>
                    </div>
                </div>

                <a href="{{ route('landing') }}#berita" class="text-white bg-white/10 px-4 py-2 rounded-full transition-all">Berita</a>

                <a href="{{ route('bantuan.create') }}" class="bg-accentOrange text-white px-6 py-2.5 rounded-full hover:shadow-xl hover:bg-orange-600 transition-all active:scale-95">Pusat Bantuan</a>

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
                    <a href="{{ route('admin.dashboard') }}" class="border border-white text-white px-6 py-2.5 rounded-full hover:shadow-x transition-all hover:scale-105 active:scale-95">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="border border-white text-white px-6 py-2.5 rounded-full hover:shadow-x transition-all hover:scale-105 active:scale-95">Login</a>
                @endif
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-primary border-t border-white/10 p-6 flex flex-col gap-4 font-bold text-blue-50">
            <a href="{{ route('landing') }}" class="hover:text-white">Beranda</a>
            <a href="{{ route('landing') }}#sejarah" class="hover:text-white">Sejarah</a>
            <a href="{{ route('landing') }}#struktur" class="hover:text-white">Struktur Organisasi</a>
            <a href="{{ $arsipUrl }}" class="hover:text-white">Arsip</a>
            <hr class="border-white/10">
            <a href="{{ route('landing') }}#berita" class="hover:text-white">Berita</a>
            <a href="{{ route('bantuan.create') }}" class="bg-accentOrange text-white text-center py-4 rounded-2xl">Pusat Bantuan</a>
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

    <!-- BREADCRUMB -->
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <nav class="flex items-center gap-2 text-xs font-bold text-gray-400">
                <a href="{{ route('landing') }}" class="hover:text-primary transition-colors">Beranda</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                <a href="{{ route('landing') }}#berita" class="hover:text-primary transition-colors">Berita</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                <span class="text-gray-600 truncate max-w-xs">{{ \Illuminate\Support\Str::limit($berita->judul, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- ARTIKEL UTAMA -->
    <main class="py-16">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Header Artikel -->
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-blue-100 text-primary text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest">Berita</span>
                    <span class="text-gray-400 text-xs font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline mr-1"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        {{ optional($berita->created_at)->isoFormat('D MMMM Y') }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                    {{ $berita->judul }}
                </h1>

                <!-- Divider -->
                <div class="flex items-center gap-4">
                    <div class="h-1 w-16 bg-primary rounded-full"></div>
                    <div class="h-1 w-8 bg-accentOrange rounded-full"></div>
                    <div class="h-1 w-4 bg-accentGreen rounded-full"></div>
                </div>
            </div>

            <!-- Gambar Utama Berita -->
            @if ($berita->gambar)
                <div class="mb-10 overflow-hidden rounded-[2rem] shadow-xl border border-gray-100">
                    <img src="{{ asset($berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="w-full object-cover max-h-[500px]">
                </div>
            @endif

            <!-- Isi Artikel -->
            <div class="article-content bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8 md:p-12 mb-12 text-gray-700 text-base leading-relaxed">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="flex items-center justify-between mb-16">
                <a href="{{ route('landing') }}#berita"
                   class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-bold text-sm hover:bg-gray-200 transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                    Kembali ke Berita
                </a>

                <!-- Share -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}"
                       target="_blank"
                       class="w-10 h-10 bg-green-500 text-white rounded-xl flex items-center justify-center hover:bg-green-600 transition-all active:scale-95"
                       title="Bagikan ke WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.999 0C5.372 0 0 5.373 0 12.001c0 2.117.554 4.099 1.523 5.818L.06 23.117a.75.75 0 0 0 .923.923l5.297-1.464A11.944 11.944 0 0 0 12 24c6.628 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 0 1-5.012-1.374l-.36-.213-3.728 1.031 1.031-3.727-.214-.36A9.817 9.817 0 0 1 2.182 12c0-5.416 4.401-9.818 9.817-9.818 5.417 0 9.818 4.402 9.818 9.818 0 5.417-4.401 9.818-9.818 9.818z"/></svg>
                    </a>
                    <button onclick="copyLink()"
                            class="w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-gray-200 transition-all active:scale-95"
                            title="Salin link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                    </button>
                </div>
            </div>

            <!-- Toast Notifikasi Salin Link -->
            <div id="copy-toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-sm font-bold px-6 py-3 rounded-2xl shadow-2xl opacity-0 transition-opacity duration-300 pointer-events-none z-50">
                ✓ Link berhasil disalin!
            </div>

        </div>
    </main>

    <!-- BERITA TERKAIT -->
    @if ($beritaTerkait->count() > 0)
    <section class="bg-gray-50 py-16 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-primary uppercase tracking-tighter">Berita Terkait</h2>
                <div class="w-16 h-1 bg-accentOrange mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($beritaTerkait as $item)
                <article class="bg-white rounded-[3rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-video bg-gray-100 flex items-center justify-center overflow-hidden text-gray-300 font-bold italic">
                        @if ($item->gambar)
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="flex flex-col items-center gap-2 text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                <span class="text-xs">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-8">
                        <span class="bg-blue-100 text-primary text-[10px] font-black px-3 py-1 rounded-full uppercase">{{ optional($item->created_at)->format('d M Y') }}</span>
                        <h3 class="text-lg font-bold mt-4 mb-2 group-hover:text-primary transition-colors line-clamp-2">{{ $item->judul }}</h3>
                        <p class="text-gray-500 text-sm mb-6 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}</p>
                        <a href="{{ route('berita.show', $item->id) }}"
                           class="text-primary font-bold text-xs uppercase inline-flex items-center gap-2 hover:gap-3 transition-all">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- FOOTER MINI -->
    <footer class="bg-white border-t border-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-[11px] font-bold text-gray-400 uppercase tracking-widest gap-4">
            <p>© 2024 Pimpinan Cabang IPM Cileungsi. All Rights Reserved.</p>
            <a href="{{ route('landing') }}" class="text-primary hover:underline">← Kembali ke Beranda</a>
        </div>
    </footer>

    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                const toast = document.getElementById('copy-toast');
                toast.style.opacity = '1';
                setTimeout(() => { toast.style.opacity = '0'; }, 2500);
            });
        }
    </script>

</body>
</html>
