<x-app-layout>
    <style>
        body {
            background: #eef4ff;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 1180px;
            margin: 40px auto;
            padding: 0 20px 40px;
        }

        .panel-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 18px;
            align-items: flex-end;
            margin-bottom: 28px;
        }

        .panel-title {
            margin: 0;
            font-size: 34px;
            color: #1e3a8a;
        }

        .panel-subtitle {
            margin: 8px 0 0;
            color: #475569;
            max-width: 620px;
            line-height: 1.6;
        }

        .action-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
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
            grid-template-columns: repeat(2, minmax(0, 1fr));
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
            margin-bottom: 28px;
        }

        .table-container h2 {
            margin: 0 0 18px;
            font-size: 22px;
            color: #0f172a;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table thead th {
            color: #64748b;
            font-weight: 700;
            font-size: 14px;
            text-align: left;
            padding: 15px 18px;
        }

        .table tbody tr {
            background: #f8fafc;
            border-radius: 18px;
        }

        .table tbody td {
            padding: 16px 18px;
            vertical-align: middle;
            color: #334155;
        }

        .table tbody tr td:first-child {
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
        }

        .table tbody tr td:last-child {
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px;
        }

        .table tbody tr:hover {
            transform: translateY(-1px);
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .action-link.edit {
            background: #fbbf24;
            color: #1f2937;
        }

        .action-link.delete {
            background: #ef4444;
            color: #fff;
        }

        .table-empty {
            padding: 24px 18px;
            color: #64748b;
            font-style: italic;
        }

        @media (max-width: 900px) {
            .stat-grid,
            .panel-header {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container">
        @if (session('success'))
            <div style="margin-bottom:24px; background:#ddefdd; color:#0f5132; border:1px solid #c3e6cb; padding:16px; border-radius:16px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="panel-header">
            <div>
                <p class="panel-subtitle">Admin control panel untuk kelola Jasa dan Kategori.</p>
                <h1 class="panel-title">Dashboard Admin</h1>
            </div>
            <div class="action-group">
                <a href="{{ route('jasa.create') }}" class="btn btn-primary">+ Tambah Jasa</a>
                <a href="{{ route('kategori.create') }}" class="btn btn-secondary">+ Tambah Kategori</a>
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
        </div>

        <div class="table-container">
            <h2>Data Jasa</h2>
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
                                <a href="{{ route('jasa.edit', $j->id) }}" class="action-link edit">Edit</a>
                                <form action="{{ route('jasa.destroy', $j->id) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link delete" style="border:none; cursor:pointer;">Hapus</button>
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
            <h2>Data Kategori</h2>
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
                            <td>
                                <a href="{{ route('kategori.edit', $k->id) }}" class="action-link edit">Edit</a>
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-link delete" style="border:none; cursor:pointer;">Hapus</button>
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
    </div>
</x-app-layout>