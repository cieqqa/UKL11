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
            margin-bottom: 24px;
        }

        .nav-list {
            margin-top: 30px;
            margin-bottom: 0;
        }

        .sidebar-card {
            margin-top: 30px;
            padding: 22px;
            border-radius: 24px;
            background: #f8fafc;
            border: 1px solid rgba(148, 163, 184, .14);
        }

        .main-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
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
            padding: 22px 28px;
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

        .panel-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 22px;
            align-items: flex-start;
            margin-bottom: 0;
            padding: 28px;
            background: rgba(255,255,255,.92);
            border: 1px solid rgba(148,163,184,.18);
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, .06);
        }

        .panel-title-group {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
            gap: 16px;
        }

        .panel-label {
            display: inline-flex;
            padding: 8px 12px;
            border-radius: 9999px;
            background: #e0e7ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .panel-title {
            margin: 0;
            font-size: 38px;
            line-height: 1.05;
            color: #111827;
        }

        .panel-subtitle {
            margin: 14px 0 0;
            color: #475569;
            max-width: 640px;
            line-height: 1.75;
            font-size: 15px;
        }

        .header-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 12px;
            width: 100%;
            max-width: 420px;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 9999px;
            border: 1px solid rgba(59, 130, 246, .25);
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 12px 22px rgba(59, 130, 246, .09);
            transition: transform .16s ease, box-shadow .16s ease, background .16s ease;
        }

        .btn-home:hover {
            transform: translateY(-1px);
            background: #dbeafe;
            box-shadow: 0 16px 28px rgba(59, 130, 246, .12);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 9999px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 18px rgba(15, 23, 42, .08);
            transition: transform .16s ease, box-shadow .16s ease, filter .16s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(37, 99, 235, .15);
            filter: brightness(1.03);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            border: 1px solid rgba(37, 99, 235, .18);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #ffffff, #f8fbff);
            color: #334155;
            border: 1px solid #dbe4f0;
        }

        .btn-danger {
            background: #dc2626;
            color: #fff;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .05);
        }

        .stat-card p {
            margin: 0 0 10px;
            color: #64748b;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 42px;
            color: #1e3a8a;
        }

        .table-container {
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .05);
            border: 1px solid rgba(148, 163, 184, .14);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .table-header h2 {
            margin: 0;
            font-size: 22px;
            color: #0f172a;
        }

        .table {
            width: 100%;
            min-width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .table thead th {
            color: #1f2937;
            font-weight: 700;
            font-size: 13px;
            text-align: left;
            padding: 16px 18px;
            background: #eef2ff;
            border-bottom: 1px solid rgba(148, 163, 184, .18);
        }

        .table tbody tr {
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, .08);
        }

        .table tbody td {
            padding: 18px;
            vertical-align: middle;
            color: #334155;
        }

        .table tbody td:last-child {
            text-align: right;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: transform .16s ease, box-shadow .16s ease, filter .16s ease;
        }

        .action-link:hover {
            transform: translateY(-1px);
        }

        .action-link.edit {
            background: #fbbf24;
            color: #1f2937;
            box-shadow: 0 8px 20px rgba(251, 191, 36, .16);
        }

        .action-link.delete {
            background: #ef4444;
            color: #fff;
            box-shadow: 0 8px 20px rgba(239, 68, 68, .16);
        }

        .table-empty {
            padding: 24px 18px;
            color: #64748b;
            font-style: italic;
            text-align: center;
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

            .stat-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .panel-header,
            .table-container,
            .sidebar,
            .sidebar-card {
                padding: 20px;
            }

            .panel-title {
                font-size: 32px;
            }

            .nav-link {
                padding: 14px 16px;
            }

            .table thead th,
            .table tbody td {
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">Dashboard</a>
                <a href="{{ route('admin.business-requests') }}" class="nav-link">Permintaan PT/CV</a>
                <a href="{{ route('jasa.index') }}" class="nav-link">Data Jasa</a>
                <a href="{{ route('kategori.index') }}" class="nav-link">Data Kategori</a>
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
            </nav>

            <div class="sidebar-card">
                <h3>Statistik Cepat</h3>
                <p>Total Jasa: <strong>{{ $stats['totalJasa'] }}</strong></p>
                <p>Total Kategori: <strong>{{ $stats['totalKategori'] }}</strong></p>
                <p>Permintaan Pendaftaran: <strong>{{ $stats['pendingRequests'] }}</strong></p>
            </div>
        </aside>

        <main class="main-content">
        @if (session('success'))
            <div style="margin-bottom:24px; background:#ddefdd; color:#0f5132; border:1px solid #c3e6cb; padding:16px; border-radius:16px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="panel-header">
            <div>
                <span class="panel-label">Admin Control</span>
                <div class="panel-title-group">
                    <h1 class="panel-title">Dashboard Admin</h1>
                </div>
                <p class="panel-subtitle">Pantau kinerja layanan, kelola data Jasa dan Kategori, serta ambil tindakan cepat dari satu tampilan yang bersih dan profesional.</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('home') }}" class="btn-home" title="Kembali ke Home">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10 2.5l7 6.5v7a1 1 0 01-1 1h-4v-4H8v4H4a1 1 0 01-1-1v-7l7-6.5z" />
                    </svg>
                    Kembali ke Home
                </a>
            </div>
        </div>

        <div class="stat-grid">
            <div class="stat-card">
                <p>Total Jasa</p>
                <h2>{{ $stats['totalJasa'] }}</h2>
            </div>
            <div class="stat-card">
                <p>Total Kategori</p>
                <h2>{{ $stats['totalKategori'] }}</h2>
            </div>
            <div class="stat-card">
                <p>Permintaan Pendaftaran</p>
                <h2>{{ $stats['pendingRequests'] }}</h2>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>Permintaan Pendaftaran PT / CV</h2>
                <a href="{{ route('admin.business-requests') }}" class="btn btn-secondary" title="Lihat Semua Request">Lihat Semua Request</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Usaha</th>
                        <th>Pemohon</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingRequests as $req)
                        <tr>
                            <td>{{ $req->nama_usaha }}</td>
                            <td>{{ $req->user->name }}<br><span style="color:#64748b; font-size:13px;">{{ $req->user->email }}</span></td>
                            <td>{{ $req->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $req->kota ?? '-' }}</td>
                            <td>{{ ucfirst($req->status) }}</td>
                            <td style="text-align:right;">
                                <form action="{{ route('admin.business-requests.approve', $req->id) }}" method="POST" style="display:inline-block; margin-right:8px;">
                                    @csrf
                                    <button type="submit" class="action-link edit" style="background:#2563eb; color:#fff;">Confirm</button>
                                </form>
                                <form action="{{ route('admin.business-requests.reject', $req->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="action-link delete">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="table-empty">Tidak ada permintaan pendaftaran baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>Data Jasa</h2>
                <a href="{{ route('jasa.create') }}" class="btn btn-primary" title="Tambah Jasa">Tambah Jasa</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jasa as $j)
                        <tr>
                            <td>{{ $j->nama_usaha }}</td>
                            <td>{{ $j->kategori->nama_kategori ?? '-' }}</td>
                            <td>Rp {{ number_format($j->estimasi_harga) }}</td>
                            <td>{{ $j->kota }}</td>
                            <td>
                                <a href="{{ route('jasa.edit', $j->id) }}" class="action-link edit" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 010 2.828l-9.193 9.193a1 1 0 01-.465.263l-4 1a1 1 0 01-1.213-1.213l1-4a1 1 0 01.263-.465l9.193-9.193a2 2 0 012.828 0z" />
                                    </svg>
                                    <span style="margin-left:8px;">Edit</span>
                                </a>
                                <form action="{{ route('jasa.destroy', $j->id) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link delete" style="border:none; cursor:pointer; display:inline-flex; align-items:center; gap:8px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h14a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 6a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 112 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="table-empty">Belum ada data jasa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>Data Kategori</h2>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary" title="Tambah Kategori">Tambah Kategori</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $k)
                        <tr>
                            <td>{{ $k->nama_kategori }}</td>
                            <td class='text-center'>
                                <a href="{{ route('kategori.edit', $k->id) }}" class="action-link edit" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 010 2.828l-9.193 9.193a1 1 0 01-.465.263l-4 1a1 1 0 01-1.213-1.213l1-4a1 1 0 01.263-.465l9.193-9.193a2 2 0 012.828 0z" />
                                    </svg>
                                    <span style="margin-left:8px;">Edit</span>
                                </a>
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link delete" style="border:none; cursor:pointer; display:inline-flex; align-items:center; gap:8px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h14a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 6a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 112 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="table-empty">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
</x-app-layout>