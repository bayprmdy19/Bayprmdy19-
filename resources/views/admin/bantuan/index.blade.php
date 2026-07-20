@extends('layouts.admin')

@section('title', 'Daftar Laporan Bantuan Pelajar')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 font-extrabold text-gray-900">Pusat Bantuan Pelajar - Laporan Masuk</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white py-3">
            <h5 class="card-title mb-0 font-bold text-gray-700">Daftar Laporan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Laporan</th>
                            <th>Kategori Masalah</th>
                            <th>Tingkat Sekolah</th>
                            <th>Asal Ranting</th>
                            <th>Pengirim (Email)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($submissions as $sub)
                            <tr>
                                <td>{{ ($submissions->currentPage() - 1) * $submissions->perPage() + $loop->iteration }}</td>
                                <td>
                                    <span class="text-xs font-semibold text-gray-500">
                                        {{ $sub->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                                    </span>
                                </td>
                                <td>
                                    @if ($sub->kategori_masalah === 'Kekerasan Seksual & Pelecehan')
                                        <span class="badge bg-danger rounded-pill px-3 py-2" style="background-color: #ec4899 !important;">Kekerasan & Pelecehan</span>
                                    @elseif ($sub->kategori_masalah === 'Bullying & Perundungan')
                                        <span class="badge bg-dark rounded-pill px-3 py-2">Bullying</span>
                                    @elseif ($sub->kategori_masalah === 'Kesehatan Mental & Stres Belajar')
                                        <span class="badge bg-success rounded-pill px-3 py-2">Kesehatan Mental</span>
                                    @else
                                        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $sub->kategori_masalah }}</span>
                                    @endif
                                </td>
                                <td><span class="font-medium">{{ $sub->tingkat_sekolah }}</span></td>
                                <td><span class="font-medium text-gray-700">{{ $sub->asal_ranting }}</span></td>
                                <td>
                                    @if ($sub->email)
                                        <a href="mailto:{{ $sub->email }}" class="text-decoration-none font-semibold text-primary">{{ $sub->email }}</a>
                                    @else
                                        <span class="text-muted italic font-medium">Anonim</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group gap-2">
                                        <!-- Link ke halaman detail laporan -->
                                        <a href="{{ route('admin.bantuan.show', $sub->id) }}"
                                           class="btn btn-sm btn-outline-primary rounded-2 px-3 font-semibold">
                                            Detail
                                        </a>

                                        <!-- Delete action -->
                                        <form action="{{ route('admin.bantuan.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-2 px-3 font-semibold">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0V9a2 2 0 00-2-2H6a2 2 0 00-2 2v2m16 4h-2a2 2 0 00-2 2v1a2 2 0 002 2h2a2 2 0 002-2v-1a2 2 0 00-2-2z" />
                                    </svg>
                                    <span class="font-semibold d-block">Belum ada laporan bantuan masuk</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $submissions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
