<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal | IPM Cileungsi</title>

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
<body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased">
    <main class="min-h-screen grid lg:grid-cols-[1.05fr_0.95fr]">
        <section class="hidden lg:flex relative overflow-hidden bg-primary p-12 text-white">
            <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>
            <div class="relative z-10 flex max-w-xl flex-col justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="h-12 w-12 rounded-2xl bg-white flex items-center justify-center overflow-hidden shadow-lg">
                        <img src="{{ asset('images/logo-ipm-cileungsi.png') }}" alt="Logo IPM Cileungsi" class="h-9 w-auto object-contain">
                    </div>
                    <div>
                        <p class="text-xl font-extrabold uppercase tracking-tight">IPM Cileungsi</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-100">Portal Admin & Anggota</p>
                    </div>
                </a>

                <div>
                    <p class="mb-5 inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-widest text-blue-50">Portal Pengurus & Anggota</p>
                    <h1 class="text-5xl font-extrabold leading-tight tracking-tight">Satu pintu masuk untuk admin dan anggota.</h1>
                    <p class="mt-6 max-w-lg text-lg font-medium leading-8 text-blue-50">Admin tetap masuk ke dashboard, sedangkan anggota akan kembali ke landing page dengan akses profile dan arsip digital.</p>
                </div>

                <p class="text-xs font-bold uppercase tracking-widest text-blue-100">PC IPM Cileungsi</p>
            </div>
        </section>

        <section class="flex items-center justify-center px-4 py-12 sm:px-6 lg:px-10">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center lg:hidden">
                    <div class="mx-auto mb-4 h-14 w-14 rounded-2xl bg-white flex items-center justify-center overflow-hidden shadow-sm">
                        <img src="{{ asset('images/logo-ipm-cileungsi.png') }}" alt="Logo IPM Cileungsi" class="h-10 w-auto object-contain">
                    </div>
                    <h1 class="text-2xl font-extrabold text-gray-900">Portal IPM Cileungsi</h1>
                    <p class="mt-2 text-sm font-medium text-gray-500">Masuk sebagai admin atau anggota.</p>
                </div>

                <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-gray-200/70 sm:p-8">
                    <div class="mb-8">
                        <h2 class="text-2xl font-extrabold text-gray-900">Masuk Portal</h2>
                        <p class="mt-2 text-sm font-medium text-gray-500">Admin login pakai email, anggota login pakai username.</p>
                    </div>

                    <form action="{{ route('authenticate') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label for="login" class="mb-2 block text-sm font-extrabold text-gray-700">Email / Username</label>
                            <input id="login" name="login" type="text" value="{{ old('login') }}" autocomplete="username" placeholder="Masukkan email atau username" class="w-full rounded-2xl border border-gray-200 px-4 py-4 text-sm font-semibold outline-none transition focus:border-primary focus:ring-4 focus:ring-blue-100">
                        </div>

                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password" class="block text-sm font-extrabold text-gray-700">Password</label>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan password" class="w-full rounded-2xl border border-gray-200 px-4 py-4 text-sm font-semibold outline-none transition focus:border-primary focus:ring-4 focus:ring-blue-100">
                        </div>

                        <label>
                            @if ($errors->any())
                                <div class="mb-2 mt-2 text-sm font-bold text-red-600 bg-red-100 p-3 rounded-lg">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </label>

                        <button type="submit" class="w-full rounded-2xl bg-primary px-5 py-4 text-sm font-extrabold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-600 active:scale-[0.99]">Masuk</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
