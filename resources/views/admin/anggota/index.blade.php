@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-xl font-bold">Daftar Anggota</h1>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Bidang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggotas as $anggota)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anggota['nama'] }}</td>
                                        <td>{{ $anggota['alamat'] }}</td>
                                        <td>{{ $anggota['no_telp'] }}</td>
                                        <td>{{ $anggota['bidang']['nama'] ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('admin.anggota.edit', $anggota['id']) }}" class="btn btn-warning">Edit</a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.anggota.destroy', $anggota['id']) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $anggotas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection