@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')
@section('page_subtitle', 'Perbarui isi berita dan ganti gambar bila diperlukan')

@section('content')
<div class="max-w-4xl">
    @if ($errors->any())
        <div class="mb-4 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-rose-800">
            <div class="mb-2 text-sm font-bold">Gagal memperbarui berita karena:</div>
            <ul class="list-disc list-inside space-y-1 text-xs font-semibold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-[2.5rem] border border-gray-200 bg-white p-8 shadow-sm sm:p-10">
        <div class="mb-8 border-b border-gray-100 pb-6">
            <h3 class="text-xl font-extrabold text-gray-900">Edit Berita</h3>
            <p class="mt-1 text-xs text-gray-400">Ubah judul, isi, dan gambar berita dari form ini.</p>
        </div>

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="judul" class="ml-2 text-xs font-bold uppercase tracking-widest text-gray-400">Judul Berita</label>
                <input type="text"
                       class="w-full rounded-2xl border border-gray-200 bg-gray-50 p-4 text-sm font-bold text-gray-800 outline-none transition-all focus:border-primary focus:bg-white @error('judul') border-rose-500 @enderror"
                       id="judul"
                       name="judul"
                       value="{{ old('judul', $berita->judul) }}"
                       required>
            </div>

            <div class="space-y-2">
                <label for="isi" class="ml-2 text-xs font-bold uppercase tracking-widest text-gray-400">Isi Berita</label>
                <textarea class="w-full resize-none rounded-2xl border border-gray-200 bg-gray-50 p-5 text-sm font-semibold leading-relaxed text-gray-800 outline-none transition-all focus:border-primary focus:bg-white @error('isi') border-rose-500 @enderror"
                          id="isi"
                          name="isi"
                          rows="6"
                          required>{{ old('isi', $berita->isi) }}</textarea>
            </div>

            <div class="space-y-3">
                <label for="gambar" class="ml-2 text-xs font-bold uppercase tracking-widest text-gray-400">Gambar Berita</label>

                @if ($berita->gambar)
                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <p class="mb-3 text-xs font-bold uppercase tracking-widest text-gray-400">Gambar Saat Ini</p>
                        <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="h-40 w-full rounded-2xl object-cover border border-gray-200 sm:w-72">
                    </div>
                @endif

                <div class="rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 p-6 transition-all hover:border-primary">
                    <input type="file"
                           class="text-sm font-bold text-gray-500 file:mr-4 file:rounded-xl file:border-0 file:bg-primary/10 file:px-4 file:py-2.5 file:text-xs file:font-black file:text-primary hover:file:bg-primary/20"
                           id="gambar"
                           name="gambar">
                    <p class="mt-2 text-[10px] font-bold uppercase text-gray-400">Upload gambar baru jika ingin mengganti yang lama. Format: JPEG, PNG, JPG, GIF, SVG (maks. 2MB)</p>
                </div>
            </div>

            <div class="flex justify-end gap-4 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.berita.index') }}" class="rounded-2xl px-6 py-4 text-sm font-bold text-gray-500 transition-all hover:bg-gray-100">Batal</a>
                <button type="submit" class="rounded-2xl bg-primary px-8 py-4 text-sm font-bold text-white transition-all hover:bg-blue-600 hover:shadow-xl hover:shadow-blue-200 active:scale-95">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
