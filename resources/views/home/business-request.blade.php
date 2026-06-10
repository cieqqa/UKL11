<x-app-layout>
    <div style="min-height:100vh; background:#f8fafc; padding: 3.5rem 1.5rem;">
    <div style="max-width:680px; margin:0 auto; width:100%;">
        <div class="space-y-5">

            {{-- Header --}}
            <div class="bg-white border border-slate-200 rounded-2xl px-6 py-5 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 21V7a2 2 0 012-2h4m0 0V3h6v2m0 0h4a2 2 0 012 2v14M9 5h6M9 21v-6a1 1 0 011-1h4a1 1 0 011 1v6"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Daftarkan PT / CV</h2>
                        <p class="text-sm text-slate-500 mt-0.5">Isi form di bawah untuk mengajukan pendaftaran usaha. Admin akan meninjau permintaan ini.</p>
                    </div>
                </div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 hover:bg-slate-100 transition whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Beranda
                </a>
            </div>

            {{-- Success --}}
            @if(session('success'))
                <div class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-800">
                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Errors --}}
            @if ($errors->any())
                <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800">
                    <p class="font-medium mb-2">Periksa kembali data yang dimasukkan:</p>
                    <ul class="ml-4 list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Card --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <form method="POST" action="{{ route('business-request.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Section: Informasi Perusahaan --}}
                    <div class="px-6 pt-6 pb-1">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-5 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
                            </svg>
                            Informasi Perusahaan
                        </p>

                        <div class="space-y-4">
                            {{-- Nama Usaha --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Nama Usaha
                                    <span class="inline-block w-1.5 h-1.5 bg-red-400 rounded-full ml-1 align-middle"></span>
                                </label>
                                <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" required
                                    placeholder="Masukkan nama usaha Anda"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                            </div>

                            {{-- Tipe Perusahaan --}}
                            <div>
                                <label style="display:block; font-size:14px; font-weight:500; color:#374151; margin-bottom:6px;">Tipe Perusahaan</label>
                                <div style="display:flex; gap:12px;">
                                    @foreach(['PT', 'CV'] as $type)
                                        <button type="button"
                                            onclick="selectType(this, '{{ $type }}')"
                                            id="btn-{{ strtolower($type) }}"
                                            style="flex:1; padding:10px; font-size:14px; font-weight:600; border-radius:10px; cursor:pointer; transition:all 0.15s; border:1px solid #e2e8f0; background:#f8fafc; color:#64748b;">
                                            {{ $type }}
                                        </button>
                                    @endforeach
                                </div>
                                <input type="hidden" name="company_type" id="company_type_input" value="{{ old('company_type', 'PT') }}" />
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Email Perusahaan
                                    <span class="inline-block w-1.5 h-1.5 bg-red-400 rounded-full ml-1 align-middle"></span>
                                </label>
                                <input type="email" name="company_email" value="{{ old('company_email') }}" required
                                    placeholder="contoh@ptanda.com"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                            </div>

                            {{-- Password --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                        Password
                                        <span class="inline-block w-1.5 h-1.5 bg-red-400 rounded-full ml-1 align-middle"></span>
                                    </label>
                                    <input type="password" name="password"
                                        placeholder="Buat password akun"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                        Konfirmasi Password
                                        <span class="inline-block w-1.5 h-1.5 bg-red-400 rounded-full ml-1 align-middle"></span>
                                    </label>
                                    <input type="password" name="password_confirmation"
                                        placeholder="Ulangi password"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="mx-6 my-5 border-t border-slate-100"></div>

                    {{-- Section: Detail & Lokasi --}}
                    <div class="px-6 pb-1">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-5 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Detail & Lokasi
                        </p>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Estimasi Harga</label>
                                    <div class="relative">
                                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm text-slate-400 font-medium">Rp</span>
                                        <input type="number" name="estimasi_harga" value="{{ old('estimasi_harga') }}"
                                            placeholder="0"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-10 pr-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kota</label>
                                    <input type="text" name="kota" value="{{ old('kota') }}"
                                        placeholder="Surabaya"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Kategori</label>
                                <select name="id_kategori"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition appearance-none">
                                    <option value="">Pilih kategori (opsional)</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>
                                            {{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Kontak (WhatsApp / Phone)</label>
                                <input type="text" name="kontak" value="{{ old('kontak') }}"
                                    placeholder="08xxxxxxxxxx"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat Lengkap</label>
                                <input type="text" name="alamat" value="{{ old('alamat') }}"
                                    placeholder="Jl. Contoh No. 1, Kecamatan, Kota"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi / Catatan</label>
                                <textarea name="deskripsi" rows="4"
                                    placeholder="Jelaskan singkat tentang usaha Anda, layanan yang ditawarkan, dll."
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition resize-none">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="mx-6 my-5 border-t border-slate-100"></div>

                    {{-- Section: Foto --}}
                    <div class="px-6 pb-1">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-5 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Foto Usaha
                        </p>

                        <label for="foto-upload"
                            class="flex flex-col items-center justify-center w-full border-2 border-dashed border-slate-200 rounded-xl py-8 px-4 text-center bg-slate-50 cursor-pointer hover:border-blue-300 hover:bg-blue-50/40 transition group">
                            <svg class="w-8 h-8 text-slate-300 group-hover:text-blue-400 mb-3 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="text-sm font-medium text-slate-600 group-hover:text-blue-600 transition">Klik untuk unggah foto</p>
                            <p class="text-xs text-slate-400 mt-1">PNG, JPG, WEBP — maks. 2MB (opsional)</p>
                            <input id="foto-upload" type="file" name="foto" accept="image/*" class="sr-only" />
                        </label>
                    </div>

                    {{-- Actions --}}
                    <div style="display:flex; flex-direction:row; justify-content:flex-end; align-items:center; gap:10px; padding:20px 24px; margin-top:8px; background:#f8fafc; border-top:1px solid #e2e8f0; border-radius:0 0 16px 16px;">
                        <a href="{{ route('vendors.index') }}"
                            style="display:inline-flex; align-items:center; gap:6px; padding:10px 20px; font-size:14px; font-weight:500; color:#475569; background:#ffffff; border:1px solid #e2e8f0; border-radius:10px; text-decoration:none; white-space:nowrap; cursor:pointer;">
                            <svg style="width:15px;height:15px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                            style="display:inline-flex; align-items:center; gap:8px; padding:10px 24px; font-size:14px; font-weight:600; color:#ffffff; background:#2563eb; border:none; border-radius:10px; cursor:pointer; white-space:nowrap; letter-spacing:0.01em;">
                            <svg style="width:15px;height:15px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Kirim Pendaftaran
                        </button>
                    </div>

                </form>

                <script>
                    function selectType(el, val) {
                        document.getElementById('company_type_input').value = val;
                        ['pt','cv'].forEach(function(t) {
                            var btn = document.getElementById('btn-' + t);
                            btn.style.background = '#f8fafc';
                            btn.style.borderColor = '#e2e8f0';
                            btn.style.color = '#64748b';
                        });
                        el.style.background = '#eff6ff';
                        el.style.borderColor = '#60a5fa';
                        el.style.color = '#1d4ed8';
                    }
                    window.addEventListener('DOMContentLoaded', function() {
                        var def = document.getElementById('company_type_input').value.toLowerCase();
                        var defBtn = document.getElementById('btn-' + def);
                        if (defBtn) {
                            defBtn.style.background = '#eff6ff';
                            defBtn.style.borderColor = '#60a5fa';
                            defBtn.style.color = '#1d4ed8';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>