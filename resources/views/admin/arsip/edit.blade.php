@extends('layouts.admin')

@section('title', 'Edit Arsip')
@section('page_title', 'Edit Arsip')
@section('page_subtitle', 'Perbarui metadata atau file arsip')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-xl font-bold">Edit Arsip</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.arsip.update', $arsip) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Arsip</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $arsip->judul) }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                <input type="date" class="form-control" id="tanggal_arsip" name="tanggal_arsip" value="{{ old('tanggal_arsip', optional($arsip->tanggal_arsip)->format('Y-m-d')) }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">File Saat Ini</label>
                <input type="text" class="form-control" value="{{ $arsip->original_name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Ganti File</label>
                <input type="file" class="form-control" id="file" name="file">
                <small class="text-muted">Kosongkan jika file tidak diubah.</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.arsip.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
