<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Kategori</title>
    <style>
        body { background: #eef4ff; font-family: Arial, sans-serif; }
        .container { width: 420px; margin: 60px auto; background: #fff; padding: 22px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
        h3 { text-align: center; color: #1e3a8a; margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color:#334155; font-weight:600 }
        input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; }
        .actions { margin-top: 14px; display:flex; gap:10px }
        .btn { flex:1; padding:10px; border-radius:6px; border:none; cursor:pointer; font-weight:700 }
        .btn-save { background:#2563eb; color:#fff }
        .btn-cancel { background:#e2e8f0; color:#0f172a }
        a { color:#2563eb; text-decoration:none }
    </style>
</head>
<body>
<div class="container">
    <a href="/admin">← Kembali</a>
    <h3>Tambah Kategori</h3>

    @if ($errors->any())
        <div style="background:#fff3cd;border:1px solid #ffeeba;padding:10px;border-radius:6px;margin-bottom:12px;color:#856404">
            <ul style="margin:0;padding-left:18px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" required>

        <div class="actions">
            <button type="submit" class="btn btn-save">Simpan</button>
            <a href="/admin" class="btn btn-cancel" style="display:inline-flex;align-items:center;justify-content:center;text-decoration:none">Batal</a>
        </div>
    </form>
</div>
</body>
</html>