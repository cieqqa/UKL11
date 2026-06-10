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

        .request-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 14px;
        }

        .request-table thead th {
            padding: 18px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #1f2937;
            background: #eef2ff;
            border-bottom: 1px solid rgba(148, 163, 184, .18);
        }

        .request-table tbody tr {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            overflow: hidden;
        }

        .request-table tbody td {
            padding: 18px 20px;
            color: #334155;
            vertical-align: top;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
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

        .request-meta {
            margin-top: 8px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .actions-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: flex-end;
        }

        @media (max-width: 860px) {
            .request-table thead {
                display: none;
            }

            .request-table,
            .request-table tbody,
            .request-table tr,
            .request-table td {
                display: block;
                width: 100%;
            }

            .request-table tr {
                margin-bottom: 14px;
            }

            .request-table td {
                padding: 16px 18px;
            }

            .request-table td::before {
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

            .request-table thead th,
            .request-table tbody td {
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
                <h1 class="page-title">Permintaan Pendaftaran PT / CV</h1>
                <p class="page-description">Lihat seluruh request admin dengan tampilan yang lebih jelas dan mudah dikelola. Klik detail untuk memproses permintaan satu per satu.</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>
            </div>
        </div>

        @if(session('success'))
            <div class="card" style="margin-bottom:20px;">
                <div class="card-body" style="padding:18px 24px; color:#14532d; background:#ecfdf5; border-radius:18px;">{{ session('success') }}</div>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="request-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usaha</th>
                            <th>PT/CV</th>
                            <th>Pemohon</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th style="text-align:right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $r)
                            <tr>
                                <td data-label="ID">#{{ $r->id }}<div class="request-meta">{{ $r->created_at->format('Y-m-d H:i') }}</div></td>
                                <td data-label="Usaha">
                                    <strong>{{ $r->nama_usaha }}</strong>
                                    <div class="request-meta">{{ Str::limit($r->deskripsi, 80) }}</div>
                                </td>
                                <td data-label="PT/CV">{{ $r->company_email ?? '-' }}</td>
                                <td data-label="Pemohon">
                                    {{ $r->company_type ?? '-' }}
                                    <div class="request-meta">{{ $r->user->name }} • {{ $r->user->email }}</div>
                                </td>
                                <td data-label="Kota">
                                    {{ $r->kota ?? '-' }}
                                    <div class="request-meta">{{ $r->kontak ?? '-' }}</div>
                                </td>
                                <td data-label="Status">
                                    <span class="status-pill status-{{ $r->status }}">{{ ucfirst($r->status) }}</span>
                                </td>
                                <td data-label="Aksi">
                                    <div class="actions-wrap">
                                        <a href="{{ route('admin.business-requests.show', $r->id) }}" class="btn btn-secondary">Detail</a>
                                        @if($r->status === 'pending')
                                            <form method="POST" action="{{ route('admin.business-requests.approve', $r->id) }}">@csrf<button type="submit" class="btn btn-primary">Approve</button></form>
                                            <form method="POST" action="{{ route('admin.business-requests.reject', $r->id) }}">@csrf<button type="submit" class="btn btn-secondary">Reject</button></form>
                                        @else
                                            <span class="request-meta">Processed</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="table-empty">Tidak ada permintaan pendaftaran.</td>
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
