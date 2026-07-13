@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Tambah Bidang</h1>

    <!-- Alert Error Validasi (Akan muncul jika validasi unik atau inputan error) -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <strong class="d-block mb-1">Gagal menyimpan bidang:</strong>
            <ul class="mb-0 ps-3" style="font-size: 0.875rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- PERBAIKAN: Ditambahkan onsubmit untuk mencegah pengiriman data ganda (double submit) -->
    <form action="{{ route('admin.bidang.store') }}" method="POST" onsubmit="preventDoubleSubmit(this)">
        @csrf
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Bidang</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe Bidang</label>
            <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe') }}" required>
            @error('tipe')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.bidang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Script JavaScript mencegah klik ganda menggunakan Bootstrap spinner -->
<script>
    function preventDoubleSubmit(form) {
        const submitButton = form.querySelector('button[type="submit"]');
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Menyimpan...
            `;
        }
    }
</script>
@endsection