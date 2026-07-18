@extends('layouts.admin')

@section('title', 'Arsip Digital')
@section('page_title', 'Arsip Digital')
@section('page_subtitle', 'Kelola dokumen yang dapat diunduh anggota')

@section('content')
    <div class="space-y-4">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-extrabold text-gray-900">Daftar Arsip</h1>
                <p class="mt-1 text-sm font-medium text-gray-500">Temukan dokumen dengan cepat lewat pencarian dan rentang tanggal.</p>
            </div>
            <a href="{{ route('admin.arsip.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-primary px-5 py-3 text-sm font-extrabold text-white hover:bg-blue-600">Upload Arsip</a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-bold text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.arsip.index') }}" class="rounded-3xl border border-gray-100 bg-white p-4 shadow-sm sm:p-5">
            <div class="grid gap-3 lg:grid-cols-[minmax(0,1fr)_180px_180px_220px] lg:items-end">
                <div>
                    <label for="search" class="mb-2 block text-xs font-extrabold uppercase tracking-widest text-gray-400">Search</label>
                    <input type="text" id="search" name="search" value="{{ $filters['search'] ?? '' }}" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Cari judul, deskripsi, atau nama file">
                </div>
                <div>
                    <label for="tanggal_dari" class="mb-2 block text-xs font-extrabold uppercase tracking-widest text-gray-400">Tanggal Dari</label>
                    <input type="date" id="tanggal_dari" name="tanggal_dari" value="{{ $filters['tanggal_dari'] ?? '' }}" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>
                <div>
                    <label for="tanggal_sampai" class="mb-2 block text-xs font-extrabold uppercase tracking-widest text-gray-400">Tanggal Sampai</label>
                    <input type="date" id="tanggal_sampai" name="tanggal_sampai" value="{{ $filters['tanggal_sampai'] ?? '' }}" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <button type="submit" class="rounded-2xl bg-primary px-4 py-3 text-sm font-extrabold text-white hover:bg-blue-600">Filter</button>
                    <a href="{{ route('admin.arsip.index') }}" class="rounded-2xl border border-gray-200 px-4 py-3 text-center text-sm font-extrabold text-gray-600 hover:bg-gray-50">Reset</a>
                </div>
            </div>
        </form>

        <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead class="bg-gray-50 text-xs font-extrabold uppercase tracking-widest text-gray-400">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Judul</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4">Ukuran</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-semibold text-gray-700">
                        @forelse ($arsips as $arsip)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-6 py-5">{{ $arsips->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-5 font-extrabold text-gray-900">{{ $arsip->judul }}</td>
                                <td class="px-6 py-5 text-gray-600">{{ optional($arsip->tanggal_arsip)->format('d M Y') }}</td>
                                <td class="px-6 py-5 text-gray-600">{{ $arsip->deskripsi ?: '-' }}</td>
                                <td class="px-6 py-5 text-gray-600">{{ number_format(($arsip->ukuran ?? 0) / 1024, 1) }} KB</td>
                                <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.arsip.download', $arsip) }}" class="rounded-2xl border border-blue-200 bg-blue-50 px-4 py-2 text-xs font-extrabold text-primary hover:bg-blue-100">Unduh</a>
                                        <a href="{{ route('admin.arsip.edit', $arsip) }}" class="rounded-2xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-xs font-extrabold text-yellow-700 hover:bg-yellow-100">Edit</a>
                                        <form action="{{ route('admin.arsip.destroy', $arsip) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-2xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-extrabold text-red-600 hover:bg-red-100" onclick="return confirm('Hapus arsip ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-sm font-semibold text-gray-500">Belum ada arsip yang diupload.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 px-5 py-3">
                {{ $arsips->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
