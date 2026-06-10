<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HERO HEADER */
        .hero {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 60px 20px;
            margin-bottom: 40px;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero p {
            font-size: 16px;
            opacity: 0.9;
        }

        /* STATS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-card-info h3 {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .stat-card-info h2 {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
        }

        .stat-icon {
            font-size: 32px;
        }

        .stat-icon svg {
            color: currentColor;
        }

        /* TABS */
        .tabs-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 0;
        }

        .tabs {
            display: flex;
            border-bottom: 2px solid #e5e7eb;
            padding: 0;
        }

        .tab {
            flex: 1;
            padding: 20px;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            color: #6b7280;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }

        .tab:hover {
            color: #2563eb;
        }

        .tab.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .tab-content {
            padding: 30px;
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* BOOKING ITEM */
        .booking-item {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .booking-info {
            flex: 1;
        }

        .booking-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .booking-id {
            font-weight: 700;
            color: #1f2937;
            font-size: 16px;
        }

        .booking-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }

        .status-confirmed {
            background: #10b981;
        }

        .status-pending {
            background: #f59e0b;
        }

        .status-completed {
            background: #3b82f6;
        }

        .status-cancelled {
            background: #ef4444;
        }

        .booking-service {
            font-size: 15px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .booking-vendor {
            font-size: 14px;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .booking-details {
            font-size: 14px;
            color: #9ca3af;
            display: flex;
            gap: 20px;
            margin-bottom: 12px;
        }

        .booking-details span {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* PROGRESS BAR */
        .progress-container {
            margin-top: 12px;
        }

        .progress-label {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 6px;
            display: flex;
            justify-content: space-between;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #3b82f6;
            border-radius: 3px;
            transition: width 0.3s;
        }

        /* BOOKING ACTIONS */
        .booking-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .booking-expand-toggle {
            margin-top: 14px;
            width: 100%;
            justify-content: center;
            background: #eef2ff;
            color: #1d4ed8;
        }

        .booking-expand-toggle:hover {
            background: #e0e7ff;
        }

        .booking-expand {
            display: none;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px dashed #d1d5db;
        }

        .booking-expand.active {
            display: block;
        }

        .booking-expand-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px 20px;
        }

        .booking-expand-item {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 14px;
        }

        .booking-expand-label {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 700;
        }

        .booking-expand-value {
            font-size: 14px;
            color: #111827;
            font-weight: 600;
            line-height: 1.5;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn svg {
            flex-shrink: 0;
        }

        .btn-chat {
            background: #2563eb;
            color: white;
        }

        .btn-chat:hover {
            background: #1d4ed8;
        }

        .btn-vendor {
            background: white;
            color: #2563eb;
            border: 1px solid #2563eb;
        }

        .btn-vendor:hover {
            background: #f0f9ff;
        }

        .price {
            font-size: 18px;
            font-weight: 700;
            color: #2563eb;
            text-align: right;
            margin-top: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 16px;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 40px 16px;
            }

            .hero-content {
                flex-direction: column;
                align-items: stretch;
                gap: 20px;
            }

            .booking-item {
                flex-direction: column;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 28px;
            }

            .tabs {
                overflow-x: auto;
            }

            .booking-expand-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>
<body>
    @php
        $normalizeWhatsAppNumber = function (?string $number): ?string {
            $digits = preg_replace('/[^0-9]/', '', (string) $number);

            if ($digits === '') {
                return null;
            }

            if (str_starts_with($digits, '0')) {
                $digits = '62'.substr($digits, 1);
            } elseif (str_starts_with($digits, '8')) {
                $digits = '62'.$digits;
            }

            return $digits;
        };

        $buildWhatsAppUrl = function ($booking) use ($normalizeWhatsAppNumber) {
            $phone = $normalizeWhatsAppNumber(optional($booking->jasa)->kontak);

            if (!$phone) {
                return null;
            }

            $bookingCode = 'BKG-'.str_pad($booking->id, 4, '0', STR_PAD_LEFT);
            $vendorName = optional($booking->jasa)->nama_usaha ?? '-';

            $message = "Halo {$vendorName}, saya ingin menghubungi terkait booking {$bookingCode}. "
                . "Nama: {$booking->full_name}. Jasa: {$booking->service_name}. "
                . "Tanggal: {$booking->date} {$booking->time}.";

            return 'https://wa.me/'.$phone.'?text='.rawurlencode($message);
        };

        $activeBookings = Auth::user()->bookings()
            ->with('jasa')
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('created_at', 'desc')
            ->get();

        $historyBookings = Auth::user()->bookings()
            ->with('jasa')
            ->whereIn('status', ['completed', 'cancelled'])
            ->orderBy('created_at', 'desc')
            ->get();
    @endphp

    <!-- HERO -->
    <div class="hero">
        <div class="hero-content" style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h1>My Dashboard</h1>
                <p>Track your bookings and manage your profile</p>
            </div>
            <a href="/" style="background: white; color: #2563eb; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Back to Home
            </a>
        </div>
    </div>

    <div class="container">
        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-info">
                    <h3>Active Bookings</h3>
                    <h2>{{ Auth::user()->bookings()->whereIn('status', ['pending', 'confirmed'])->count() }}</h2>
                </div>
                <div class="stat-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-info">
                    <h3>Completed</h3>
                    <h2>{{ Auth::user()->bookings()->where('status', 'completed')->count() }}</h2>
                </div>
                <div class="stat-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-info">
                    <h3>Total Spent</h3>
                    <h2>Rp {{ number_format(Auth::user()->bookings()->sum('price'), 0, ',', '.') }}</h2>
                </div>
                <div class="stat-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v12M9 9h6a3 3 0 0 1 0 6h-6"/>
                    </svg>
                </div>
            </div>

        </div>

        <!-- TABS -->
        <div class="tabs-container">
            <div class="tabs">
                <button class="tab active" onclick="showTab('active', this)">Active Bookings</button>
                <button class="tab" onclick="showTab('history', this)">Booking History</button>
            </div>

            <!-- ACTIVE BOOKINGS TAB -->
            <div id="active" class="tab-content active">
                @if($activeBookings->count() > 0)
                    @foreach($activeBookings as $booking)
                        @php $waUrl = $buildWhatsAppUrl($booking); @endphp
                        <div class="booking-item">
                            <div class="booking-info">
                                <div class="booking-header">
                                    <span class="booking-id">BKG-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    <span class="booking-status status-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span>
                                </div>
                                <div class="booking-service">{{ $booking->service_name }}</div>
                                <div class="booking-vendor">{{ $booking->jasa->nama_usaha ?? '-' }}</div>
                                <div class="booking-details">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                        </svg>
                                        {{ $booking->date }}
                                    </span>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/>
                                            <polyline points="12 6 12 12 16 14"/>
                                        </svg>
                                        {{ $booking->time }}
                                    </span>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                        {{ $booking->city }}
                                    </span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-label">
                                        <span>Booking Progress</span>
                                        <span>{{ $booking->status === 'confirmed' ? '60%' : '40%' }}</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ $booking->status === 'confirmed' ? '60%' : '40%' }}"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="booking-actions">
                                    @if($waUrl)
                                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-chat">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                            </svg>
                                            Chat with Vendor
                                        </a>
                                    @else
                                        <span class="btn btn-chat" aria-disabled="true" style="opacity: .65; cursor: not-allowed;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                            </svg>
                                            Chat with Vendor
                                        </span>
                                    @endif
                                    <a href="{{ route('vendors.show', $booking->jasa_id) }}" class="btn btn-vendor">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                            <polyline points="15 3 21 3 21 9"/>
                                            <line x1="10" y1="14" x2="21" y2="3"/>
                                        </svg>
                                        View Vendor
                                    </a>
                                </div>
                                <div class="price">Rp {{ number_format($booking->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin: 0 auto;">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <polyline points="9 22 9 12 15 12 15 22"/>
                            </svg>
                        </div>
                        <p>No active bookings yet. <a href="/vendors" style="color: #2563eb; text-decoration: none;">Browse services</a></p>
                    </div>
                @endif
            </div>

            <!-- BOOKING HISTORY TAB -->
            <div id="history" class="tab-content">
                @if($historyBookings->count() > 0)
                    @foreach($historyBookings as $booking)
                        @php
                            $waUrl = $buildWhatsAppUrl($booking);
                            $detailId = 'booking-detail-'.$booking->id;
                        @endphp
                        <div class="booking-item">
                            <div class="booking-info">
                                <div class="booking-header">
                                    <span class="booking-id">BKG-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    @if($booking->status === 'completed')
                                        <span class="booking-status status-completed">Completed</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="booking-status status-cancelled">Cancelled</span>
                                    @else
                                        <span class="booking-status status-completed">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </div>
                                <div class="booking-service">{{ $booking->service_name }}</div>
                                <div class="booking-vendor">{{ $booking->jasa->nama_usaha ?? '-' }}</div>
                                <div class="booking-details">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                        </svg>
                                        {{ $booking->date }}
                                    </span>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/>
                                            <polyline points="12 6 12 12 16 14"/>
                                        </svg>
                                        {{ $booking->time }}
                                    </span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-label">
                                        <span>Booking Progress</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div id="{{ $detailId }}" class="booking-expand">
                                    <div class="booking-expand-grid">
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Nama Pemesan</span>
                                            <div class="booking-expand-value">{{ $booking->full_name }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Email</span>
                                            <div class="booking-expand-value">{{ $booking->email }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">No. HP</span>
                                            <div class="booking-expand-value">{{ $booking->phone }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Kota</span>
                                            <div class="booking-expand-value">{{ $booking->city }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Alamat</span>
                                            <div class="booking-expand-value">{{ $booking->address }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Metode Pembayaran</span>
                                            <div class="booking-expand-value">{{ $booking->payment_method === 'cod' ? 'Bayar di Tempat' : 'Transfer Bank' }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Catatan</span>
                                            <div class="booking-expand-value">{{ $booking->notes ?: '-' }}</div>
                                        </div>
                                        <div class="booking-expand-item">
                                            <span class="booking-expand-label">Harga</span>
                                            <div class="booking-expand-value">Rp {{ number_format($booking->price, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="booking-actions">
                                    @if($waUrl)
                                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-chat">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                            </svg>
                                            Chat with Vendor
                                        </a>
                                    @endif
                                    <a href="{{ route('vendors.show', $booking->jasa_id) }}" class="btn btn-vendor">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                            <polyline points="15 3 21 3 21 9"/>
                                            <line x1="10" y1="14" x2="21" y2="3"/>
                                        </svg>
                                        View Vendor
                                    </a>
                                    <button type="button" class="btn booking-expand-toggle" onclick="toggleBookingDetails('{{ $detailId }}', this)">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="6 9 12 15 18 9"/>
                                        </svg>
                                        Lihat Detail Pesanan
                                    </button>
                                </div>
                                <div class="price">Rp {{ number_format($booking->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin: 0 auto;">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </div>
                        <p>No booking history yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <script>
        function showTab(tabName, button) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.remove('active'));

            const buttons = document.querySelectorAll('.tab');
            buttons.forEach(btn => btn.classList.remove('active'));

            const targetTab = document.getElementById(tabName);
            if (targetTab) {
                targetTab.classList.add('active');
            }
            if (button) {
                button.classList.add('active');
            }
        }

        function toggleBookingDetails(detailId, button) {
            const detail = document.getElementById(detailId);

            if (!detail) {
                return;
            }

            const isVisible = detail.classList.toggle('active');

            if (button) {
                button.innerHTML = isVisible
                    ? '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"/></svg>Lihat Lebih Sedikit'
                    : '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>Lihat Detail Pesanan';
            }
        }

    </script>

 </body>
</html>
</body>
</html>