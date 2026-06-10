@extends('vendor.layout')

@section('title', 'Profil Vendor')
@section('header', 'Profil')

@section('content')
    <div class="space-y-8">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-800 rounded-[2rem] shadow-2xl shadow-slate-900/40 overflow-hidden border border-slate-700">
            <div class="p-8 lg:p-10 text-white">
                <div class="grid gap-8 lg:grid-cols-[280px_1fr] lg:items-end">
                    <div class="flex flex-col gap-6 rounded-[1.5rem] border border-white/10 bg-slate-900/80 p-8">
                        <div class="flex items-center justify-center w-28 h-28 rounded-[1.5rem] bg-gradient-to-br from-sky-500 to-indigo-600 text-5xl font-bold text-white shadow-lg shadow-sky-500/25">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div>
                            <h1 class="text-3xl font-semibold">{{ auth()->user()->name }}</h1>
                            <p class="mt-2 text-slate-300">Profil PT/CV</p>
                        </div>
                    </div>

                    <div class="grid gap-6">
                        <div class="rounded-[1.5rem] bg-slate-900/80 p-6 border border-white/10 backdrop-blur-sm">
                            <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Terdaftar sejak</p>
                            <p class="mt-3 text-3xl font-semibold text-white">{{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-900/80 p-6 border border-white/10 backdrop-blur-sm">
                            <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Status Akun</p>
                            <p class="mt-3 text-3xl font-semibold text-white">Vendor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-[1.3fr_0.9fr]">
            <!-- Profile Form -->
            <div class="bg-white rounded-[1.5rem] shadow-xl border border-slate-200 p-8">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Edit Profil</h2>
                        <p class="mt-2 text-sm text-slate-500">Perbarui nama dan email profil vendor Anda.</p>
                    </div>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">
                        <i class="fas fa-home"></i> Kembali ke Home
                    </a>
                </div>

                <form method="POST" action="{{ route('vendor.profile-update') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required
                            class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                            class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                        @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Role</label>
                        <input type="text" value="Vendor" disabled
                            class="w-full rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-slate-600">
                    </div>

                    <button type="submit" class="inline-flex items-center gap-2 rounded-3xl bg-blue-600 px-6 py-3 text-white font-semibold shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>

            <div class="space-y-6">
                <!-- Password form removed -->

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="bg-white rounded-[1.5rem] shadow-xl border border-slate-200 p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">Layanan Aktif</p>
                        <p class="mt-4 text-4xl font-bold text-slate-900">{{ auth()->user()->jasa->count() }}</p>
                        <p class="mt-2 text-sm text-slate-500">Jumlah layanan yang tersedia untuk PT Anda.</p>
                    </div>
                    <div class="bg-white rounded-[1.5rem] shadow-xl border border-slate-200 p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">Total Pesanan</p>
                        <p class="mt-4 text-4xl font-bold text-slate-900">{{ auth()->user()->jasa->sum(function($jasa) { return $jasa->bookings->count(); }) }}</p>
                        <p class="mt-2 text-sm text-slate-500">Total pesanan sepanjang waktu untuk semua layanan.</p>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] shadow-xl border border-slate-200 p-8">
                    <h3 class="text-xl font-semibold text-slate-900 mb-6 flex items-center gap-3">
                        <i class="fas fa-lock text-blue-600"></i> Keamanan Akun
                    </h3>

                    <div class="space-y-4">
                        @if(auth()->user()->email_verified_at)
                            <div class="rounded-3xl bg-slate-50 p-5 border border-slate-200">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-slate-400"></i>
                                    <div>
                                        <p class="text-sm text-slate-500">Email Verified</p>
                                        <p class="font-semibold text-slate-900">Ya</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="rounded-3xl bg-slate-50 p-5 border border-slate-200">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-calendar text-slate-400"></i>
                                <div>
                                    <p class="text-sm text-slate-500">Login Terakhir</p>
                                    <p class="font-semibold text-slate-900">Hari ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
