@extends('vendor.layout')

@section('title', 'Dashboard Vendor')
@section('header', 'Ringkasan Vendor')

@section('content')
    <div class="grid gap-6">
        <div class="grid gap-6 lg:grid-cols-[1.6fr_minmax(240px,1fr)]">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Ringkasan</p>
                        <h2 class="mt-2 text-3xl font-semibold text-slate-900">Selamat datang kembali, {{ auth()->user()->name }}.</h2>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">Periksa performa layanan, tinjau pesanan terbaru, dan langsung kelola aktivitas vendor Anda dari dashboard profesional ini.</p>
                    </div>
                    <div class="inline-flex rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700">
                        <i class="fas fa-calendar-check mr-2 text-slate-500"></i>
                        {{ now()->translatedFormat('d F Y') }}
                    </div>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
                    <div class="rounded-[1.5rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 border-l-4 border-slate-900">
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-900">Total Pesanan</p>
                        <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $stats['total_bookings'] }}</p>
                        <p class="mt-2 text-sm text-slate-500">Semua status pesanan.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 border-l-4 border-yellow-500">
                        <p class="text-sm uppercase tracking-[0.24em] text-yellow-600">Pending</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['pending'] }}</p>
                        <p class="mt-2 text-sm text-slate-500">Menunggu tindakan Anda.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 border-l-4 border-blue-500">
                        <p class="text-sm uppercase tracking-[0.24em] text-blue-600">Dikonfirmasi</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['confirmed'] }}</p>
                        <p class="mt-2 text-sm text-slate-500">Pesanan yang telah dikonfirmasi.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 border-l-4 border-green-500">
                        <p class="text-sm uppercase tracking-[0.24em] text-green-600">Selesai</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['completed'] }}</p>
                        <p class="mt-2 text-sm text-slate-500">Layanan yang berhasil diselesaikan.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 border-l-4 border-red-500">
                        <p class="text-sm uppercase tracking-[0.24em] text-red-600">Dibatalkan</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['cancelled'] }}</p>
                        <p class="mt-2 text-sm text-slate-500">Pesanan yang dibatalkan.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Layanan Aktif</p>
                            <h3 class="mt-3 text-2xl font-semibold text-slate-900">{{ $stats['total_jasa'] }}</h3>
                        </div>
                        <div class="rounded-2xl bg-slate-100 px-3 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-slate-700">Aktif</div>
                    </div>
                    <p class="mt-4 text-sm text-slate-500">Jumlah layanan yang terdaftar di sistem Anda saat ini.</p>
                    <a href="{{ route('vendor.my-jasa') }}" class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        <i class="fas fa-briefcase"></i> Kelola Layanan
                    </a>
                </div>

                <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.22em] text-slate-500">Pesanan Terbaru</p>
                            <h3 class="mt-2 text-2xl font-semibold text-slate-900">Lihat semua pesanan</h3>
                        </div>
                        <i class="fas fa-receipt text-slate-400 text-3xl"></i>
                    </div>
                    <p class="mt-4 text-sm text-slate-500">Pantau status pesanan dan respons pelanggan lebih cepat.</p>
                    <a href="{{ route('vendor.bookings') }}" class="mt-6 inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100">
                        <i class="fas fa-list"></i> Lihat Semua Pesanan
                    </a>
                </div>
            </div>
        </div>

        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200 overflow-hidden">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Pesanan Terbaru</p>
                    <h2 class="text-2xl font-semibold text-slate-900">Tinjauan pesanan</h2>
                </div>
                <span class="text-sm font-medium text-slate-500">Ditampilkan hingga 10 pesanan terbaru</span>
            </div>

            @if($bookings->count() > 0)
                <div class="mt-6 overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-slate-700">
                        <thead class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-[0.16em] text-slate-500">
                            <tr>
                                <th class="px-5 py-4">Tanggal</th>
                                <th class="px-5 py-4">Customer</th>
                                <th class="px-5 py-4">Layanan</th>
                                <th class="px-5 py-4">Status</th>
                                <th class="px-5 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($bookings as $booking)
                                <tr class="transition hover:bg-slate-50">
                                    <td class="px-5 py-4 text-slate-600">{{ $booking->created_at->format('d M Y') }}</td>
                                    <td class="px-5 py-4">
                                        <div class="font-semibold text-slate-900">{{ $booking->full_name }}</div>
                                        <div class="text-xs text-slate-500">{{ $booking->email }}</div>
                                    </td>
                                    <td class="px-5 py-4 text-slate-700">{{ $booking->jasa->nama_usaha }}</td>
                                    <td class="px-5 py-4">
                                        @if($booking->status === 'pending')
                                        <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">Pending</span>
                                    @elseif($booking->status === 'confirmed')
                                        <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">Dikonfirmasi</span>
                                    @elseif($booking->status === 'completed')
                                        <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">Selesai</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">Dibatalkan</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                    </td>
                                    <td class="px-5 py-4">
                                        <a href="{{ route('vendor.booking-detail', $booking->id) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-900 transition hover:text-slate-700">
                                            Detail <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 border-t border-slate-200 pt-4 text-right">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="mt-6 rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 px-6 py-12 text-center">
                    <i class="fas fa-inbox text-slate-400 text-4xl"></i>
                    <p class="mt-4 text-lg font-semibold text-slate-900">Belum ada pesanan</p>
                    <p class="mt-2 text-sm text-slate-500">Pesanan Anda akan muncul di sini setelah pelanggan melakukan reservasi.</p>
                    <a href="{{ route('vendors.index') }}" class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        <i class="fas fa-arrow-left"></i> Kembali ke halaman vendor
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
