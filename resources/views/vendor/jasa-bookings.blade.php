@extends('vendor.layout')

@section('title', 'Pesanan - ' . $jasa->nama_usaha)
@section('header', 'Pesanan ' . $jasa->nama_usaha)

@section('content')
    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
            <p class="text-gray-600 text-sm font-semibold mb-1">Total</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
            <p class="text-gray-600 text-sm font-semibold mb-1">Pending</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-600">
            <p class="text-gray-600 text-sm font-semibold mb-1">Dikonfirmasi</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['confirmed'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <p class="text-gray-600 text-sm font-semibold mb-1">Selesai</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['completed'] }}</p>
        </div>
    </div>

    <!-- Bookings List -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">Daftar Pesanan</h2>
            <div class="text-sm text-gray-600">
                <i class="fas fa-briefcase mr-2"></i> {{ $jasa->nama_usaha }}
            </div>
        </div>

        @if($bookings->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Jadwal</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="font-semibold text-gray-900">{{ $booking->user->name }}</div>
                                    <div class="text-gray-500 text-xs">{{ $booking->user->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <div>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</div>
                                    <div class="text-gray-500 text-xs">{{ $booking->time }}</div>
                                </td>
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
                                <td class="px-6 py-4 text-sm font-semibold text-blue-600">
                                    Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('vendor.booking-detail', $booking->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">
                                        <i class="fas fa-eye mr-1"></i> Lihat
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
                <p class="text-gray-600 text-lg">Belum ada pesanan untuk layanan ini</p>
            </div>
        @endif
    </div>
@endsection
