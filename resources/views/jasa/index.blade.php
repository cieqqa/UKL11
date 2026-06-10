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

        .card {
            background: #fff;
            border-radius: 28px;
            border: 1px solid rgba(148, 163, 184, .14);
            box-shadow: 0 24px 60px rgba(15, 23, 42, .05);
            overflow: hidden;
        }

        .card-body {
            padding: 28px;
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

        .jasa-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 14px;
        }

        .jasa-table thead th {
            padding: 18px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #1f2937;
            background: #eef2ff;
            border-bottom: 1px solid rgba(148, 163, 184, .18);
        }

        .jasa-table tbody tr {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            overflow: hidden;
        }

        .jasa-table tbody td {
            padding: 18px 20px;
            color: #334155;
            vertical-align: top;
        }

        .jasa-name {
            font-weight: 700;
            color: #0f172a;
        }

        .jasa-meta {
            margin-top: 8px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .price-tag {
            font-weight: 700;
            color: #2563eb;
            font-size: 14px;
        }

        .kategori-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 700;
            background: #e0e7ff;
            color: #4338ca;
        }

        .actions-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: flex-end;
        }

        .btn-action {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all .18s ease;
        }

        .btn-edit {
            background: #fbbf24;
            color: #1f2937;
        }

        .btn-edit:hover {
            background: #f59e0b;
        }

        .btn-delete {
            background: #ef4444;
            color: #fff;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        @media (max-width: 860px) {
            .jasa-table thead {
                display: none;
            }

            .jasa-table,
            .jasa-table tbody,
            .jasa-table tr,
            .jasa-table td {
                display: block;
                width: 100%;
            }

            .jasa-table tr {
                margin-bottom: 14px;
            }

            .jasa-table td {
                padding: 16px 18px;
            }

            .jasa-table td::before {
                content: attr(data-label);
                display: block;
                font-size: 12px;
                font-weight: 700;
                color: #475569;
                margin-bottom: 6px;
            }

            .actions-wrap {
                justify-content: flex-start;
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
            .card {
                padding: 20px;
            }

            .page-title {
                font-size: 28px;
            }

            .nav-link {
                padding: 14px 16px;
            }

            .jasa-table thead th,
            .jasa-table tbody td {
                padding: 14px;
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
                <a href="{{ route('admin.business-requests') }}" class="nav-link">Permintaan PT/CV</a>
                <a href="{{ route('jasa.index') }}" class="nav-link active">Data Jasa</a>
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
                <h1 class="page-title">Data Jasa</h1>
                <p class="page-description">Kelola semua layanan jasa dengan tampilan yang jelas dan mudah diedit. Tambah, ubah, atau hapus jasa sesuai kebutuhan.</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>
                <a href="{{ route('jasa.create') }}" class="btn-primary">+ Tambah Jasa</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="jasa-table">
                    <thead>
                        <tr>
                            <th>Nama Jasa</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Kota</th>
                            <th>Owner</th>
                            <th style="text-align:right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jasa as $j)
                            <tr>
                                <td data-label="Nama Jasa">
                                    <div class="jasa-name">{{ $j->nama_jasa }}</div>
                                    <div class="jasa-meta">{{ Str::limit($j->deskripsi, 60) }}</div>
                                </td>
                                <td data-label="Kategori">
                                    <span class="kategori-badge">{{ $j->kategori->nama_kategori ?? '-' }}</span>
                                </td>
                                <td data-label="Harga">
                                    <span class="price-tag">Rp {{ number_format($j->estimasi_harga, 0, ',', '.') }}</span>
                                </td>
                                <td data-label="Kota">{{ $j->kota ?? '-' }}</td>
                                <td data-label="Owner">
                                    <div class="jasa-meta">{{ $j->owner->name ?? 'N/A' }}</div>
                                </td>
                                <td data-label="Aksi">
                                    <div class="actions-wrap">
                                        <a href="{{ route('jasa.edit', $j->id) }}" class="btn-action btn-edit">Edit</a>
                                        <form method="POST" action="{{ route('jasa.destroy', $j->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center; padding:24px; color:#64748b;">Belum ada data jasa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </main>
    </div>
</x-app-layout>
