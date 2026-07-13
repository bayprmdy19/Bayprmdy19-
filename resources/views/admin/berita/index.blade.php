@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-xl font-bold">Daftar berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah berita</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($beritas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['judul'] }}</td>
                                        <td>{{ $item['isi'] }}</td>
                                        <td>
                                            @if ($item['gambar'])
                                                <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.berita.edit', $item['id']) }}" class="btn btn-warning">Edit</a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.berita.destroy', $item['id']) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada berita yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $beritas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection