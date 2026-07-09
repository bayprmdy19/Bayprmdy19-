@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Tambah Bidang</h1>
    <form action="{{ route('bidang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Bidang</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe Bidang</label>
            <input type="text" class="form-control" id="tipe" name="tipe" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('bidang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection