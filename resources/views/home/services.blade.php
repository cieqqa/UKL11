<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik n Clean | Find Services</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f4f7fb;
            --surface: #ffffff;
            --surface-alt: #f7f9fe;
            --line: #dce4f1;
            --primary: #1f53d7;
            --primary-dark: #0f3fc2;
            --ink: #13203d;
            --muted: #677894;
            --shadow: 0 16px 40px rgba(17, 44, 101, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            background: radial-gradient(circle at 100% 0, #eaf0ff 0, var(--bg) 45%);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            padding-bottom: 34px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .wrap {
            width: min(1180px, 94%);
            margin: 0 auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(8, 20, 58, 0.94);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(16px);
        }

        .topbar .wrap {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            font-weight: 800;
            font-size: 20px;
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 14px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 22px;
            color: rgba(255,255,255,0.8);
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            color: #fff;
        }

        .hero {
            margin-top: 22px;
            padding: 42px 0 30px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 30px;
            align-items: center;
        }

        .hero-left h1 {
            margin: 0 0 18px;
            font-size: clamp(2.8rem, 4vw, 4.2rem);
            line-height: 1.02;
        }

        .hero-left p {
            margin: 0 0 30px;
            max-width: 620px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: 16px;
            border: 1px solid transparent;
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-secondary {
            background: #fff;
            color: var(--ink);
            border-color: var(--line);
        }

        .hero-actions .btn:hover,
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px rgba(15, 45, 115, 0.12);
        }

        .main-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
            margin-top: 28px;
            align-items: start;
        }

        .panel {
            border-radius: 28px;
            padding: 28px;
            background: #fff;
            box-shadow: var(--shadow);
            border: 1px solid #eef2f8;
        }

        .panel h3 {
            margin: 0 0 18px;
            font-size: 18px;
        }

        .panel p {
            margin: 0 0 22px;
            color: var(--muted);
            line-height: 1.75;
        }

        .filter-list {
            display: grid;
            gap: 12px;
        }

        .filter-list label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: var(--ink);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .service-card {
            background: #fff;
            border-radius: 24px;
            padding: 26px;
            box-shadow: var(--shadow);
            border: 1px solid #edf2f7;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .service-card h3 {
            margin: 0;
            font-size: 20px;
        }

        .service-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .service-stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            color: var(--muted);
            font-size: 13px;
        }

        .stat {
            background: var(--surface-alt);
            border-radius: 16px;
            padding: 12px 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .stat small {
            color: var(--muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 999px;
            background: #eff4ff;
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .hero-grid,
            .main-grid,
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a href="{{ url('/') }}" class="brand">
                <span class="brand-mark">K</span>
                Klik n Clean
            </a>
            <nav class="menu">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('services.index') }}" class="active">Services</a>
                <a href="{{ route('vendors.index') }}">Find Vendors</a>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin" class="pill">Dashboard</a>
                    @else
                        <a href="{{ url('/redirect') }}" class="pill">Dashboard</a>
                    @endif
                @else
                    <a href="/login" class="pill">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="wrap hero-grid">
            <div class="hero-left">
                <h1>Browse Services</h1>
                <p>Filter by category and view vendors for each cleaning or maintenance service. Pilih layanan yang paling sesuai dengan kebutuhan Anda.</p>
                <div class="hero-actions">
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary">View All Vendors</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                    <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Browse Vendors</a>
                </div>
                @guest
                    <div style="margin-top:16px; padding:14px; border-radius:12px; background:#fff; box-shadow:var(--shadow);">
                        <p style="margin:0 0 8px;">Silakan login untuk melihat vendor dan melakukan pemesanan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login / Register</a>
                    </div>
                @endguest
            </div>
            <div class="hero-right">
                <div class="service-card">
                    <h3>Trusted service categories</h3>
                    <p>Every category maps to real vendors in your database, so you can move from service discovery to vendor selection in one flow.</p>
                    <div class="service-stats">
                        <div class="stat">
                            <small>Categories</small>
                            <strong>{{ $kategori->count() }}</strong>
                        </div>
                        <div class="stat">
                            <small>Total Vendors</small>
                            <strong>{{ $kategori->sum(fn($item) => $item->jasa->count()) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wrap main-grid">
        <aside class="panel">
            <h3>Filters</h3>
            <p>Data kategori ditarik langsung dari database. Pilih kategori yang paling cocok untuk layanan Anda.</p>
            <div class="filter-list">
                <label><input type="radio" name="service" checked> All Services</label>
                @foreach($kategori as $kat)
                    <label><input type="radio" name="service"> {{ $kat->nama_kategori }}</label>
                @endforeach
            </div>
        </aside>

        <main>
            <div class="cards">
                @foreach($kategori as $kat)
                    @php
                        $vendorCount = $kat->jasa->count();
                        $prices = $kat->jasa->map(function ($jasa) {
                            $value = preg_replace('/[^0-9]/', '', $jasa->estimasi_harga);
                            return is_numeric($value) ? (int) $value : null;
                        })->filter();
                        $minPrice = $prices->min();
                        $maxPrice = $prices->max();
                    @endphp
                    <article class="service-card">
                        <div class="badge">{{ $kat->nama_kategori }}</div>
                        <h3>{{ $kat->nama_kategori }}</h3>
                        <p>{{ $vendorCount > 0 ? 'Compare available vendors and book the best service for your home or office.' : 'Belum ada vendor untuk kategori ini. Tambahkan data jasa terlebih dahulu.' }}</p>
                        <div class="service-stats">
                            <div class="stat">
                                <small>Rating</small>
                                <strong>4.6</strong>
                            </div>
                            <div class="stat">
                                <small>Available Vendors</small>
                                <strong>{{ $vendorCount }}</strong>
                            </div>
                            <div class="stat">
                                <small>Average Price</small>
                                <strong>{{ $minPrice && $maxPrice ? 'Rp ' . number_format($minPrice, 0, ',', '.') . ' - Rp ' . number_format($maxPrice, 0, ',', '.') : '-' }}</strong>
                            </div>
                        </div>
                        @auth
                            <a href="{{ route('vendors.index', ['category' => $kat->id]) }}" class="btn btn-primary">View Vendors</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login to View</a>
                        @endauth
                    </article>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>
