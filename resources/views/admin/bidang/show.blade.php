@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-xl font-bold">Data Bidang</h1>
    <div class="mb-4">
        <a href="{{ route('bidang.index') }}" class="btn btn-secondary">Kembali ke Daftar Bidang</a>
    </div>
    <div class="card p-4">
        <h2 class="text-lg font-bold mb-2">Nama Bidang:</h2>
        <p class="mb-4">{{ $bidang->nama }}</p> 
        <h2 class="text-lg font-bold mb-2">Tipe Bidang:</h2>
        <p class="mb-4">{{ $bidang->tipe }}</p> 
        <h2 class="text-lg font-bold mb-2">Deskripsi:</h2>
        <p class="mb-4">{{ $bidang->deskripsi ?? '-' }}</p> 
    </div>
</div>
@endsection
