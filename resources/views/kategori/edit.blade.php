<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
        }

        .page {
            max-width: 520px;
            margin: 40px auto;
            padding: 0 18px 40px;
        }

        .card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
            padding: 32px;
        }

        .back-link {
            display: inline-flex;
            color: #2563eb;
            margin-bottom: 18px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 28px;
        }

        p {
            margin: 0 0 24px;
            color: #475569;
            line-height: 1.75;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #0f172a;
        }

        input {
            width: 100%;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            padding: 12px 14px;
            font-size: 15px;
            color: #0f172a;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .btn {
            border: none;
            border-radius: 14px;
            padding: 14px 20px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .16s ease, box-shadow .16s ease;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-secondary {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #cbd5e1;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .error-box {
            background: #fef3f2;
            border: 1px solid #fbc8c4;
            color: #991b1b;
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="page">
        <a href="/admin" class="back-link">← Kembali ke Dashboard</a>
        <div class="card">
            <h1>Edit Kategori</h1>
            <p>Perbarui nama kategori agar daftar kategori tetap rapi dan akurat.</p>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa data berikut:</strong>
                    <ul style="margin: 12px 0 0 18px; padding: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nama_kategori">Nama Kategori</label>
                <input id="nama_kategori" type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Perbarui Kategori</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='/admin'">Batal</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>