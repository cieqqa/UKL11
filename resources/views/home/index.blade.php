<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik n Clean | Beranda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f4f7fb;
            --surface: #ffffff;
            --line: #dce4f1;
            --primary: #1f53d7;
            --primary-strong: #0f3fc2;
            --ink: #13203d;
            --muted: #677894;
            --shadow: 0 16px 40px rgba(17, 44, 101, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: radial-gradient(circle at 100% 0, #eaf0ff 0, var(--bg) 45%);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .wrap {
            width: min(1160px, 92%);
            margin: 0 auto;
        }

        .topbar {
            background: rgba(8, 20, 58, 0.92);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(14px);
            position: sticky;
            top: 0;
            z-index: 20;
            box-shadow: 0 12px 40px rgba(2, 18, 65, 0.12);
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
            font-family: 'Manrope', sans-serif;
            font-weight: 800;
            font-size: 21px;
            color: #fff;
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
            box-shadow: 0 12px 30px rgba(31, 83, 215, 0.28);
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 22px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.78);
        }

        .menu a {
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

        .user-dropdown {
            position: relative;
        }

        .dropdown-trigger {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s ease, background .2s ease;
            font-size: 14px;
        }

        .dropdown-trigger:hover {
            transform: translateY(-1px);
            background: rgba(255, 255, 255, 0.22);
        }

        .dropdown-trigger svg {
            width: 16px;
            height: 16px;
            transition: transform .2s ease;
        }

        .dropdown-trigger[aria-expanded="true"] svg {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: rgba(8, 20, 58, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 12px;
            backdrop-filter: blur(14px);
            min-width: 180px;
            padding: 8px 0;
            box-shadow: 0 20px 40px rgba(2, 18, 65, 0.3);
            z-index: 30;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            display: block;
            width: 100%;
            padding: 12px 18px;
            text-align: left;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
            cursor: pointer;
            transition: color .2s ease, background .2s ease;
            font-family: inherit;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .dropdown-menu button[type="submit"] {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: #ff6b6b;
        }

        .dropdown-menu button[type="submit"]:hover {
            background: rgba(255, 107, 107, 0.1);
            color: #ff8787;
        }

        .hero {
            margin-top: 0;
            border-radius: 0;
            background: linear-gradient(130deg, #2062f2 0%, #1c4ed8 70%);
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -220px;
            right: -120px;
        }

        .hero-inner {
            text-align: center;
            padding: 88px 20px;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(30px, 5vw, 58px);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .hero p {
            margin: 20px auto 0;
            max-width: 760px;
            font-size: 20px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.88);
        }

        .hero-actions {
            margin-top: 34px;
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 12px;
            border: 1px solid transparent;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: .2s ease;
        }

        .btn-solid {
            background: #fff;
            color: var(--primary);
        }

        .btn-solid:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.16);
        }

        .btn-ghost {
            border-color: rgba(255, 255, 255, 0.5);
            color: #fff;
        }

        .btn-ghost:hover {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.08);
        }

        .section {
            padding: 76px 0;
        }

        .section-head {
            text-align: center;
            margin-bottom: 28px;
        }

        .section-head h2 {
            margin: 0;
            font-size: clamp(26px, 3vw, 44px);
            line-height: 1.1;
            font-family: 'Manrope', sans-serif;
            letter-spacing: -0.02em;
        }

        .section-head p {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 16px;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 14px;
        }

        .service-item {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(31, 83, 215, 0.1);
            border-radius: 24px;
            text-align: center;
            padding: 24px 18px;
            box-shadow: 0 24px 60px rgba(31, 83, 215, 0.08);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .service-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 80px rgba(31, 83, 215, 0.14);
        }

        .service-mark {
            width: 46px;
            height: 46px;
            margin: 0 auto 14px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 13px;
            font-weight: 800;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .service-item span {
            display: block;
            font-size: 14px;
            color: #142b5b;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .vendors-wrap {
            background: #eef3fb;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .vendor-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .vendor-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(31, 83, 215, 0.1);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 50px rgba(22, 65, 142, 0.08);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .vendor-link {
            display: block;
            color: inherit;
        }

        .vendor-link:hover .vendor-card {
            transform: translateY(-10px);
            box-shadow: 0 36px 70px rgba(22, 65, 142, 0.16);
        }

        .vendor-photo {
            height: 170px;
            background: linear-gradient(135deg, rgba(13, 48, 122, 0.95), rgba(56, 100, 226, 0.95));
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            padding: 16px;
        }

        .vendor-photo .vendor-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        .vendor-photo .vendor-tag,
        .vendor-photo::before {
            z-index: 2;
        }

        .vendor-photo::before {
            content: "";
            position: absolute;
            inset: 20px 20px 20px 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .vendor-tag {
            background: #f4b400;
            color: #fff;
            border-radius: 999px;
            padding: 5px 11px;
            font-size: 11px;
            font-weight: 700;
        }

        .vendor-body {
            padding: 14px;
        }

        .vendor-title {
            margin: 0;
            font-size: 18px;
            font-family: 'Manrope', sans-serif;
        }

        .vendor-meta {
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
            gap: 8px;
            font-size: 14px;
            color: #475a7f;
        }

        .vendor-chips {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .chip {
            background: rgba(14, 43, 100, 0.08);
            color: #163a7a;
            border-radius: 999px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid rgba(14, 43, 100, 0.12);
        }

        .align-center {
            text-align: center;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
            margin-top: 28px;
        }

        .step-item {
            text-align: center;
        }

        .step-mark {
            width: 64px;
            height: 64px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2f67ef, #0f43c8);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 18px;
            box-shadow: 0 8px 22px rgba(30, 70, 189, 0.35);
        }

        .step-item h3 {
            margin: 0;
            font-size: 20px;
            font-family: 'Manrope', sans-serif;
        }

        .step-item p {
            margin: 8px 0 0;
            color: var(--muted);
            line-height: 1.5;
        }

        .why {
            background: #e8eff9;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 26px;
        }

        .why-item {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 22px;
            text-align: center;
        }

        .why-item b {
            display: block;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .why-item span {
            color: var(--muted);
            line-height: 1.45;
            font-size: 14px;
        }

        .cta {
            background: linear-gradient(130deg, #1e53d8, #1947be);
            color: #fff;
            text-align: center;
            padding: 68px 20px;
        }

        .cta h2 {
            margin: 0;
            font-size: clamp(30px, 4vw, 50px);
            font-family: 'Manrope', sans-serif;
        }

        .cta p {
            margin: 14px auto 0;
            max-width: 760px;
            color: rgba(255, 255, 255, 0.88);
            font-size: 18px;
        }

        .footer {
            background: linear-gradient(180deg, #0f172a 0%, #111827 100%);
            color: #e2e8f0;
            border-top: 1px solid rgba(148, 163, 184, 0.18);
            padding: 64px 0 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 28px;
            align-items: start;
        }

        .footer h4 {
            margin: 0 0 18px;
            font-size: 18px;
            font-family: 'Manrope', sans-serif;
            color: #ffffff;
        }

        .footer p,
        .footer a {
            display: block;
            margin: 0 0 10px;
            color: rgba(226, 232, 240, 0.82);
            line-height: 1.8;
            font-size: 15px;
            text-decoration: none;
        }

        .footer a:hover {
            color: #38bdf8;
        }

        .footer .footer-bottom {
            margin-top: 36px;
            padding-top: 24px;
            border-top: 1px solid rgba(148, 163, 184, 0.14);
            text-align: center;
            font-size: 14px;
            color: rgba(226, 232, 240, 0.68);
        }
        .footer .footer-bottom span {
            display: block;
            margin-top: 8px;
        }

        @media (max-width: 1080px) {
            .service-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .vendor-grid,
            .steps,
            .why-grid,
            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 680px) {
            .menu {
                display: none;
            }

            .hero-inner {
                padding: 68px 14px;
            }

            .hero p {
                font-size: 16px;
            }

            .service-grid,
            .vendor-grid,
            .steps,
            .why-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
@php
    $palette = ['#3b82f6', '#9333ea', '#06b6d4', '#14b8a6', '#f97316', '#ec4899', '#6366f1', '#ef4444', '#22c55e', '#eab308', '#64748b', '#60a5fa'];
    $services = [];

    if (isset($kategori) && $kategori->count() > 0) {
        foreach ($kategori as $index => $kat) {
            $parts = preg_split('/\s+/', trim($kat->nama_kategori));
            $code = '';
            foreach ($parts as $part) {
                if ($part !== '') {
                    $code .= strtoupper(substr($part, 0, 1));
                    if (strlen($code) >= 2) {
                        break;
                    }
                }
            }

            if ($code === '') {
                $code = strtoupper(substr($kat->nama_kategori, 0, 2));
            }

            $services[] = [
                'name' => $kat->nama_kategori,
                'color' => $palette[$index % count($palette)],
                'code' => $code,
            ];
        }
    }

    if (isset($jasa) && $jasa->count() > 0) {
        $featured = $jasa->take(4);
    } else {
        $featured = [
            (object)[
                'nama_usaha' => 'PT Bersih Sejahtera',
                'rating' => 4.8,
                'estimasi_harga' => 150000,
                'kota' => 'Jakarta',
                'status_verif' => 'verified',
                'deskripsi' => 'Layanan pembersihan profesional terbaik',
                'kategori' => (object)['nama_kategori' => 'Pembersihan Umum']
            ],
            (object)[
                'nama_usaha' => 'CV Rumah Cemerlang',
                'rating' => 4.9,
                'estimasi_harga' => 200000,
                'kota' => 'Bandung',
                'status_verif' => 'verified',
                'deskripsi' => 'Pembersihan menyeluruh dengan teknologi terkini',
                'kategori' => (object)['nama_kategori' => 'Pembersihan Mendalam']
            ],
            (object)[
                'nama_usaha' => 'Budi Cooling Service',
                'rating' => 4.7,
                'estimasi_harga' => 250000,
                'kota' => 'Surabaya',
                'status_verif' => 'verified',
                'deskripsi' => 'Servis AC termurah dan terpercaya',
                'kategori' => (object)['nama_kategori' => 'Layanan AC']
            ],
            (object)[
                'nama_usaha' => 'Toko Sofa Siap',
                'rating' => 4.6,
                'estimasi_harga' => 300000,
                'kota' => 'Medan',
                'status_verif' => 'verified',
                'deskripsi' => 'Pembersihan sofa dan karpet berkualitas',
                'kategori' => (object)['nama_kategori' => 'Sofa dan Karpet']
            ]
        ];
    }
@endphp

    <header class="topbar">
        <div class="wrap">
            <a href="{{ url('/') }}" class="brand">
                <span class="brand-mark">K</span>
                <span>Klik n Clean</span>
            </a>

            <nav class="menu">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('vendors.index') }}">Temukan Vendor</a>
                @auth
                    <div class="user-dropdown" x-data="{ open: false }" @click.away="open = false">
                        <button 
                            class="dropdown-trigger" 
                            @click="open = !open" 
                            :aria-expanded="open"
                        >
                            {{ auth()->user()->name }}
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                            </svg>
                        </button>

                        <div class="dropdown-menu" x-show="open" x-transition>
                            @if(auth()->user()->role === 'admin')
                                <a href="/admin">Panel Admin</a>
                            @else
                                <a href="{{ url('/redirect') }}">Dashboard Saya</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}" style="display: contents;">
                                @csrf
                                <button type="submit">Keluar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="pill">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="wrap hero-inner">
            <h1>Marketplace Terpercaya untuk<br>Layanan Kebersihan dan Pemeliharaan</h1>
            <p>Temukan penyedia layanan profesional dan terverifikasi di daerah Anda. Bandingkan, chat, dan pesan dengan percaya diri.</p>
            <div class="hero-actions">
                <a href="{{ route('vendors.index') }}" class="btn btn-ghost">Cari Vendor</a>
            </div>
        </div>
    </section>

   <!-- Card 1 -->

    <section class="section vendors-wrap" id="vendors">
        <div class="wrap">
            <div class="section-head">
                <h2>Vendor Unggulan</h2>
                <p>Penyedia layanan terbaik yang dipercaya pelanggan.</p>
            </div>

            <div class="vendor-grid">
                @forelse ($featured as $v)
                    @if (!empty($v->id))
                        <article class="vendor-card">
                            <div class="vendor-photo">
                                @if(!empty($v->foto))
                                    <img src="{{ asset($v->foto) }}" alt="{{ $v->nama_usaha }}" class="vendor-image">
                                @else
                                    <span class="vendor-tag">Terbaik</span>
                                @endif
                            </div>
                            <div class="vendor-body">
                                <h3 class="vendor-title">{{ $v->nama_usaha }}</h3>
                                <div class="vendor-meta">
                                    <span>Rp {{ number_format($v->estimasi_harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="vendor-meta">
                                    <span>{{ $v->kota }}</span>
                                </div>
                                <div class="vendor-chips">
                                    <span class="chip">{{ $v->kategori->nama_kategori ?? 'Umum' }}</span>
                                    <span class="chip">{{ \Illuminate\Support\Str::limit($v->deskripsi, 18) }}</span>
                                </div>
                                <div class="vendor-footer" style="margin-top: 18px;">
                                    <a href="{{ route('vendors.show', $v->id) }}" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </article>
                    @else
                        <article class="vendor-card">
                            <div class="vendor-photo">
                                @if(!empty($v->foto))
                                    <img src="{{ asset($v->foto) }}" alt="{{ $v->nama_usaha }}" class="vendor-image">
                                @else
                                    <span class="vendor-tag">Terbaik</span>
                                @endif
                            </div>
                            <div class="vendor-body">
                                <h3 class="vendor-title">{{ $v->nama_usaha }}</h3>
                                <div class="vendor-meta">
                                    <span>Rp {{ number_format($v->estimasi_harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="vendor-meta">
                                    <span>{{ $v->kota }}</span>
                                </div>
                                <div class="vendor-chips">
                                    <span class="chip">{{ $v->kategori->nama_kategori ?? 'Umum' }}</span>
                                    <span class="chip">{{ \Illuminate\Support\Str::limit($v->deskripsi, 18) }}</span>
                                </div>
                            </div>
                        </article>
                    @endif
                @empty
                    <article class="vendor-card">
                        <div class="vendor-photo"><span class="vendor-tag">Terbaik</span></div>
                        <div class="vendor-body">
                            <h3 class="vendor-title">Belum Ada Vendor</h3>
                            <div class="vendor-meta"><span>Rating 0.0</span><span>Rp 0</span></div>
                            <div class="vendor-meta"><span>Kota</span><span>Pending</span></div>
                            <div class="vendor-chips"><span class="chip">Silakan tambah jasa</span></div>
                        </div>
                    </article>
                @endforelse
            </div>

            <div class="align-center" style="margin-top: 26px;">
                <a href="{{ route('vendors.index') }}" class="btn" style="background:#2862e0;color:#fff;border-color:#2862e0;">Lihat Semua Vendor</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <div class="section-head">
                <h2>Cara Kerja</h2>
                <p>Dapatkan layanan profesional dalam 4 langkah mudah</p>
            </div>

            <div class="steps">
                <article class="step-item">
                    <div class="step-mark">1</div>
                    <h3>Pilih Layanan</h3>
                    <p>Telusuri kategori dan pilih layanan yang Anda butuhkan.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">2</div>
                    <h3>Pilih Vendor</h3>
                    <p>Bandingkan vendor terverifikasi dan pilih yang paling sesuai.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">3</div>
                    <h3>Pesan dan Bayar</h3>
                    <p>Jadwalkan layanan dan selesaikan pembayaran dengan aman.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">4</div>
                    <h3>Dapatkan Layanan</h3>
                    <p>Vendor datang tepat waktu dan menyelesaikan pekerjaan secara profesional.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section why">
        <div class="wrap">
            <div class="section-head">
                <h2>Mengapa Memilih Klik n Clean</h2>
                <p>Platform terpercaya untuk penyedia layanan berkualitas.</p>
            </div>

            <div class="why-grid">
                <article class="why-item">
                    <b>Vendor Terverifikasi</b>
                    <span>Semua penyedia telah dicek latar belakang dan terverifikasi.</span>
                </article>
                <article class="why-item">
                    <b>Rating Terbaik</b>
                    <span>Hanya vendor dengan rating tinggi dan track record terpercaya.</span>
                </article>
                <article class="why-item">
                    <b>Pemesanan Cepat</b>
                    <span>Pesan layanan dalam hitungan menit dengan konfirmasi instan.</span>
                </article>
                <article class="why-item">
                    <b>Chat Langsung</b>
                    <span>Berkomunikasi langsung dengan vendor sebelum memesan.</span>
                </article>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="wrap">
            <h2>Siap Memulai?</h2>
            <p>Bergabunglah dengan pelanggan puas yang mempercayai Klik n Clean untuk kebutuhan kebersihan dan pemeliharaan.</p>
            <div class="hero-actions" style="margin-top:24px;">
                <a href="{{ route('vendors.index') }}" class="btn btn-solid">Telusuri Vendor</a>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="wrap footer-grid">
            <div>
                <h4>Klik n Clean</h4>
                <p>Marketplace terpercaya yang menghubungkan Anda dengan penyedia layanan kebersihan dan pemeliharaan profesional.</p>
            </div>

            <div>
                <h4>Tautan Cepat</h4>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('vendors.index') }}">Temukan Vendor</a>
                <a href="{{ route('vendors.index') }}">Pesan Sekarang</a>
            </div>

            <div>
                <h4>Layanan Populer</h4>
                <a href="{{ route('vendors.index', ['search' => 'General Cleaning']) }}">Pembersihan Umum</a>
                <a href="{{ route('vendors.index', ['search' => 'Deep Cleaning']) }}">Pembersihan Mendalam</a>
                <a href="{{ route('vendors.index', ['search' => 'AC Service']) }}">Layanan AC</a>
                <a href="{{ route('vendors.index', ['search' => 'Pest Control']) }}">Pengendalian Hama</a>
            </div>

            <div>
                <h4>Hubungi Kami</h4>
                <p>+62 812 3456 7890</p>
                <p>support@kliknclean.com</p>
                <p>Jl. Bersih Sejahtera No. 123, Indonesia</p>
            </div>
        </div>
        <div class="wrap footer-bottom">
            <span>© 2026 Klik n Clean. Semua hak dilindungi undang-undang.</span>
        </div>
    </footer>
</body>
</html>