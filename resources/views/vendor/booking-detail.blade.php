@extends('vendor.layout')

@section('title', 'Detail Pesanan')
@section('header', 'Detail Pesanan')

@section('content')
    <div class="mx-auto w-full max-w-5xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Details -->
            <div class="lg:col-span-2">
                <!-- Status Card -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">Pesanan #{{ $booking->id }}</h2>
                        <div>
                            @if($booking->status === 'pending')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                    <span class="w-3 h-3 bg-yellow-600 rounded-full mr-2"></span> Pending
                                </span>
                            @elseif($booking->status === 'confirmed')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                    <span class="w-3 h-3 bg-blue-600 rounded-full mr-2"></span> Dikonfirmasi
                                </span>
                            @elseif($booking->status === 'completed')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    <span class="w-3 h-3 bg-green-600 rounded-full mr-2"></span> Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                    <span class="w-3 h-3 bg-red-600 rounded-full mr-2"></span> Dibatalkan
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Booking Timeline -->
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="w-1 bg-gray-300 flex-1" style="height: 2rem;"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Pesanan Dibuat</p>
                                <p class="text-sm text-gray-600">{{ $booking->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 {{ $booking->status !== 'pending' ? 'bg-blue-600' : 'bg-gray-300' }} rounded-full flex items-center justify-center text-white text-sm">
                                    <i class="fas {{ $booking->status !== 'pending' ? 'fa-check' : 'fa-clock' }}"></i>
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold {{ $booking->status !== 'pending' ? 'text-gray-900' : 'text-gray-500' }}">Status Diperbarui</p>
                                <p class="text-sm {{ $booking->status !== 'pending' ? 'text-gray-600' : 'text-gray-500' }}">
                                    {{ $booking->updated_at->format('d M Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Informasi Customer</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Nama Lengkap</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->full_name }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Email</label>
                            <p class="text-gray-900 font-medium mt-1">
                                <a href="mailto:{{ $booking->email }}" class="text-blue-600 hover:text-blue-900">{{ $booking->email }}</a>
                            </p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Nomor Telepon</label>
                            <p class="text-gray-900 font-medium mt-1">
                                <a href="tel:{{ $booking->phone }}" class="text-blue-600 hover:text-blue-900">{{ $booking->phone }}</a>
                            </p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Kota</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->city }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-sm text-gray-600 font-semibold">Alamat</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Service Details -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Detail Layanan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Layanan</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->service_name }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Vendor</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->jasa->nama_usaha }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Tanggal Layanan</label>
                            <p class="text-gray-900 font-medium mt-1">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Jam Layanan</label>
                            <p class="text-gray-900 font-medium mt-1">{{ $booking->time }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Metode Pembayaran</label>
                            <p class="text-gray-900 font-medium mt-1 capitalize">
                                {{ $booking->payment_method === 'cod' ? 'Bayar di Tempat' : 'Transfer Bank' }}
                            </p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 font-semibold">Harga</label>
                            <p class="text-gray-900 font-medium mt-1 text-lg text-blue-600">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</p>
                        </div>
                        @if($booking->notes)
                            <div class="md:col-span-2">
                                <label class="text-sm text-gray-600 font-semibold">Catatan</label>
                                <p class="text-gray-900 font-medium mt-1">{{ $booking->notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Actions -->
            <div>
                <div class="bg-white rounded-lg shadow p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Tindakan</h3>

                    <form method="POST" action="{{ route('vendor.booking-update-status', $booking->id) }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Ubah Status</label>
                            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </form>

                    <a href="{{ route('vendor.bookings') }}" class="block text-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition mt-4">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>

                    <!-- Contact Info -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-700 mb-4">Hubungi Customer</h4>
                        <div class="space-y-2">
                            <a href="mailto:{{ $booking->email }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg transition">
                                <i class="fas fa-envelope text-blue-600"></i> Email
                            </a>
                            <a href="tel:{{ $booking->phone }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg transition">
                                <i class="fas fa-phone text-green-600"></i> Telepon
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
