<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | IPM Cileungsi</title>

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
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-100">Admin Portal</p>
                    </div>
                </a>

                <div>
                    <p class="mb-5 inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-widest text-blue-50">Panel Pengelola Konten</p>
                    <h1 class="text-5xl font-extrabold leading-tight tracking-tight">Kelola portal dengan rapi, cepat, dan terstruktur.</h1>
                    <p class="mt-6 max-w-lg text-lg font-medium leading-8 text-blue-50">Template ini masih statis. Sambungkan form login, session, dan middleware saat backend sudah siap.</p>
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
                    <h1 class="text-2xl font-extrabold text-gray-900">Admin IPM Cileungsi</h1>
                    <p class="mt-2 text-sm font-medium text-gray-500">Masuk ke panel pengelola konten.</p>
                </div>

                <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-gray-200/70 sm:p-8">
                    <div class="mb-8">
                        <h2 class="text-2xl font-extrabold text-gray-900">Masuk Admin</h2>
                        <p class="mt-2 text-sm font-medium text-gray-500">Gunakan akun admin yang nanti kamu sambungkan ke Laravel Auth.</p>
                    </div>

                    <form action="{{ url('/admin') }}" method="GET" class="space-y-5">
                        <div>
                            <label for="email" class="mb-2 block text-sm font-extrabold text-gray-700">Email</label>
                            <input id="email" name="email" type="email" autocomplete="email" placeholder="admin@ipmcileungsi.or.id" class="w-full rounded-2xl border border-gray-200 px-4 py-4 text-sm font-semibold outline-none transition focus:border-primary focus:ring-4 focus:ring-blue-100">
                        </div>

                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password" class="block text-sm font-extrabold text-gray-700">Password</label>
                                <a href="#" class="text-xs font-extrabold text-primary hover:underline">Lupa password?</a>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan password" class="w-full rounded-2xl border border-gray-200 px-4 py-4 text-sm font-semibold outline-none transition focus:border-primary focus:ring-4 focus:ring-blue-100">
                        </div>

                        <label class="flex items-center gap-3 text-sm font-bold text-gray-600">
                            <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                            Ingat saya
                        </label>

                        <button type="submit" class="w-full rounded-2xl bg-primary px-5 py-4 text-sm font-extrabold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-600 active:scale-[0.99]">Masuk ke Dashboard</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
