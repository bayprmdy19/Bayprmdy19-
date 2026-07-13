@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Edit Bidang</h1>
    <form action="{{ route('admin.bidang.update', $bidang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Bidang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $bidang->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe Bidang</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $bidang->tipe }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $bidang->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.bidang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection