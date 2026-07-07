@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan pengelolaan portal')

@section('content')
    <div class="w-full max-w-full space-y-6 lg:space-y-8">
        <section class="grid min-w-0 grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Total Berita</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">24</p>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-extrabold text-primary">+4 bulan ini</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Kegiatan</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">12</p>
                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Aktif</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Arsip</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">36</p>
                    <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-extrabold text-accentOrange">Dokumen</span>
                </div>
            </div>

            <div class="min-w-0 rounded-3xl bg-white p-5 shadow-sm border border-gray-100 sm:p-6">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Aduan Masuk</p>
                <div class="mt-5 flex flex-wrap items-end justify-between gap-3">
                    <p class="text-3xl font-extrabold text-gray-900 sm:text-4xl">7</p>
                    <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-extrabold text-red-500">Butuh cek</span>
                </div>
            </div>
        </section>

        <section class="grid min-w-0 gap-6 xl:grid-cols-[minmax(0,1fr)_380px] xl:gap-8">
            <div class="min-w-0 rounded-3xl bg-white border border-gray-100 shadow-sm">
                <div class="flex flex-col gap-4 border-b border-gray-100 p-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="min-w-0">
                        <h2 class="text-lg font-extrabold text-gray-900">Konten Terbaru</h2>
                        <p class="mt-1 text-sm font-medium text-gray-500">Contoh tabel statis untuk nanti disambungkan ke database.</p>
                    </div>
                    <button class="inline-flex w-full items-center justify-center rounded-2xl bg-primary px-4 py-3 text-sm font-extrabold text-white hover:bg-blue-600 sm:w-auto">Tambah Konten</button>
                </div>

                <div class="hidden overflow-x-auto md:block">
                    <table class="w-full min-w-[720px] text-left">
                        <thead class="bg-gray-50 text-xs font-extrabold uppercase tracking-widest text-gray-400">
                            <tr>
                                <th class="px-6 py-4">Judul</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm font-semibold text-gray-700">
                            <tr>
                                <td class="px-6 py-5">Peluncuran Portal Web Resmi IPM Cileungsi</td>
                                <td class="px-6 py-5">Berita</td>
                                <td class="px-6 py-5"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Publik</span></td>
                                <td class="px-6 py-5">12 Jul 2026</td>
                                <td class="px-6 py-5 text-right"><a href="#" class="font-extrabold text-primary hover:underline">Edit</a></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5">Fortasi: Semangat Kader Berkemajuan</td>
                                <td class="px-6 py-5">Kegiatan</td>
                                <td class="px-6 py-5"><span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-extrabold text-accentOrange">Draft</span></td>
                                <td class="px-6 py-5">10 Jul 2026</td>
                                <td class="px-6 py-5 text-right"><a href="#" class="font-extrabold text-primary hover:underline">Edit</a></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-5">Panduan Administrasi IPM v1.2</td>
                                <td class="px-6 py-5">Arsip</td>
                                <td class="px-6 py-5"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Publik</span></td>
                                <td class="px-6 py-5">06 Jul 2026</td>
                                <td class="px-6 py-5 text-right"><a href="#" class="font-extrabold text-primary hover:underline">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="grid gap-3 p-4 md:hidden">
                    <article class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="text-sm font-extrabold leading-6 text-gray-900">Peluncuran Portal Web Resmi IPM Cileungsi</h3>
                            <span class="shrink-0 rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Publik</span>
                        </div>
                        <p class="mt-3 text-xs font-bold uppercase tracking-widest text-gray-400">Berita · 12 Jul 2026</p>
                        <a href="#" class="mt-4 inline-flex text-sm font-extrabold text-primary">Edit</a>
                    </article>

                    <article class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="text-sm font-extrabold leading-6 text-gray-900">Fortasi: Semangat Kader Berkemajuan</h3>
                            <span class="shrink-0 rounded-full bg-orange-50 px-3 py-1 text-xs font-extrabold text-accentOrange">Draft</span>
                        </div>
                        <p class="mt-3 text-xs font-bold uppercase tracking-widest text-gray-400">Kegiatan · 10 Jul 2026</p>
                        <a href="#" class="mt-4 inline-flex text-sm font-extrabold text-primary">Edit</a>
                    </article>

                    <article class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="text-sm font-extrabold leading-6 text-gray-900">Panduan Administrasi IPM v1.2</h3>
                            <span class="shrink-0 rounded-full bg-green-50 px-3 py-1 text-xs font-extrabold text-accentGreen">Publik</span>
                        </div>
                        <p class="mt-3 text-xs font-bold uppercase tracking-widest text-gray-400">Arsip · 06 Jul 2026</p>
                        <a href="#" class="mt-4 inline-flex text-sm font-extrabold text-primary">Edit</a>
                    </article>
                </div>
            </div>

            <aside class="min-w-0 space-y-6 xl:space-y-8">
                <div class="rounded-3xl bg-white border border-gray-100 p-6 shadow-sm">
                    <h2 class="text-lg font-extrabold text-gray-900">Aksi Cepat</h2>
                    <div class="mt-5 grid gap-3">
                        <button class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Tulis Berita Baru</button>
                        <button class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Upload Arsip</button>
                        <button class="rounded-2xl border border-gray-200 px-4 py-3 text-left text-sm font-extrabold text-gray-700 hover:bg-gray-50">Tambah Pengurus</button>
                    </div>
                </div>

                <div class="rounded-3xl bg-gray-900 p-6 text-white shadow-sm">
                    <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Catatan Integrasi</p>
                    <h2 class="mt-4 text-xl font-extrabold">Template ini belum memakai auth.</h2>
                    <p class="mt-3 text-sm font-medium leading-6 text-gray-300">Nanti form login bisa diarahkan ke controller, lalu route admin diberi middleware auth.</p>
                </div>
            </aside>
        </section>
    </div>
@endsection
