<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik n Clean | {{ $jasa->nama_usaha }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f2f6fd;
            --surface: #ffffff;
            --line: #dbe5f3;
            --ink: #17284d;
            --muted: #60718f;
            --brand: #2a62e6;
            --brand-strong: #154ccf;
            --chip: #edf3ff;
            --shadow: 0 16px 38px rgba(18, 41, 93, 0.11);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: radial-gradient(circle at 0 0, #e9f0ff 0, var(--bg) 40%);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .wrap {
            width: min(1160px, 92%);
            margin: 0 auto;
        }

        .topbar {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(6px);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .topbar .wrap {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: inherit;
            font-family: 'Manrope', sans-serif;
            font-size: 22px;
            font-weight: 800;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: linear-gradient(135deg, #2f6af7, #1145cb);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 14px;
            font-weight: 800;
        }

        .menu {
            display: flex;
            gap: 24px;
            align-items: center;
            color: var(--muted);
            font-size: 14px;
        }

        .menu a {
            text-decoration: none;
            color: inherit;
        }

        .menu .pill {
            background: var(--brand);
            color: #fff;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 700;
        }

        .hero {
            margin-top: 14px;
            height: 210px;
            border-radius: 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #3d4d67 0, #1e2d4a 54%, #415987 100%);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.42), rgba(0, 0, 0, 0.12));
        }

        .hero-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .card {
            width: min(980px, 92%);
            margin: -46px auto 0;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 4;
            padding: 18px;
        }

        .card-head {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }

        .name {
            margin: 0;
            font-size: clamp(24px, 3vw, 34px);
            font-family: 'Manrope', sans-serif;
            line-height: 1.15;
        }

        .status {
            margin-top: 8px;
            color: var(--muted);
            font-size: 14px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .badge {
            background: #f4b400;
            color: #fff;
            border-radius: 999px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-width: 180px;
        }

        .btn {
            border: 1px solid transparent;
            border-radius: 12px;
            padding: 11px 15px;
            text-align: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
        }

        .btn-solid {
            background: var(--brand);
            color: #fff;
        }

        .btn-outline {
            border-color: var(--brand);
            color: var(--brand);
            background: #fff;
        }

        .desc {
            margin-top: 14px;
            color: #4f6182;
            line-height: 1.6;
            border-top: 1px solid var(--line);
            padding-top: 14px;
        }

        .metrics {
            margin-top: 14px;
            border-top: 1px solid var(--line);
            padding-top: 14px;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .metric {
            text-align: center;
        }

        .metric small {
            display: block;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .metric strong {
            font-family: 'Manrope', sans-serif;
            font-size: 19px;
        }

        .detail {
            width: min(980px, 92%);
            margin: 22px auto 44px;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            overflow: hidden;
        }

        .tabs {
            border-bottom: 1px solid var(--line);
            padding: 0 16px;
            display: flex;
            gap: 20px;
        }

        .tab {
            padding: 14px 0;
            border-bottom: 2px solid var(--brand);
            color: var(--brand);
            font-weight: 700;
            font-size: 14px;
        }

        .content {
            padding: 18px 16px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .box h3 {
            margin: 0 0 12px;
            font-size: 24px;
            font-family: 'Manrope', sans-serif;
        }

        .item {
            margin-bottom: 10px;
            color: #3e5279;
            line-height: 1.6;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .chip {
            background: var(--chip);
            color: #3b548c;
            border-radius: 999px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .back {
            width: min(980px, 92%);
            margin: 18px auto 0;
        }

        .back a {
            color: var(--brand-strong);
            text-decoration: none;
            font-weight: 700;
        }

        @media (max-width: 860px) {
            .metrics {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content {
                grid-template-columns: 1fr;
            }

            .actions {
                width: 100%;
                flex-direction: row;
            }
        }

        @media (max-width: 620px) {
            .menu {
                display: none;
            }

            .actions {
                flex-direction: column;
            }

            .metrics {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">K</span>
                <span>Klik n Clean</span>
            </a>

            <nav class="menu">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#services">Services</a>
                <a href="{{ route('home') }}#vendors">Find Vendors</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <a href="{{ url('/admin') }}" class="pill">Dashboard</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        @if (!empty($jasa->foto))
            <img src="{{ asset($jasa->foto) }}" alt="{{ $jasa->nama_usaha }}" class="hero-photo">
        @endif
    </section>

    <section class="card">
        <div class="card-head">
            <div>
                <h1 class="name">{{ $jasa->nama_usaha }}</h1>
                <div class="status">
                    <span><b>{{ number_format($jasa->rating ?? 0, 1) }}</b> / 5</span>
                    <span>Rp {{ number_format($jasa->estimasi_harga ?? 0, 0, ',', '.') }}</span>
                    <span>{{ $jasa->kota ?? '-' }}</span>
                    <span class="badge">{{ ucfirst($jasa->status_verif ?? 'pending') }}</span>
                </div>
            </div>
            <div class="actions">
                <a href="{{ route('book.create', $jasa->id) }}" class="btn btn-solid">Book Now</a>
            </div>
        </div>

        <p class="desc">{{ $jasa->deskripsi }}</p>

        <div class="metrics">
            <div class="metric">
                <small>Response Time</small>
                <strong>Within 1 hour</strong>
            </div>
            <div class="metric">
                <small>Completion Rate</small>
                <strong>98%</strong>
            </div>
            <div class="metric">
                <small>Total Jobs</small>
                <strong>2450+</strong>
            </div>
            <div class="metric">
                <small>Experience</small>
                <strong>10 years</strong>
            </div>
        </div>
    </section>

    <section class="detail">
        <div class="tabs">
            <span class="tab">Overview</span>
        </div>

        <div class="content">
            <div class="box">
                <h3>Contact Information</h3>
                <div class="item"><b>Kontak:</b> {{ $jasa->kontak ?? '-' }}</div>
                <div class="item"><b>Lokasi:</b> {{ $jasa->alamat ?? '-' }}</div>
                <div class="item"><b>Kategori:</b> {{ $jasa->kategori->nama_kategori ?? 'Umum' }}</div>
            </div>

            <div class="box">
                <h3>Service Areas</h3>
                <div class="chips">
                    <span class="chip">{{ $jasa->kota ?? 'Indonesia' }}</span>
                    <span class="chip">Area Sekitar</span>
                    <span class="chip">By Request</span>
                </div>
            </div>
        </div>
    </section>

    <div class="back">
        <a href="{{ route('home') }}#vendors">← Kembali ke Featured Vendors</a>
    </div>
</body>
</html>