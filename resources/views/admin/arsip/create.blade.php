@extends('layouts.admin')

@section('title', 'Upload Arsip')
@section('page_title', 'Upload Arsip')
@section('page_subtitle', 'Tambah dokumen baru untuk anggota')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-xl font-bold">Upload Arsip</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Arsip</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                <input type="date" class="form-control" id="tanggal_arsip" name="tanggal_arsip" value="{{ old('tanggal_arsip') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Arsip</label>
                <input type="file" class="form-control" id="file" name="file" required>
                <small class="text-muted">Maksimal 10 MB.</small>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="{{ route('admin.arsip.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
