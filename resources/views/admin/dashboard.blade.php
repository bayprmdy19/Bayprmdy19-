@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan pengelolaan portal')

@section('content')
    <div class="w-full max-w-full space-y-6 lg:space-y-8">
        <section class="grid min-w-0 grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Total Bidang</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $totalBidang }}</p>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-extrabold text-slate-700">Struktur aktif</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Total Berita</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $totalBerita }}</p>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-extrabold text-primary">Data aktif</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Total Anggota</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $totalAnggota }}</p>
                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Akun aktif</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Total Arsip</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $totalArsip }}</p>
                    <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-extrabold text-accentOrange">Dokumen</span>
                </div>
            </div>
        </section>

        <section class="grid min-w-0 gap-6 xl:grid-cols-[minmax(0,1fr)_380px] xl:gap-8">
            <div class="min-w-0 rounded-3xl bg-white border border-gray-100 shadow-sm">
                <div class="flex flex-col gap-4 border-b border-gray-100 p-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="min-w-0">
                        <h2 class="text-lg font-extrabold text-gray-900">Konten Terbaru</h2>
                        <p class="mt-1 text-sm font-medium text-gray-500">Aktivitas terbaru dari berita, arsip, anggota, dan bidang.</p>
                    </div>
                    <a href="{{ route('admin.berita.create') }}" class="inline-flex w-full items-center justify-center rounded-2xl bg-primary px-4 py-3 text-sm font-extrabold text-white hover:bg-blue-600 sm:w-auto">Tambah Konten</a>
                </div>

                <div class="hidden overflow-x-auto md:block">
                    <table class="w-full min-w-[720px] text-left">
                        <thead class="bg-gray-50 text-xs font-extrabold uppercase tracking-widest text-gray-400">
                            <tr>
                                <th class="px-6 py-4">Judul</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Keterangan</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm font-semibold text-gray-700">
                            @forelse ($latestContents as $content)
                                <tr>
                                    <td class="px-6 py-5">{{ $content['title'] }}</td>
                                    <td class="px-6 py-5">{{ $content['category'] }}</td>
                                    <td class="px-6 py-5">{{ $content['meta'] ?: '-' }}</td>
                                    <td class="px-6 py-5">{{ optional($content['date'])->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-5 text-right">
                                        <a href="{{ $content['link'] }}" class="font-extrabold text-primary hover:underline">Lihat</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-5 text-center text-gray-500">Belum ada konten untuk ditampilkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="grid gap-3 p-4 md:hidden">
                    @forelse ($latestContents as $content)
                        <article class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-sm font-extrabold leading-6 text-gray-900">{{ $content['title'] }}</h3>
                                <span class="shrink-0 rounded-full bg-blue-50 px-3 py-1 text-xs font-extrabold text-primary">{{ $content['category'] }}</span>
                            </div>
                            <p class="mt-3 text-xs font-bold uppercase tracking-widest text-gray-400">{{ $content['meta'] ?: '-' }}</p>
                            <p class="mt-2 text-xs font-semibold text-gray-500">{{ optional($content['date'])->format('d M Y H:i') }}</p>
                            <a href="{{ $content['link'] }}" class="mt-4 inline-flex text-sm font-extrabold text-primary">Lihat</a>
                        </article>
                    @empty
                        <article class="rounded-2xl border border-gray-100 bg-gray-50 p-4 text-sm font-semibold text-gray-500">
                            Belum ada konten untuk ditampilkan.
                        </article>
                    @endforelse
                </div>
            </div>

            <aside class="min-w-0 space-y-6 xl:space-y-8">
                <div class="rounded-3xl bg-white border border-gray-100 p-6 shadow-sm">
                    <h2 class="text-lg font-extrabold text-gray-900">Aksi Cepat</h2>
                    <div class="mt-5 grid gap-3">
                        <a href="{{ route('admin.berita.create') }}" class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Tulis Berita Baru</a>
                        <a href="{{ route('admin.arsip.create') }}" class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Upload Arsip</a>
                        <a href="{{ route('admin.anggota.create') }}" class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Tambah Anggota</a>
                    </div>
                </div>

                <div class="rounded-3xl bg-gray-900 p-6 text-white shadow-sm">
                    <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Ringkasan Sistem</p>
                    <h2 class="mt-4 text-xl font-extrabold">Seluruh modul admin sudah berbasis data utama.</h2>
                    <p class="mt-3 text-sm font-medium leading-6 text-gray-300">Dashboard ini sekarang membaca statistik dan aktivitas terbaru langsung dari database. Gunakan halaman listing untuk cari, filter, dan kelola data dari backend.</p>
                </div>
            </aside>
        </section>
    </div>
@endsection
