@extends('layouts.admin')

@section('title', 'Bidang')
@section('page_title', 'Bidang')
@section('page_subtitle', 'Kelola data bidang organisasi')

@section('content')
    <div class="space-y-4">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-extrabold text-gray-900">Daftar Bidang</h1>
                <p class="mt-1 text-sm font-medium text-gray-500">Cari dan kelola struktur bidang dari satu tempat.</p>
            </div>
            <a href="{{ route('admin.bidang.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-primary px-5 py-3 text-sm font-extrabold text-white hover:bg-blue-600">Tambah Bidang</a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.bidang.index') }}" class="rounded-3xl border border-gray-100 bg-white p-4 shadow-sm sm:p-5">
            <div class="grid gap-3 lg:grid-cols-[minmax(0,1fr)_240px_220px] lg:items-end">
                <div>
                    <label for="search" class="mb-2 block text-xs font-extrabold uppercase tracking-widest text-gray-400">Search</label>
                    <input type="text" id="search" name="search" value="{{ $filters['search'] ?? '' }}" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-blue-100" placeholder="Cari nama, tipe, atau deskripsi">
                </div>
                <div>
                    <label for="tipe" class="mb-2 block text-xs font-extrabold uppercase tracking-widest text-gray-400">Tipe</label>
                    <select id="tipe" name="tipe" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-blue-100">
                        <option value="">Semua tipe</option>
                        @foreach ($tipeOptions as $tipe)
                            <option value="{{ $tipe }}" @selected(($filters['tipe'] ?? '') === $tipe)>{{ $tipe }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <button type="submit" class="rounded-2xl bg-primary px-4 py-3 text-sm font-extrabold text-white hover:bg-blue-600">Filter</button>
                    <a href="{{ route('admin.bidang.index') }}" class="rounded-2xl border border-gray-200 px-4 py-3 text-center text-sm font-extrabold text-gray-600 hover:bg-gray-50">Reset</a>
                </div>
            </div>
        </form>

        <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead class="bg-gray-50 text-xs font-extrabold uppercase tracking-widest text-gray-400">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Nama Bidang</th>
                            <th class="px-6 py-4">Tipe</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-semibold text-gray-700">
                        @forelse ($bidangs as $bidang)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-6 py-5">{{ $bidangs->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-5 font-extrabold text-gray-900">{{ $bidang['nama'] }}</td>
                                <td class="px-6 py-5">
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-extrabold text-primary">{{ $bidang['tipe'] }}</span>
                                </td>
                                <td class="px-6 py-5 text-gray-600">{{ $bidang['deskripsi'] ?: '-' }}</td>
                                <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.bidang.edit', $bidang['id']) }}" class="rounded-2xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-xs font-extrabold text-yellow-700 hover:bg-yellow-100">Edit</a>
                                        <form action="{{ route('admin.bidang.destroy', $bidang['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-2xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-extrabold text-red-600 hover:bg-red-100" onclick="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-sm font-semibold text-gray-500">Tidak ada bidang yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 px-5 py-3">
                {{ $bidangs->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
