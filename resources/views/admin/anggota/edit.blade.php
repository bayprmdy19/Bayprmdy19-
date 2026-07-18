@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Edit Anggota</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required onchange="toggleBidangRequirement()">
                <option value="">Pilih Jabatan</option>
                @foreach ($jabatanOptions as $value => $label)
                    <option value="{{ $value }}" @selected(old('jabatan', $anggota->jabatan) === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username Login</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $anggota->username) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $anggota->email) }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $anggota->alamat) }}" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp', $anggota->no_telp) }}" required>
        </div>
        <div class="mb-3">
            <label for="bidang_id" class="form-label">Bidang</label>
            <select class="form-control" id="bidang_id" name="bidang_id">
                <option value="">Pilih Bidang</option>
                @foreach ($bidangs as $bidang)
                    <option value="{{ $bidang['id'] }}" @selected(old('bidang_id', $anggota->bidang_id) == $bidang['id'])>{{ $bidang['nama'] }}</option>
                @endforeach
            </select>
            <small class="text-muted">Jabatan pimpinan umum boleh tanpa bidang.</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="text-muted">Kosongkan jika password tidak diubah.</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script>
    function toggleBidangRequirement() {
        const jabatan = document.getElementById('jabatan').value;
        const bidang = document.getElementById('bidang_id');
        const umum = ['ketua_umum', 'sekretaris_umum', 'bendahara_umum'];
        const wajibBidang = !umum.includes(jabatan);

        bidang.required = wajibBidang;

        if (!wajibBidang) {
            bidang.value = '';
        }
    }

    toggleBidangRequirement();
</script>
@endsection
