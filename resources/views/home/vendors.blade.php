<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klik n Clean | Find Vendors</title>
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
            --success: #2d9f67;
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
            padding-bottom: 40px;
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
            margin-top: 20px;
            padding: 48px 0 32px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            align-items: start;
        }

        .hero-left {
            max-width: 720px;
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

        .search-box {
            display: flex;
            gap: 12px;
            align-items: stretch;
            max-width: 640px;
        }

        .search-box input,
        .search-box select {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 16px 18px;
            font-size: 15px;
            color: var(--ink);
            background: #fff;
            outline: none;
        }

        .search-box button {
            border: none;
            border-radius: 14px;
            padding: 0 24px;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .hero-right {
            border-radius: 28px;
            background: linear-gradient(180deg, #ffffff 0%, #f5f8ff 100%);
            box-shadow: var(--shadow);
            padding: 32px;
        }

        .hero-card {
            display: grid;
            gap: 18px;
        }

        .hero-card h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .hero-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
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

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px rgba(15, 45, 115, 0.12);
        }

        .main-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 26px;
            align-items: start;
            margin-top: 32px;
        }

        .panel {
            position: sticky;
            top: 100px;
            align-self: start;
            border-radius: 28px;
            padding: 28px;
            background: #fff;
            box-shadow: var(--shadow);
            border: 1px solid #eef2f8;
        }

        .panel .filter-group {
            max-height: calc(100vh - 220px);
            overflow-y: auto;
            padding-right: 6px;
        }

        .panel .filter-group::-webkit-scrollbar {
            width: 8px;
        }

        .panel .filter-group::-webkit-scrollbar-thumb {
            background: rgba(31, 83, 215, 0.2);
            border-radius: 999px;
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

        .filter-group {
            display: grid;
            gap: 14px;
        }

        .filter-group label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: var(--ink);
        }

        .filter-group input[type="radio"],
        .filter-group input[type="checkbox"] {
            accent-color: var(--primary);
        }

        .vendor-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
            margin-bottom: 24px;
        }

        .vendor-count {
            color: var(--primary);
            font-weight: 700;
        }

        .vendor-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .vendor-card {
            display: flex;
            flex-direction: column;
            border-radius: 32px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #edf2f7;
            box-shadow: 0 20px 40px rgba(26, 70, 135, 0.08);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .vendor-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 26px 56px rgba(26, 70, 135, 0.14);
        }

        .vendor-photo {
            min-height: 220px;
            background: linear-gradient(135deg, #eef6ff 0%, #f8fbff 100%);
            position: relative;
        }

        .vendor-photo .vendor-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .vendor-photo::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1555374017-5bdc4e0a37d1?auto=format&fit=crop&w=900&q=80') center/cover no-repeat;
            opacity: 0.26;
        }

        .vendor-photo .vendor-tag {
            z-index: 2;
        }

        .vendor-photo .vendor-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(22, 45, 183, 0.92);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
        }

        .vendor-body {
            padding: 24px 24px 32px;
            display: grid;
            gap: 14px;
        }

        .vendor-title {
            margin: 0;
            font-size: 20px;
        }

        .vendor-title a {
            color: inherit;
            text-decoration: none;
        }

        .vendor-title a:hover {
            text-decoration: underline;
        }

        .vendor-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .vendor-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            color: var(--muted);
            font-size: 14px;
            align-items: center;
        }

        .vendor-meta span {
            background: #f4f7fb;
            padding: 10px 14px;
            border-radius: 14px;
            font-weight: 600;
        }

        .vendor-meta .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #eef4ff;
            color: #1d4ed8;
            border-radius: 14px;
            padding: 10px 14px;
            font-weight: 600;
        }

        .vendor-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .chip {
            display: inline-flex;
            padding: 9px 12px;
            border-radius: 999px;
            background: #eff4ff;
            color: var(--primary-dark);
            font-size: 13px;
            font-weight: 700;
        }

        .vendor-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        .vendor-footer .btn {
            width: auto;
            white-space: nowrap;
            padding: 12px 20px;
            border-radius: 18px;
        }

        .vendor-count {
            display: inline-flex;
            align-items: center;
            margin-left: 10px;
            font-size: 0.95rem;
            color: var(--primary);
            font-weight: 700;
        }

        .hero-summary {
            margin-top: 24px;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 14px;
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .hero-summary span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: 999px;
            border: 1px solid #dbeafe;
            background: #eff6ff;
            color: #1d4ed8;
        }

        .hero-summary strong {
            color: #1d4ed8;
        }

        .vendor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 26px;
        }

        .vendor-card {
            display: flex;
            flex-direction: column;
            border-radius: 32px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #edf2f7;
            box-shadow: 0 22px 52px rgba(26, 70, 135, 0.08);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .vendor-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 30px 70px rgba(26, 70, 135, 0.14);
        }

        .vendor-photo {
            min-height: 200px;
            background: linear-gradient(135deg, #eef6ff 0%, #f8fbff 100%);
            position: relative;
            overflow: hidden;
        }

        .vendor-photo .vendor-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            transition: transform .3s ease;
        }

        .vendor-card:hover .vendor-photo .vendor-image {
            transform: scale(1.04);
        }

        .vendor-photo::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.05) 0%, rgba(15, 23, 42, 0.12) 100%);
            z-index: 2;
        }

        .vendor-photo .vendor-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            z-index: 3;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(22, 45, 183, 0.92);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
        }

        .vendor-body {
            padding: 28px 26px 30px;
            display: grid;
            gap: 16px;
        }

        .vendor-title {
            margin: 0;
            font-size: 22px;
            line-height: 1.2;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .vendor-title a {
            color: inherit;
            text-decoration: none;
        }

        .vendor-title a:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        .vendor-details {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .vendor-details span {
            background: #eef4ff;
            color: #1e40af;
            padding: 10px 14px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 700;
        }

        .vendor-description {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
            font-size: 14px;
        }

        .vendor-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .vendor-footer .btn {
            width: auto;
            white-space: nowrap;
            padding: 12px 20px;
            border-radius: 18px;
        }

        .empty-state {
            border-radius: 24px;
            background: #fff;
            padding: 40px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .empty-state h3 {
            margin: 0 0 18px;
        }

        .empty-state p {
            margin: 0;
            color: var(--muted);
        }

        @media (max-width: 980px) {
            .topbar .wrap {
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 14px;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
                width: 100%;
            }

            .menu a,
            .menu .pill,
            .dropdown-trigger {
                flex: 0 1 auto;
                min-width: 120px;
                text-align: center;
            }

            .hero-grid,
            .main-grid {
                grid-template-columns: 1fr;
            }

            .vendor-grid {
                grid-template-columns: 1fr;
            }
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
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">K</span>
                Klik n Clean
            </a>
            <nav class="menu">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('vendors.index') }}" class="active">Find Vendors</a>
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
                            <a href="{{ route('profile.edit') }}">Profil Saya</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ url('/admin') }}">Admin Panel</a>
                            @else
                                <a href="{{ url('/redirect') }}">Dashboard Saya</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-slate-900 hover:bg-slate-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="pill">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="wrap hero-grid">
            <div class="hero-left">
                <h1>Find Trusted Service Partners</h1>
                <p>Discover professional vendors with transparent pricing, easy booking, and dependable local support.</p>
                <form action="{{ route('vendors.index') }}" method="GET" class="search-box">
                    <input type="text" name="search" placeholder="Search vendors or services..." value="{{ old('search', $search ?? '') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <div class="hero-summary">
                    <span><strong>{{ $vendors->count() }}</strong> vendors found</span>
                    @if(!empty($search))
                        <span>Search results for "{{ $search }}"</span>
                    @endif
                </div>
                @guest
                    <div style="margin-top:16px; padding:18px; border-radius:18px; background:#fff; box-shadow:var(--shadow);">
                        <p style="margin:0 0 10px; color:var(--ink); font-weight:600;">Silakan login untuk melihat detail vendor lengkap dan melakukan pemesanan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login / Register</a>
                    </div>
                @endguest
            </div>
        </div>
    </section>

    <div class="wrap main-grid">
        <aside class="panel">
            <h3>Filters</h3>
            <p>Refine vendors by rating, price, and category.</p>
            <form method="GET" action="{{ route('vendors.index') }}" class="filter-group">
                <input type="hidden" name="search" value="{{ $search ?? '' }}">

                <div>
                    <h4 style="margin: 0 0 10px; font-size: 15px;">Price Range</h4>
                    <label><input type="radio" name="price" value="" {{ empty($price) ? 'checked' : '' }}> Semua Harga</label>
                    <label><input type="radio" name="price" value="budget" {{ ($price ?? '') === 'budget' ? 'checked' : '' }}> ≤ Rp 150.000</label>
                    <label><input type="radio" name="price" value="moderate" {{ ($price ?? '') === 'moderate' ? 'checked' : '' }}> Rp 150.001 - Rp 1.500.000</label>
                    <label><input type="radio" name="price" value="premium" {{ ($price ?? '') === 'premium' ? 'checked' : '' }}> ≥ Rp 1.500.001</label>
                </div>

                <div>
                    <h4 style="margin: 0 0 10px; font-size: 15px;">Categories</h4>
                    @php $selected = $categoryIds ?? []; @endphp
                    @foreach($kategori as $kat)
                        <label style="display:block; font-size:14px; color: var(--ink);">
                            <input type="checkbox" name="category[]" value="{{ $kat->id }}" {{ in_array($kat->id, (array)$selected) ? 'checked' : '' }}> {{ $kat->nama_kategori }}
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </form>

            <div style="margin-top:18px; padding:16px; border-radius:12px; background:#f8fafc;">
                <h4 style="margin:0 0 8px;">Daftarkan PT / CV</h4>
                <p style="margin:0 0 12px; color:var(--muted);">Jika Anda mewakili sebuah PT atau CV dan ingin terdaftar sebagai vendor, silakan ajukan permintaan pendaftaran. Admin akan meninjau dan mengonfirmasi.</p>
                @auth
                    <a href="{{ route('business-request.create') }}" class="btn btn-primary">Daftarkan PT / CV</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Daftar</a>
                @endauth
            </div>

        </aside>

        <main>
            @php
            $showAll = request()->boolean('show_all');
            $previewLimit = 4;
            $totalVendors = method_exists($vendors, 'total') ? $vendors->total() : count($vendors);
            $displayVendors = $showAll ? $vendors : $vendors->take($previewLimit);
        @endphp

            <div class="vendor-header">
                <div>
                    <h2 style="margin:0; font-size: 26px;">Browse Vendors <span class="vendor-count">({{ $totalVendors }})</span></h2>
                    <p style="margin: 8px 0 0; color: var(--muted);">
                        Scroll through trusted vendors and view full details on each listing.
                        @if(!$showAll && $totalVendors > $previewLimit)
                            Menampilkan {{ min($previewLimit, $totalVendors) }} dari {{ $totalVendors }} vendor.
                        @endif
                    </p>
                </div>
                <div class="vendor-actions">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back Home</a>
                </div>
            </div>

            <div id="vendor-list" class="vendor-grid">
                @forelse($displayVendors as $vendor)
                    <article class="vendor-card">
                        <div class="vendor-photo">
                            @if(!empty($vendor->foto))
                                <img src="{{ asset($vendor->foto) }}" alt="{{ $vendor->nama_usaha }}" class="vendor-image">
                            @endif
                        </div>
                        <div class="vendor-body">
                            <h3 class="vendor-title"><a href="{{ route('vendors.show', $vendor->id) }}">{{ $vendor->nama_usaha }}</a></h3>
                            <div class="vendor-details">
                                <span>Rp {{ number_format($vendor->estimasi_harga ?? 0, 0, ',', '.') }}</span>
                                <span>{{ $vendor->kota }}</span>
                                @if(!empty($vendor->rating))
                                    <span>{{ number_format($vendor->rating, 1) }} ★</span>
                                @endif
                            </div>
                            <p class="vendor-description">{{ Str::limit($vendor->deskripsi, 90) }}</p>
                            <div class="vendor-chips">
                                <span class="chip">{{ $vendor->kategori->nama_kategori ?? 'Umum' }}</span>
                            </div>
                            <div class="vendor-footer">
                                <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <h3>Tidak ada vendor ditemukan</h3>
                        <p>Ubah filter pencarian atau hapus kriteria agar dapat melihat lebih banyak layanan.</p>
                    </div>
                @endforelse
            </div>

            @if($totalVendors > $previewLimit)
                <div class="align-center" style="margin-top: 28px; text-align: center;">
                    @if(!$showAll)
                        <a href="{{ route('vendors.index', array_merge(request()->query(), ['show_all' => 1])) }}" class="btn btn-primary">Lihat Semua Vendor</a>
                    @else
                        <a href="{{ route('vendors.index', request()->except('show_all')) }}" class="btn btn-secondary">Lihat Lebih Sedikit</a>
                    @endif
                </div>
            @endif
        </main>
    </div>
</body>
</html>
