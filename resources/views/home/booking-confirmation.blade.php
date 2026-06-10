<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: #edf2f7;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
            max-width: 560px;
            width: 100%;
            padding: 36px;
            border: 1px solid rgba(148, 163, 184, 0.15);
        }

        .success-icon {
            text-align: center;
            margin-bottom: 28px;
        }

        .checkmark {
            width: 70px;
            height: 70px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .checkmark svg {
            width: 34px;
            height: 34px;
            stroke: white;
            stroke-width: 2.5;
            fill: none;
        }

        h1 {
            font-size: 26px;
            color: #102a43;
            margin-bottom: 10px;
            text-align: center;
        }

        .subtitle {
            color: #475569;
            text-align: center;
            font-size: 15px;
            margin-bottom: 26px;
            line-height: 1.6;
        }

        .booking-details {
            background: #f8fafc;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 26px;
            border: 1px solid rgba(148, 163, 184, 0.22);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #6b7280;
            font-weight: 600;
            font-size: 14px;
        }

        .detail-value {
            color: #1f2937;
            font-weight: 600;
            text-align: right;
        }

        .price {
            color: #2563eb;
            font-size: 20px;
        }

        .booking-id {
            color: #2563eb;
        }

        .info-box {
            background: #eff6ff;
            border: 1px solid rgba(59, 130, 246, 0.22);
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 28px;
        }

        .info-box h3 {
            color: #1d4ed8;
            font-size: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-box p {
            color: #334155;
            font-size: 15px;
            line-height: 1.75;
        }

        .info-box svg {
            width: 20px;
            height: 20px;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 14px 22px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.18);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 26px rgba(37, 99, 235, 0.22);
        }

        .btn-secondary {
            background: #f8fafc;
            color: #334155;
            border: 1px solid rgba(148, 163, 184, 0.35);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .btn svg {
            width: 20px;
            height: 20px;
        }

        .footer-text {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }

        .footer-text a {
            color: #2563eb;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                padding: 24px;
            }

            h1 {
                font-size: 24px;
            }

            .button-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Success Icon -->
        <div class="success-icon">
            <div class="checkmark">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h1>Booking Berhasil Dibuat!</h1>
        <p class="subtitle">Permintaan booking Anda telah dikirim. Silakan konfirmasi pembayaran melalui WhatsApp kepada vendor.</p>

        <!-- Booking Details -->
        <div class="booking-details">
            <div class="detail-item">
                <span class="detail-label">Booking ID</span>
                <span class="detail-value booking-id">BKG-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Service</span>
                <span class="detail-value">{{ $booking->service_name }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Vendor</span>
                <span class="detail-value">{{ $booking->jasa->nama_usaha }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Schedule</span>
                <span class="detail-value">{{ $booking->date }} {{ $booking->time }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Location</span>
                <span class="detail-value">{{ $booking->city }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Payment Method</span>
                <span class="detail-value">{{ $booking->payment_method === 'cod' ? 'Bayar di Tempat' : 'Transfer Bank' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Total Price</span>
                <span class="detail-value price">Rp {{ number_format($booking->price, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <h3>
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18a8 8 0 110-16 8 8 0 010 16zm-1-11h2v5h-2V9zm0 6h2v2h-2v-2z"/>
                </svg>
                Langkah Selanjutnya
            </h3>
            <p>Tekan tombol WhatsApp untuk menghubungi vendor. Setelah pembayaran dikonfirmasi, vendor akan melanjutkan proses layanan Anda.</p>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <a href="{{ $waUrl }}" target="_blank" class="btn btn-primary">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004c-1.052 0-2.069.338-2.955.967l-.21.136-.218-.033c-.76-.121-1.546-.157-2.338-.057-.789.098-1.508.324-2.141.67l.151.092c.784.469 1.609.901 2.441 1.263l.157.074-.001.158c-.008.848.191 1.683.565 2.429l.087.160-.137.127c-.744.689-1.505 1.454-2.149 2.199l-.13.152.026.19c.161 1.186.659 2.291 1.425 3.17.765.878 1.77 1.527 2.891 1.875 1.121.348 2.341.342 3.454-.019l.164-.056.133.138c.68.706 1.453 1.31 2.294 1.795l.158.091.184-.048c.724-.186 1.408-.465 2.034-.832l-.118-.19c-.663-.98-.899-2.136-.675-3.237l.076-.243.169-.114c.743-.502 1.39-1.113 1.928-1.81.537-.696.96-1.475 1.252-2.306.292-.83.456-1.71.476-2.6l.002-.201-.135-.106c-1.028-.808-2.254-1.328-3.52-1.542-1.266-.213-2.577-.08-3.775.39zm0 0"/>
                </svg>
                Confirm via WhatsApp
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l8.5-8.5a2 2 0 012.828 0L21 12m-2 0v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Footer -->
        <div class="footer-text">
            Booking Anda sudah tercatat di <a href="{{ route('dashboard') }}">dashboard</a>. Vendor akan segera mengonfirmasi status pembayaran.
        </div>
    </div>
</body>
</html>
