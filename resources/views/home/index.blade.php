<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik n Clean | Home</title>
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

        .hero {
            margin-top: 16px;
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
            background: #fff;
            border-top: 1px solid var(--line);
            padding: 56px 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr 1fr;
            gap: 18px;
        }

        .footer h4 {
            margin: 0 0 14px;
            font-size: 17px;
            font-family: 'Manrope', sans-serif;
        }

        .footer p,
        .footer a {
            display: block;
            margin: 0 0 9px;
            color: var(--muted);
            line-height: 1.5;
            font-size: 14px;
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
                'kategori' => (object)['nama_kategori' => 'General Cleaning']
            ],
            (object)[
                'nama_usaha' => 'CV Rumah Cemerlang',
                'rating' => 4.9,
                'estimasi_harga' => 200000,
                'kota' => 'Bandung',
                'status_verif' => 'verified',
                'deskripsi' => 'Deep cleaning dengan teknologi terkini',
                'kategori' => (object)['nama_kategori' => 'Deep Cleaning']
            ],
            (object)[
                'nama_usaha' => 'Budi Cooling Service',
                'rating' => 4.7,
                'estimasi_harga' => 250000,
                'kota' => 'Surabaya',
                'status_verif' => 'verified',
                'deskripsi' => 'Servis AC termurah dan terpercaya',
                'kategori' => (object)['nama_kategori' => 'AC Service']
            ],
            (object)[
                'nama_usaha' => 'Toko Sofa Siap',
                'rating' => 4.6,
                'estimasi_harga' => 300000,
                'kota' => 'Medan',
                'status_verif' => 'verified',
                'deskripsi' => 'Pembersihan sofa dan karpet berkualitas',
                'kategori' => (object)['nama_kategori' => 'Sofa and Carpet']
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
                <a href="#">Home</a>
                <a href="#services">Services</a>
                <a href="#vendors">Find Vendors</a>
                <a href="#contact">Contact</a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin" class="pill">Dashboard</a>
                    @else
                        <a href="/dashboard" class="pill">Dashboard</a>
                    @endif
                @else
                    <a href="/login" class="pill">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="wrap hero-inner">
            <h1>Your Trusted Marketplace for<br>Cleaning and Maintenance Services</h1>
            <p>Connect with verified, professional service providers in your area. Compare, chat, and book with confidence.</p>
            <div class="hero-actions">
                <a href="#services" class="btn btn-solid">Find Services</a>
                <a href="#vendors" class="btn btn-ghost">Browse Vendors</a>
            </div>
        </div>
    </section>

@if (!empty($services))
    <section class="section" id="services">
        <div class="wrap">
            <div class="section-head">
                <h2>Explore Services</h2>
                <p>Choose from our wide range of professional services</p>
            </div>

            <div class="service-grid">
                @foreach ($services as $srv)
                    <div class="service-item">
                        <div class="service-mark" style="background: {{ $srv['color'] }};">{{ $srv['code'] }}</div>
                        <span>{{ $srv['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

   <!-- Card 1 -->

    <section class="section vendors-wrap" id="vendors">
        <div class="wrap">
            <div class="section-head">
                <h2>Featured Vendors</h2>
                <p>Top-rated service providers trusted by customers</p>
            </div>

            <div class="vendor-grid">
                @forelse ($featured as $v)
                    @if (!empty($v->id))
                        <a href="{{ route('vendors.show', $v->id) }}" class="vendor-link">
                            <article class="vendor-card">
                                <div class="vendor-photo">
                                    <span class="vendor-tag">Top Rated</span>
                                </div>
                                <div class="vendor-body">
                                    <h3 class="vendor-title">{{ $v->nama_usaha }}</h3>
                                    <div class="vendor-meta">
                                        <span>Rating {{ number_format($v->rating, 1) }}</span>
                                        <span>Rp {{ number_format($v->estimasi_harga, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="vendor-meta">
                                        <span>{{ $v->kota }}</span>
                                        <span>{{ ucfirst($v->status_verif) }}</span>
                                    </div>
                                    <div class="vendor-chips">
                                        <span class="chip">{{ $v->kategori->nama_kategori ?? 'Umum' }}</span>
                                        <span class="chip">{{ \Illuminate\Support\Str::limit($v->deskripsi, 18) }}</span>
                                    </div>
                                </div>
                            </article>
                        </a>
                    @else
                        <article class="vendor-card">
                            <div class="vendor-photo">
                                <span class="vendor-tag">Top Rated</span>
                            </div>
                            <div class="vendor-body">
                                <h3 class="vendor-title">{{ $v->nama_usaha }}</h3>
                                <div class="vendor-meta">
                                    <span>Rating {{ number_format($v->rating, 1) }}</span>
                                    <span>Rp {{ number_format($v->estimasi_harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="vendor-meta">
                                    <span>{{ $v->kota }}</span>
                                    <span>{{ ucfirst($v->status_verif) }}</span>
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
                        <div class="vendor-photo"><span class="vendor-tag">Top Rated</span></div>
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
                <a href="{{ url('/jasa/add') }}" class="btn" style="background:#2862e0;color:#fff;border-color:#2862e0;">View All Vendors</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <div class="section-head">
                <h2>How It Works</h2>
                <p>Get professional service in 4 simple steps</p>
            </div>

            <div class="steps">
                <article class="step-item">
                    <div class="step-mark">1</div>
                    <h3>Choose Service</h3>
                    <p>Browse categories and select the service you need.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">2</div>
                    <h3>Select Vendor</h3>
                    <p>Compare verified vendors and choose the best fit.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">3</div>
                    <h3>Book and Pay</h3>
                    <p>Schedule your service and complete secure payment.</p>
                </article>
                <article class="step-item">
                    <div class="step-mark">4</div>
                    <h3>Get Service</h3>
                    <p>Vendor arrives on time and finishes the job professionally.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section why">
        <div class="wrap">
            <div class="section-head">
                <h2>Why Choose Klik n Clean</h2>
                <p>Your trusted platform for quality service providers</p>
            </div>

            <div class="why-grid">
                <article class="why-item">
                    <b>Verified Vendors</b>
                    <span>All providers are background-checked and verified.</span>
                </article>
                <article class="why-item">
                    <b>Top Ratings</b>
                    <span>Only highly-rated vendors with proven track records.</span>
                </article>
                <article class="why-item">
                    <b>Fast Booking</b>
                    <span>Book services in minutes with instant confirmation.</span>
                </article>
                <article class="why-item">
                    <b>Direct Chat</b>
                    <span>Communicate directly with vendors before booking.</span>
                </article>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="wrap">
            <h2>Ready to Get Started?</h2>
            <p>Join satisfied customers who trust Klik n Clean for cleaning and maintenance needs.</p>
            <div class="hero-actions" style="margin-top:24px;">
                <a href="#services" class="btn btn-solid">Find Your Service Now</a>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="wrap footer-grid">
            <div>
                <h4>Klik n Clean</h4>
                <p>Your trusted marketplace connecting you with professional cleaning and maintenance service providers.</p>
            </div>

            <div>
                <h4>Quick Links</h4>
                <a href="#">Home</a>
                <a href="#services">Browse Services</a>
                <a href="#vendors">Find Vendors</a>
                <a href="{{ url('/jasa/add') }}">Book Now</a>
            </div>

            <div>
                <h4>Popular Services</h4>
                <p>General Cleaning</p>
                <p>Deep Cleaning</p>
                <p>AC Service</p>
                <p>Pest Control</p>
            </div>

            <div>
                <h4>Contact Us</h4>
                <p>+62 812 3456 7890</p>
                <p>support@kliknclean.com</p>
                <p>Jl. Bersih Sejahtera No. 123, Indonesia</p>
            </div>
        </div>
    </footer>
</body>
</html>