<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Layanan - {{ $jasa->nama_usaha }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 text-base font-bold text-white shadow-[0_8px_18px_rgba(59,130,246,0.35)]">K</div>
                        <span class="text-lg font-bold text-gray-900 tracking-tight">Klik n Clean</span>
                    </a>
                    <div class="text-sm text-gray-600">Pemesanan Layanan</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Page Title -->
            <div class="mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Pesan Layanan</h1>
                <p class="text-lg text-gray-600">Isi formulir di bawah untuk memesan layanan dari {{ $jasa->nama_usaha }}</p>
            </div>

            <!-- Progress Steps -->
            <div class="mb-12">
                <div class="flex items-center justify-center gap-2 sm:gap-4">
                    <div class="step-item active" data-step="1">
                        <div class="step-circle">1</div>
                        <div class="step-label">Data Pribadi</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="2">
                        <div class="step-circle">2</div>
                        <div class="step-label">Pilih Layanan</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-label">Jadwal</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item" data-step="4">
                        <div class="step-circle">4</div>
                        <div class="step-label">Pembayaran</div>
                    </div>
                </div>
            </div>

            <!-- Form Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Form Column -->
                <div class="lg:col-span-2">
                    <form method="post" action="{{ route('book.store') }}" id="bookingForm" class="bg-white rounded-2xl shadow-sm p-8">
                        @csrf
                        <input type="hidden" name="jasa_id" value="{{ $jasa->id }}">

                        <!-- Step 1: Personal Information -->
                        <div class="step-panel" data-panel="1">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Data Pribadi</h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', auth()->user()?->name ?? '') }}" placeholder="Masukkan nama lengkap" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('full_name')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()?->email ?? '') }}" placeholder="Masukkan email" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('email')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon *</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="081xxxxxxxxx" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('phone')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>
                                
                                <div>
                                    <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">Kota *</label>
                                    <input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Masukkan kota" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('city')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap *</label>
                                <textarea id="address" name="address" rows="4" placeholder="Masukkan alamat lengkap tempat layanan" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('address') }}</textarea>
                                @error('address')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Step 2: Select Service -->
                        <div class="step-panel hidden" data-panel="2">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Pilih Layanan</h2>
                            
                            <div class="mb-6">
                                <label for="service_name" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Layanan *</label>
                                <select id="service_name" name="service_name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    <option value="{{ $jasa->kategori->nama_kategori ?? 'Umum' }}">
                                        {{ $jasa->kategori->nama_kategori ?? 'Umum' }} - Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}
                                    </option>
                                </select>
                                @error('service_name')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                            </div>

                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Informasi Vendor</h3>
                                <div class="space-y-2 text-sm text-gray-600">
                                    <p><strong class="text-gray-900">{{ $jasa->nama_usaha }}</strong></p>
                                    <p>Estimasi Harga: <strong class="text-gray-900">Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}</strong></p>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Schedule -->
                        <div class="step-panel hidden" data-panel="3">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Jadwal Layanan</h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Diinginkan *</label>
                                    <input type="date" id="date" name="date" value="{{ old('date') }}" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    @error('date')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="time" class="block text-sm font-semibold text-gray-700 mb-2">Jam Diinginkan *</label>
                                    <select id="time" name="time" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                        <option value="">-- Pilih Jam --</option>
                                        <option value="08:00">08:00 - 10:00</option>
                                        <option value="10:00">10:00 - 12:00</option>
                                        <option value="13:00">13:00 - 15:00</option>
                                        <option value="15:00">15:00 - 17:00</option>
                                    </select>
                                    @error('time')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Catatan Tambahan (Opsional)</label>
                                <textarea id="notes" name="notes" rows="4" placeholder="Tuliskan catatan khusus untuk vendor..."
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('notes') }}</textarea>
                                @error('notes')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Step 4: Payment -->
                        <div class="step-panel hidden" data-panel="4">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Metode Pembayaran</h2>
                            
                            <div class="mb-6">
                                <label for="payment_method" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Metode Pembayaran *</label>
                                <select id="payment_method" name="payment_method" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    <option value="">-- Pilih Metode --</option>
                                    <option value="cod">Bayar di Tempat (COD)</option>
                                    <option value="transfer">Transfer Bank</option>
                                </select>
                                @error('payment_method')<span class="text-sm text-red-600 mt-1">{{ $message }}</span>@enderror
                            </div>

                            <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                                <p class="text-sm text-amber-900">
                                    ℹ️ Pastikan semua data yang Anda masukkan sudah benar sebelum mengkonfirmasi pemesanan. Vendor akan menghubungi Anda untuk konfirmasi lebih lanjut.
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between mt-8 pt-8 border-t border-gray-200">
                            <div class="flex gap-4">
                                <button type="button" id="nextBtn" class="px-6 py-3 rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition">
                                    Lanjut →
                                </button>
                                <button type="submit" id="submitBtn" class="hidden px-6 py-3 rounded-lg font-semibold text-white bg-green-600 hover:bg-green-700 transition">
                                    ✓ Konfirmasi Pesanan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Summary Column -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h3>

                        <!-- Vendor Info -->
                        <div class="mb-6 pb-6 border-b border-gray-200">
                            <div class="font-semibold text-gray-900">{{ $jasa->nama_usaha }}</div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
                            <div>
                                <div class="text-xs text-gray-500 uppercase">Kategori Layanan</div>
                                <div id="s_service" class="text-sm font-semibold text-gray-900">{{ $jasa->kategori->nama_kategori ?? 'Umum' }}</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500 uppercase">Estimasi Harga</div>
                                <div id="s_estimate" class="text-lg font-bold text-blue-600">Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500 uppercase">Lokasi Layanan</div>
                                <div id="s_address" class="text-sm text-gray-700">{{ $jasa->kota }}, {{ substr($jasa->alamat, 0, 50) }}...</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500 uppercase">Tanggal Diinginkan</div>
                                <div id="s_date" class="text-sm font-semibold text-gray-900">-</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500 uppercase">Jam Diinginkan</div>
                                <div id="s_time" class="text-sm font-semibold text-gray-900">-</div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="pt-4 border-t-2 border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-700">Total</span>
                                <span id="s_total" class="text-2xl font-bold text-blue-600">Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.125rem;
            background: #f3f4f6;
            color: #6b7280;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .step-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            text-align: center;
            max-width: 100px;
        }

        .step-item.active .step-circle {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .step-item.active .step-label {
            color: #2563eb;
            font-weight: 600;
        }

        .step-line {
            flex: 1;
            height: 2px;
            background: #e5e7eb;
            max-width: 50px;
        }

        .step-item.active ~ .step-line {
            background: #2563eb;
        }

        .step-panel {
            animation: fadeIn 0.3s ease-in;
        }

        .step-panel.hidden {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 640px) {
            .step-line {
                display: none;
            }
        }
    </style>

    <script>
        (function() {
            const form = document.getElementById('bookingForm');
            const steps = document.querySelectorAll('.step-item');
            const panels = document.querySelectorAll('.step-panel');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            
            let currentStep = 1;

            function updateUI() {
                // Update steps visual
                steps.forEach((step, idx) => {
                    step.classList.toggle('active', idx + 1 === currentStep);
                });

                // Update panels
                panels.forEach((panel, idx) => {
                    panel.classList.toggle('hidden', idx + 1 !== currentStep);
                });

                // Update buttons
                if (nextBtn) {
                    nextBtn.classList.toggle('hidden', currentStep === 4);
                }
                if (submitBtn) {
                    submitBtn.classList.toggle('hidden', currentStep !== 4);
                }
            }

            function validateStep(step) {
                const inputs = panels[step - 1].querySelectorAll('input[required], select[required], textarea[required]');
                for (let input of inputs) {
                    if (!input.value.trim()) {
                        alert('Harap isi semua field yang wajib diisi');
                        input.focus();
                        return false;
                    }
                }
                return true;
            }

            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (validateStep(currentStep) && currentStep < 4) {
                    currentStep++;
                    updateUI();
                    updateSummary();
                }
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                if (validateStep(currentStep)) {
                    form.submit();
                }
            });

            function updateSummary() {
                document.getElementById('s_service').textContent = document.getElementById('service_name').value || '{{ $jasa->kategori->nama_kategori ?? "Umum" }}';
                document.getElementById('s_date').textContent = document.getElementById('date').value || '-';
                document.getElementById('s_time').textContent = document.getElementById('time').value || '-';
                document.getElementById('s_address').textContent = document.getElementById('address').value || '{{ $jasa->kota }}, {{ substr($jasa->alamat, 0, 50) }}...';
            }

            // Real-time summary updates
            ['service_name', 'date', 'time', 'address'].forEach(id => {
                document.getElementById(id)?.addEventListener('change', updateSummary);
                document.getElementById(id)?.addEventListener('input', updateSummary);
            });

            updateUI();
        })();
    </script>
</body>
</html>
