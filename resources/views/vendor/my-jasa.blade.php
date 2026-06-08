@extends('vendor.layout')

@section('title', 'Layanan Saya')
@section('header', 'Layanan Saya')

@section('content')
    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Service Button -->
    <div class="mb-8 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-900">Daftar Layanan</h2>
        <a href="{{ route('vendor.jasa.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
            <i class="fas fa-plus"></i> Tambah Layanan
        </a>
    </div>

    <!-- Services List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($jasa_list as $jasa)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <!-- Image -->
                <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center overflow-hidden">
                    @if($jasa->foto)
                        <img src="{{ asset($jasa->foto) }}" alt="{{ $jasa->nama_usaha }}" class="w-full h-full object-cover">
                    @else
                        <i class="fas fa-briefcase text-white text-5xl opacity-50"></i>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $jasa->nama_usaha }}</h3>
                    
                    <div class="mb-4 space-y-2 text-sm">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-tag w-4 mr-3 text-blue-600"></i>
                            {{ $jasa->kategori->nama_kategori ?? 'Umum' }}
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-map-marker-alt w-4 mr-3 text-blue-600"></i>
                            {{ $jasa->kota }}
                        </div>
                        <!-- rating removed -->
                        <div class="flex items-center font-semibold text-blue-600">
                            <i class="fas fa-money-bill-wave w-4 mr-3"></i>
                            Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- status badge removed -->

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="{{ route('vendor.jasa-bookings', $jasa->id) }}" class="flex-1 px-3 py-2 text-center bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg font-semibold transition text-sm">
                            <i class="fas fa-calendar mr-1"></i> Pesanan
                        </a>
                        <a href="{{ route('vendor.jasa.edit', $jasa->id) }}" class="flex-1 px-3 py-2 text-center bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-lg font-semibold transition text-sm">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('vendor.jasa.destroy', $jasa->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus layanan ini?')" class="w-full px-3 py-2 text-center bg-red-50 text-red-600 hover:bg-red-100 rounded-lg font-semibold transition text-sm">
                                <i class="fas fa-trash-alt mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow p-12 text-center">
                    <i class="fas fa-briefcase text-gray-400 text-5xl mb-4 block"></i>
                    <p class="text-gray-600 text-lg mb-6">Anda belum memiliki layanan</p>
                    <a href="{{ route('jasa.create') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                        <i class="fas fa-plus mr-2"></i> Tambah Layanan Pertama
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($jasa_list->hasPages())
        <div class="mt-8">
            {{ $jasa_list->links() }}
        </div>
    @endif
@endsection
