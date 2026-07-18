<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | IPM Cileungsi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased overflow-x-hidden">
    @php
        $navLinkBase = 'flex items-center gap-3 rounded-2xl px-4 py-3';
        $navLinkActive = 'bg-primary text-white shadow-lg shadow-blue-200';
        $navLinkInactive = 'text-gray-600 hover:bg-gray-100 hover:text-primary';
    @endphp
    <div class="min-h-screen w-full lg:flex">
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-72 max-w-[85vw] -translate-x-full bg-white border-r border-gray-200 transition-transform duration-300 lg:static lg:max-w-none lg:shrink-0 lg:translate-x-0">
            <div class="flex h-20 items-center justify-between px-6 border-b border-gray-100">
                <a href="{{ url('/admin') }}" class="flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl bg-primary/10 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo-ipm-cileungsi.png') }}" alt="Logo IPM Cileungsi" class="h-8 w-auto object-contain">
                    </div>
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-tight text-gray-900">Admin IPM</p>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Cileungsi</p>
                    </div>
                </a>

                <button type="button" class="lg:hidden p-2 rounded-xl hover:bg-gray-100" onclick="toggleSidebar(false)" aria-label="Tutup menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <nav class="p-4 space-y-1 text-sm font-bold">
                <a href="{{ route('admin.dashboard') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.dashboard') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.bidang.index') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.bidang.*') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Bidang
                </a>
                <a href="{{ route('admin.anggota.index') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.anggota.*') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Anggota
                </a>
                <a href="{{ route('admin.berita.index') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.berita.*') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z"/></svg>
                    Berita
                </a>
                <a href="{{ route('admin.arsip.index') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.arsip.*') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><path d="M14 2v6h6"/></svg>
                    Arsip Digital
                </a>
                <a href="{{ route('admin.bantuan.index') }}" class="{{ $navLinkBase }} {{ request()->routeIs('admin.bantuan.*') ? $navLinkActive : $navLinkInactive }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Bantuan Pelajar
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center gap-2 rounded-2xl px-4 py-3 text-sm font-extrabold text-white hover:bg-red-500 bg-red-600 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div id="sidebar-backdrop" class="fixed inset-0 z-40 hidden bg-gray-900/50 lg:hidden" onclick="toggleSidebar(false)"></div>

        <main class="min-w-0 w-full max-w-full flex-1 overflow-x-hidden">
            <header class="sticky top-0 z-30 h-20 bg-white/90 backdrop-blur border-b border-gray-200">
                <div class="flex h-full min-w-0 items-center justify-between gap-3 px-4 sm:px-6 lg:px-8">
                    <div class="flex min-w-0 items-center gap-3">
                        <button type="button" class="lg:hidden p-2 rounded-xl hover:bg-gray-100" onclick="toggleSidebar(true)" aria-label="Buka menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h16"/><path d="M4 6h16"/><path d="M4 18h16"/></svg>
                        </button>
                        <div class="min-w-0">
                            <h1 class="truncate text-lg font-extrabold text-gray-900 sm:text-xl">@yield('page_title', 'Dashboard')</h1>
                            <p class="hidden text-xs font-bold uppercase tracking-widest text-gray-400 sm:block">@yield('page_subtitle', 'Panel pengelolaan konten')</p>
                        </div>
                    </div>

                    <div class="flex shrink-0 items-center gap-3">
                        <a href="{{ url('/') }}" class="hidden rounded-2xl border border-gray-200 px-4 py-2 text-sm font-extrabold text-gray-600 hover:bg-gray-50 sm:inline-flex">Lihat Website</a>
                    </div>
                </div>
            </header>

            <div class="w-full max-w-full p-4 sm:p-6 lg:p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar(show) {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            sidebar.classList.toggle('-translate-x-full', !show);
            backdrop.classList.toggle('hidden', !show);
        }
    </script>
</body>
</html>
