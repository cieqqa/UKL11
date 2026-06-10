<x-app-layout>
    <style>
        body {
            background: linear-gradient(180deg, #f6f8ff 0%, #eef4ff 100%);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
            scrollbar-gutter: stable;
        }

        * {
            box-sizing: border-box;
        }

        .admin-layout {
            margin: 40px auto 0;
            padding: 0 20px 40px;
            padding-left: 360px;
        }

        .sidebar {
            position: fixed;
            top: 104px;
            left: 20px;
            width: 300px;
            background: #fff;
            border: 1px solid rgba(148, 163, 184, .16);
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, .06);
            padding: 28px;
            height: calc(100vh - 124px);
            overflow-y: auto;
            z-index: 2;
        }

        .sidebar > * {
            background: none;
            border: none;
            border-radius: 0;
            box-shadow: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 24px;
        }

        .sidebar-brand h2 {
            margin: 0;
            font-size: 24px;
            color: #111827;
        }

        .sidebar-brand span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            font-weight: 800;
        }

        .sidebar-text {
            margin: 0;
            color: #475569;
            line-height: 1.75;
            font-size: 14px;
        }

        .nav-list {
            margin-top: 0;
            display: grid;
            gap: 12px;
            margin: 30px 0 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 18px;
            background: #f8fafc;
            border: 1px solid transparent;
            color: #334155;
            font-weight: 700;
            text-decoration: none;
            transition: all .2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #eef2ff;
            border-color: #dbeafe;
            color: #1d4ed8;
        }

        .sidebar-card {
            margin-top: 30px;
            padding: 22px;
            border-radius: 24px;
            background: #f8fafc;
            border: 1px solid rgba(148, 163, 184, .14);
        }

        .sidebar-card h3 {
            margin: 0 0 12px;
            font-size: 16px;
            color: #111827;
        }

        .sidebar-card p {
            margin: 0;
            color: #475569;
            line-height: 1.75;
            font-size: 14px;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .admin-page {
            max-width: 1180px;
            margin: 40px auto;
            padding: 0 20px 40px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-title {
            margin: 0;
            font-size: 32px;
            color: #0f172a;
        }

        .page-description {
            margin: 8px 0 0;
            color: #475569;
            max-width: 760px;
            line-height: 1.75;
        }

        .page-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-back,
        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 9999px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid transparent;
            transition: all .18s ease;
        }

        .btn-back {
            background: #f8fafc;
            color: #334155;
            border-color: #dbe4f0;
        }

        .btn-back:hover {
            background: #eef2ff;
            color: #1d4ed8;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
        }

        .btn-secondary {
            background: #f8fafc;
            color: #334155;
            border-color: #dbe4f0;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 24px;
        }

        .detail-card,
        .action-card {
            background: #fff;
            border-radius: 28px;
            border: 1px solid rgba(148, 163, 184, .14);
            box-shadow: 0 24px 60px rgba(15, 23, 42, .05);
            padding: 28px;
        }

        .detail-card h3 {
            margin: 0 0 10px;
            font-size: 28px;
            color: #0f172a;
        }

        .detail-card p {
            margin: 0 0 18px;
            color: #475569;
            line-height: 1.75;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        .detail-table td {
            padding: 14px 0;
            vertical-align: top;
            color: #334155;
        }

        .detail-label {
            width: 140px;
            color: #64748b;
            font-weight: 700;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-card h4 {
            margin: 0 0 16px;
            font-size: 18px;
            color: #0f172a;
        }

        .action-card p {
            color: #475569;
            line-height: 1.75;
            margin-bottom: 20px;
        }

        .action-card form,
        .action-card a {
            width: 100%;
        }

        .action-card a {
            display: inline-flex;
            text-align: center;
            justify-content: center;
        }

        .photo-wrap {
            margin-top: 24px;
            border-radius: 24px;
            overflow: hidden;
        }

        .photo-wrap img {
            width: 100%;
            display: block;
            object-fit: cover;
            max-height: 320px;
        }

        @media (max-width: 900px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1100px) {
            .admin-layout {
                padding-left: 20px;
            }

            .sidebar {
                position: relative;
                top: 0;
                left: 0;
                width: auto;
                height: auto;
                min-height: auto;
                background: #fff;
                border: 1px solid rgba(148, 163, 184, .16);
                border-radius: 28px;
                box-shadow: 0 24px 60px rgba(15, 23, 42, .06);
                padding: 28px;
                margin-bottom: 24px;
            }

            .sidebar > * {
                background: none;
                border: none;
            }
        }

        @media (max-width: 760px) {
            .sidebar,
            .detail-card {
                padding: 20px;
            }

            .page-title {
                font-size: 28px;
            }

            .nav-link {
                padding: 14px 16px;
            }
        }
    </style>

    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h2>Admin Panel</h2>
                <span>K</span>
            </div>
            <p class="sidebar-text">Kelola permintaan pendaftaran, data jasa, dan kategori dengan navigasi cepat pada sidebar.</p>

            <nav class="nav-list">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('admin.business-requests') }}" class="nav-link active">Permintaan PT/CV</a>
                <a href="{{ route('jasa.index') }}" class="nav-link">Data Jasa</a>
                <a href="{{ route('kategori.index') }}" class="nav-link">Data Kategori</a>
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
            </nav>

            <div class="sidebar-card">
                <h3>Statistik Cepat</h3>
                <p>Total Jasa: <strong>{{ $stats['totalJasa'] ?? 0 }}</strong></p>
                <p>Total Kategori: <strong>{{ $stats['totalKategori'] ?? 0 }}</strong></p>
                <p>Permintaan Pendaftaran: <strong>{{ $stats['pendingRequests'] ?? 0 }}</strong></p>
            </div>
        </aside>

        <main class="main-content">
    <div class="admin-page">
        <div class="page-header">
            <div>
                <h1 class="page-title">Detail Permintaan Pendaftaran</h1>
                <p class="page-description">Lihat informasi detail permintaan PT/CV dan lakukan keputusan approve atau reject langsung dari halaman ini.</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.business-requests') }}" class="btn-back">Kembali ke Daftar Request</a>
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary">Dashboard Admin</a>
            </div>
        </div>

        <div class="detail-grid">
            <section class="detail-card">
                <h3>{{ $req->nama_usaha }} <small style="color:#64748b; font-size:14px;">#{{ $req->id }}</small></h3>
                <p>{{ $req->deskripsi ?? '-' }}</p>

                <table class="detail-table">
                    <tr>
                        <td class="detail-label">Tipe Perusahaan</td>
                        <td>{{ $req->company_type ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Email PT/CV</td>
                        <td>{{ $req->company_email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Estimasi Harga</td>
                        <td>{{ $req->estimasi_harga ? 'Rp '.number_format($req->estimasi_harga,0,',','.') : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Kategori</td>
                        <td>{{ $req->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Alamat</td>
                        <td>{{ $req->alamat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Kota</td>
                        <td>{{ $req->kota ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Kontak</td>
                        <td>{{ $req->kontak ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Pemohon</td>
                        <td>{{ $req->user->name }} • {{ $req->user->email }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Diajukan</td>
                        <td>{{ $req->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="detail-label">Status</td>
                        <td><span class="status-pill status-{{ $req->status }}">{{ ucfirst($req->status) }}</span></td>
                    </tr>
                </table>

                @if($req->foto)
                    <div class="photo-wrap">
                        <img src="{{ asset($req->foto) }}" alt="Foto Usaha">
                    </div>
                @endif
            </section>

            <aside class="action-card">
                <h4>Aksi Admin</h4>
                @if($req->status === 'pending')
                    <form method="POST" action="{{ route('admin.business-requests.approve', $req->id) }}" style="margin-bottom:14px;">
                        @csrf
                        <button class="btn btn-primary" type="submit">Approve & Buat Akun Vendor</button>
                    </form>
                    <form method="POST" action="{{ route('admin.business-requests.reject', $req->id) }}">
                        @csrf
                        <button class="btn btn-secondary" type="submit">Reject</button>
                    </form>
                @else
                    <p>Permintaan ini telah diproses pada {{ $req->updated_at->format('Y-m-d H:i') }}. Tidak ada aksi lebih lanjut yang diperlukan.</p>
                @endif
            </aside>
        </div>
    </div>
        </main>
    </div>
</x-app-layout>
