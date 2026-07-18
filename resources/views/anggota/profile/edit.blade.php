<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Anggota | IPM Cileungsi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-900">
    <div class="mx-auto max-w-4xl px-4 py-10">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-blue-600">Profile Anggota</p>
                <h1 class="mt-2 text-3xl font-extrabold">Kelola data akunmu</h1>
            </div>
            <a href="{{ route('landing') }}" class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700">Kembali ke Landing</a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anggota.profile.update') }}" method="POST" class="rounded-[2rem] bg-white p-6 shadow-sm sm:p-8">
            @csrf
            @method('PUT')

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="nama" class="mb-2 block text-sm font-bold text-slate-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold" required>
                </div>
                <div>
                    <label for="jabatan" class="mb-2 block text-sm font-bold text-slate-700">Jabatan</label>
                    <select id="jabatan" name="jabatan" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold" required onchange="toggleBidangRequirement()">
                        @foreach ($jabatanOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('jabatan', $anggota->jabatan) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="username" class="mb-2 block text-sm font-bold text-slate-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $anggota->username) }}" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold" required>
                </div>
                <div>
                    <label for="email" class="mb-2 block text-sm font-bold text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $anggota->email) }}" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold">
                </div>
                <div>
                    <label for="no_telp" class="mb-2 block text-sm font-bold text-slate-700">No Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $anggota->no_telp) }}" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold" required>
                </div>
                <div class="md:col-span-2">
                    <label for="alamat" class="mb-2 block text-sm font-bold text-slate-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $anggota->alamat) }}" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold" required>
                </div>
                <div class="md:col-span-2">
                    <label for="bidang_id" class="mb-2 block text-sm font-bold text-slate-700">Bidang</label>
                    <select id="bidang_id" name="bidang_id" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold">
                        <option value="">Pilih Bidang</option>
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" @selected(old('bidang_id', $anggota->bidang_id) == $bidang->id)>{{ $bidang->nama }}</option>
                        @endforeach
                    </select>
                    <p class="mt-2 text-xs font-semibold text-slate-500">Jabatan pimpinan umum boleh tanpa bidang.</p>
                </div>
            </div>

            <div class="mt-8 grid gap-5 md:grid-cols-2">
                <div>
                    <label for="password" class="mb-2 block text-sm font-bold text-slate-700">Password Baru</label>
                    <input type="password" id="password" name="password" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold">
                </div>
                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-bold text-slate-700">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold">
                </div>
            </div>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <button type="submit" class="rounded-2xl bg-blue-600 px-6 py-3 text-sm font-bold text-white">Simpan Perubahan</button>
                <a href="{{ route('anggota.arsip.index') }}" class="rounded-2xl border border-slate-200 px-6 py-3 text-center text-sm font-bold text-slate-700">Lihat Arsip</a>
            </div>
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
</body>
</html>
