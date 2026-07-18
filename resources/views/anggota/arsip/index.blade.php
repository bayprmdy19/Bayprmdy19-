<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Anggota | IPM Cileungsi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 font-sans text-white">
    <div class="mx-auto max-w-6xl px-4 py-10">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Arsip Anggota</p>
                <h1 class="mt-2 text-4xl font-extrabold">Dokumen yang bisa kamu unduh</h1>
                <p class="mt-3 max-w-2xl text-sm font-medium text-slate-300">Semua arsip di halaman ini diupload oleh admin dan hanya bisa diakses anggota yang sudah login.</p>
            </div>
            <a href="{{ route('landing') }}" class="rounded-2xl border border-white/15 px-5 py-3 text-sm font-bold text-white">Kembali ke Landing</a>
        </div>

        @if (session('error'))
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-bold text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid gap-4">
            @forelse ($arsips as $arsip)
                <div class="flex flex-col gap-5 rounded-[2rem] border border-white/10 bg-white/5 p-6 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold">{{ $arsip->judul }}</h2>
                        <p class="mt-2 text-xs font-bold uppercase tracking-[0.25em] text-blue-300">
                            {{ optional($arsip->tanggal_arsip)->format('d M Y') ?: 'Tanggal belum diisi' }}
                        </p>
                        <p class="mt-2 text-sm font-medium text-slate-300">{{ $arsip->deskripsi ?: 'Dokumen arsip anggota.' }}</p>
                        <p class="mt-3 text-xs font-bold uppercase tracking-[0.25em] text-slate-400">
                            {{ number_format(($arsip->ukuran ?? 0) / 1024, 1) }} KB
                        </p>
                    </div>
                    <a href="{{ route('anggota.arsip.download', $arsip) }}" class="inline-flex items-center justify-center rounded-2xl bg-blue-600 px-6 py-3 text-sm font-bold text-white">Download</a>
                </div>
            @empty
                <div class="rounded-[2rem] border border-dashed border-white/15 bg-white/5 p-8 text-center text-slate-300">
                    Belum ada arsip yang tersedia.
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $arsips->links() }}
        </div>
    </div>
</body>
</html>
