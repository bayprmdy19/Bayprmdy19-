@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-xl font-bold">Daftar bidang</h1>
        <a href="{{ route('bidang.create') }}" class="btn btn-primary mb-3">Tambah bidang</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bidangs as $bidang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bidang['nama'] }}</td>
                                        <td>{{ $bidang['tipe'] }}</td>
                                        <td>{{ $bidang['deskripsi'] }}</td>
                                        <td>
                                            <a href="{{ route('admin.bidang.edit', $bidang['id']) }}" class="btn btn-warning">Edit</a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.bidang.destroy', $bidang['id']) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada bidang yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $bidangs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection