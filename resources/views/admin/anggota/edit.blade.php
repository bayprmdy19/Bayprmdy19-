@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Edit Anggota</h1>
    <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $anggota->no_telp }}" required>
        </div>
        <div class="mb-3">
            <label for="bidang" class="form-label">Bidang</label>
            <select class="form-control" id="bidang" name="bidang" required>
                <option value="">Pilih Bidang</option>
                @foreach ($bidangs as $bidang)
                    <option value="{{ $bidang['id'] }}" {{ $anggota->bidang == $bidang['id'] ? 'selected' : '' }}>{{ $bidang['nama'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection