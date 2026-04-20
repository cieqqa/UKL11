<!DOCTYPE html>
<html>
<head>
    <title>Data Jasa</title>

    <style>
        body {
            background: #eef4ff;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .title {
            font-size: 26px;
            font-weight: bold;
            color: #1e3a8a;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-blue { background: #2563eb; }
        .btn-blue:hover { background: #1d4ed8; }

        .btn-yellow { background: #f59e0b; }
        .btn-yellow:hover { background: #d97706; }

        .btn-red { background: #ef4444; }
        .btn-red:hover { background: #dc2626; }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin: 0;
            color: #1e40af;
        }

        .price {
            font-weight: bold;
            margin-top: 5px;
        }

        .desc {
            color: #555;
            margin-top: 8px;
            font-size: 14px;
        }

        .kategori {
            color: #2563eb;
            margin-top: 5px;
            font-size: 13px;
        }

        .actions {
            margin-top: 12px;
        }

        .actions a,
        .actions button {
            margin-right: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <div class="title">Data Jasa</div>

        <a href="/jasa/create" class="btn btn-blue">
            + Tambah
        </a>
    </div>

    <!-- LIST -->
    <div class="grid">

        @forelse($jasa as $r)
        <div class="card">

            <h2>{{ $r->nama_jasa }}</h2>

            <div class="price">
                Rp {{ number_format($r->harga) }}
            </div>

            <div class="desc">
                {{ $r->deskripsi }}
            </div>

            <div class="kategori">
                Kategori: {{ $r->kategori->nama_kategori ?? '-' }}
            </div>

            <div class="actions">

                <a href="/jasa/{{ $r->id }}/edit" class="btn btn-yellow">
                    Edit
                </a>

                <form action="/jasa/{{ $r->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-red">
                        Hapus
                    </button>
                </form>

            </div>

        </div>

        @empty
        <p>Belum ada data jasa</p>
        @endforelse

    </div>

</div>

</body>
</html>