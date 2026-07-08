@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Daftar bidang</h1>
    <a href="{{ route('bidang.create') }}" class="btn btn-primary mb-3">Tambah Bidang</a>

    <table class="table table-bordered border border-gray-600 w-full text-left full">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama bidang</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bidangs as $bidang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bidang->nama }}</td>
                    <td>{{ $bidang->deskripsi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('bidang.show', $bidang->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                        <a href="{{ route('bidang.edit', $bidang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('bidang.destroy', $bidang->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada bidang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
