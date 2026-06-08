@extends('vendor.layout')

@section('title', 'Edit Layanan')
@section('header', 'Edit Layanan')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8">
        @if(session('success'))
            <div class="mb-6 px-6 py-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-5 rounded-2xl bg-red-50 border border-red-200 text-red-700">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendor.jasa.update', $jasa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="nama_usaha">Nama Usaha</label>
                    <input id="nama_usaha" name="nama_usaha" type="text" value="{{ old('nama_usaha', $jasa->nama_usaha) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="alamat">Alamat</label>
                    <input id="alamat" name="alamat" type="text" value="{{ old('alamat', $jasa->alamat) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="kota">Kota</label>
                    <input id="kota" name="kota" type="text" value="{{ old('kota', $jasa->kota) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="id_kategori">Kategori</label>
                    <select id="id_kategori" name="id_kategori" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                        <option value="" disabled>Pilih kategori</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}" {{ old('id_kategori', $jasa->id_kategori) == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="estimasi_harga">Estimasi Harga</label>
                    <input id="estimasi_harga" name="estimasi_harga" type="number" value="{{ old('estimasi_harga', $jasa->estimasi_harga) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="space-y-4">
                    <label class="font-semibold text-gray-700" for="kontak">Kontak</label>
                    <input id="kontak" name="kontak" type="text" value="{{ old('kontak', $jasa->kontak) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="space-y-4 md:col-span-2">
                    <label class="font-semibold text-gray-700" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="6" class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>{{ old('deskripsi', $jasa->deskripsi) }}</textarea>
                </div>

                <div class="space-y-4 md:col-span-2">
                    <label class="font-semibold text-gray-700" for="foto">Foto Layanan Baru (opsional)</label>
                    <input id="foto" name="foto" type="file" accept="image/*" class="w-full rounded-2xl border border-slate-300 px-4 py-3 bg-white">
                </div>

                @if($jasa->foto)
                    <div class="space-y-4 md:col-span-2">
                        <label class="font-semibold text-gray-700">Foto Saat Ini</label>
                        <div class="overflow-hidden rounded-3xl border border-slate-200">
                            <img src="{{ asset($jasa->foto) }}" alt="Foto Jasa" class="w-full object-cover">
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('vendor.my-jasa') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Perbarui Layanan</button>
            </div>
        </form>
    </div>
@endsection
