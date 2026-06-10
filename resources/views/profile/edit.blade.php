<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-slate-900 shadow-lg transition hover:bg-amber-600 hover:shadow-xl">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="space-y-6">
                    @if(auth()->user()->role === 'user')
                        <!-- Business Registration Status -->
                        <div class="bg-white shadow-sm border border-gray-200 rounded-3xl overflow-hidden hover:shadow-md transition-shadow">
                            <div class="p-6 sm:p-8 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Status Pendaftaran PT/CV</h3>
                                        <p class="mt-1 text-sm text-gray-600">Lihat status dan detail pendaftaran bisnis Anda</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8">
                                @if(isset($businessRequest) && $businessRequest)
                                    <div class="space-y-6">
                                        <!-- Status Badge -->
                                        <div class="flex items-center justify-between pb-6 border-b border-gray-200">
                                            <span class="text-sm font-medium text-gray-700">Status</span>
                                            @if($businessRequest->status === 'approved')
                                                <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-800">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                                    Diterima
                                                </span>
                                            @elseif($businessRequest->status === 'rejected')
                                                <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-800">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                                                    Ditolak
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-800">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-13a1 1 0 00-.707.293l-5.5 5.5a1 1 0 101.414 1.414L9 7.414l4.793 4.793a1 1 0 001.414-1.414l-5.5-5.5A1 1 0 0010 5z" clip-rule="evenodd" /></svg>
                                                    Menunggu Persetujuan
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Business Details Grid -->
                                        <div class="grid gap-6 sm:grid-cols-2">
                                            <div class="rounded-2xl bg-gray-50 p-5">
                                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">Nama Usaha</p>
                                                <p class="mt-3 text-lg font-bold text-gray-900">{{ $businessRequest->nama_usaha }}</p>
                                            </div>
                                            <div class="rounded-2xl bg-gray-50 p-5">
                                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">Tipe Perusahaan</p>
                                                <p class="mt-3 text-lg font-bold text-gray-900">{{ $businessRequest->company_type ?? 'Tidak diisi' }}</p>
                                            </div>
                                            <div class="rounded-2xl bg-gray-50 p-5">
                                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">Email Perusahaan</p>
                                                <p class="mt-3 text-base font-semibold text-gray-900 break-all">{{ $businessRequest->company_email }}</p>
                                            </div>
                                            <div class="rounded-2xl bg-gray-50 p-5">
                                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">Diajukan Pada</p>
                                                <p class="mt-3 text-base font-semibold text-gray-900">{{ $businessRequest->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-8 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="mt-4 text-sm font-medium text-gray-700">Anda belum mengajukan pendaftaran PT/CV</p>
                                        <p class="mt-1 text-xs text-gray-600">Daftar sebagai vendor sekarang untuk memperluas jangkauan bisnis Anda</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Profile Information Section -->
                    <div class="bg-white shadow-sm border border-gray-200 rounded-3xl overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-6 sm:p-8 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Informasi Profil</h3>
                                    <p class="mt-1 text-sm text-gray-600">Update nama dan alamat email akun Anda</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Password form removed by request -->

                    <!-- Delete Account Section -->
                    <div class="bg-white shadow-sm border border-gray-200 rounded-3xl overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-6 sm:p-8 border-b border-gray-200 bg-gradient-to-r from-red-50 to-orange-50">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 5v1m7-13a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Zona Berbahaya</h3>
                                    <p class="mt-1 text-sm text-gray-600">Tindakan permanen yang tidak dapat dibatalkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
