@extends('vendor.layout')

@section('title', 'Dashboard Vendor')
@section('header', 'Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Total Pesanan</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total_bookings'] }}</p>
                </div>
                <i class="fas fa-shopping-cart text-blue-500 text-3xl opacity-20"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Pending</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                </div>
                <i class="fas fa-clock text-yellow-500 text-3xl opacity-20"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Dikonfirmasi</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['confirmed'] }}</p>
                </div>
                <i class="fas fa-check-circle text-blue-600 text-3xl opacity-20"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-semibold">Selesai</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['completed'] }}</p>
                </div>
                <i class="fas fa-check text-green-500 text-3xl opacity-20"></i>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
            <p class="text-sm text-gray-500">Kelola layanan dan pesanan PT Anda dari sini.</p>
        </div>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-white text-gray-900 px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition">
            <i class="fas fa-home"></i>
            Kembali ke Home
        </a>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 text-white">
            <h3 class="text-lg font-semibold mb-2">Layanan Aktif</h3>
            <p class="text-blue-100 mb-4">{{ $stats['total_jasa'] }} layanan terdaftar</p>
            <a href="{{ route('vendor.my-jasa') }}" class="inline-block bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-50 transition">
                Kelola Layanan
            </a>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-6 text-white">
            <h3 class="text-lg font-semibold mb-2">Pesanan Terbaru</h3>
            <p class="text-purple-100 mb-4">Lihat dan kelola pesanan terbaru Anda</p>
            <a href="{{ route('vendor.bookings') }}" class="inline-block bg-white text-purple-600 px-4 py-2 rounded-lg font-semibold hover:bg-purple-50 transition">
                Lihat Semua Pesanan
            </a>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-900">Pesanan Terbaru</h2>
        </div>

        @if($bookings->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Layanan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="font-semibold text-gray-900">{{ $booking->full_name }}</div>
                                    <div class="text-gray-500 text-xs">{{ $booking->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->jasa->nama_usaha }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if($booking->status === 'pending')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                            <span class="w-2 h-2 bg-yellow-600 rounded-full mr-2"></span> Pending
                                        </span>
                                    @elseif($booking->status === 'confirmed')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                            <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span> Dikonfirmasi
                                        </span>
                                    @elseif($booking->status === 'completed')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                            <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span> Selesai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span> Dibatalkan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('vendor.booking-detail', $booking->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">
                                        Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200">
                {{ $bookings->links() }}
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <i class="fas fa-inbox text-gray-400 text-4xl mb-4 block"></i>
                <p class="text-gray-600 text-lg mb-4">Belum ada pesanan</p>
                <a href="{{ route('vendors.index') }}" class="text-blue-600 hover:text-blue-900 font-semibold">
                    Kembali ke halaman vendor
                </a>
            </div>
        @endif
    </div>
@endsection
