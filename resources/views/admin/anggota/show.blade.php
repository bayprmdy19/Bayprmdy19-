@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Data Anggota</h1>
    <div class="mb-4">
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary">Kembali ke Daftar Anggota</a>
    </div>
    <div class="card p-4">
        <h2 class="text-lg font-bold mb-2">Nama Anggota:</h2>
        <p class="mb-4">{{ $anggota->nama }}</p> 
        <h2 class="text-lg font-bold mb-2">Alamat:</h2>
        <p class="mb-4">{{ $anggota->alamat }}</p> 
        <h2 class="text-lg font-bold mb-2">No Telp:</h2>
        <p class="mb-4">{{ $anggota->no_telp }}</p> 
        <h2 class="text-lg font-bold mb-2">Bidang:</h2>
        <p class="mb-4">{{ $anggota->bidang->nama ?? '-' }}</p> 
    </div>
</div>
@endsection
