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
            background: rgba(10, 20, 60, 0.96);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(14px);
            position: sticky;
            top: 0;
            z-index: 20;
            box-shadow: 0 16px 40px rgba(7, 18, 52, 0.22);
        }

        .topbar .wrap {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #fff;
            font-family: 'Manrope', sans-serif;
            font-size: 22px;
            font-weight: 800;
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: linear-gradient(135deg, #52c7ff, #4b59ff);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 12px 32px rgba(37, 111, 233, 0.24);
        }

        .menu {
            display: flex;
            gap: 22px;
            align-items: center;
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
        }

        .menu a {
            text-decoration: none;
            color: inherit;
            transition: color .2s ease;
        }

        .menu a:hover {
            color: #fff;
        }

        .menu .pill {
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            font-weight: 700;
            transition: transform .2s ease, background .2s ease;
        }

        .menu .pill:hover {
            transform: translateY(-1px);
            background: rgba(255, 255, 255, 0.22);
        }

        .hero {
            margin-top: 14px;
            height: 240px;
            border-radius: 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #2244a1 0, #1b336c 35%, #2d4da4 100%);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.16), transparent 35%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1), transparent 25%);
        }

        .hero-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .card {
            width: min(980px, 92%);
            margin: -56px auto 0;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(37, 111, 233, 0.12);
            border-radius: 24px;
            box-shadow: 0 28px 80px rgba(21, 65, 148, 0.12);
            position: relative;
            z-index: 4;
            padding: 26px;
        }

        .card-head {
            display: flex;
            justify-content: space-between;
            gap: 18px;
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
            background: rgba(39, 121, 255, 0.12);
            color: #1f3c8c;
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 190px;
        }

        .btn {
            border: 1px solid transparent;
            border-radius: 999px;
            padding: 14px 20px;
            text-align: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(37, 111, 233, 0.16);
        }

        .btn-solid {
            background: linear-gradient(135deg, #3f7cff, #1f4dd2);
            color: #fff;
            border-color: transparent;
        }

        .btn-outline {
            border-color: rgba(37, 111, 233, 0.2);
            color: #1f4dd2;
            background: rgba(255,255,255,0.88);
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
                <a href="{{ route('vendors.index') }}">Find Vendors</a>
                <a href="{{ route('home') }}#contact">Contact</a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ url('/admin') }}" class="pill">Dashboard</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="pill">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="pill">Login</a>
                @endauth
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
                @auth
                    <a href="{{ route('book.create', $jasa->id) }}" class="btn btn-solid">Book Now</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Login to Book</a>
                @endauth
                <button onclick="window.history.back()" class="btn btn-outline">← Kembali ke Featured Vendors</button>
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
    </div>
</body>
</html>