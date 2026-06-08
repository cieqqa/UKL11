<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jasa</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top, rgba(59, 130, 246, 0.12), transparent 40%), linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
        }

        .page {
            max-width: 860px;
            margin: 50px auto;
            padding: 0 20px 44px;
        }

        .card {
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 28px 68px rgba(15, 23, 42, 0.1);
            padding: 44px;
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .header {
            margin-bottom: 28px;
        }

        .header h1 {
            margin: 0;
            font-size: 34px;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .header p {
            margin: 12px 0 0;
            color: #475569;
            line-height: 1.75;
            font-size: 16px;
        }

        .back-link {
            display: inline-flex;
            margin-bottom: 24px;
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 32px;
            margin-top: 16px;
            align-items: start;
        }

        .field {
            display: grid;
            gap: 18px;
        }

        .field.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        input,
        textarea,
        select {
            width: 100%;
            min-height: 54px;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            padding: 16px 18px;
            font-size: 0.98rem;
            color: #0f172a;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease;
            background: #f8fafc;
            box-sizing: border-box;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            background: #f8fafc;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.12);
            transform: translateY(-1px);
        }

        select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #0f172a 50%), linear-gradient(135deg, #0f172a 50%, transparent 50%);
            background-position: calc(100% - 1rem) calc(1em + 2px), calc(100% - 0.75rem) calc(1em + 2px);
            background-size: 8px 8px, 8px 8px;
            background-repeat: no-repeat;
        }

        .photo-preview {
            border-radius: 18px;
            overflow: hidden;
            max-width: 240px;
            border: 1px solid #e2e8f0;
        }

        .photo-preview img {
            display: block;
            width: 100%;
            height: auto;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 30px;
        }

        .btn {
            border: none;
            border-radius: 16px;
            padding: 15px 24px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .btn-primary {
            background: #2563eb;
            color: #ffffff;
            box-shadow: 0 14px 30px rgba(37, 99, 235, 0.16);
        }

        .btn-secondary {
            background: #ffffff;
            color: #334155;
            border: 1px solid #cbd5e1;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .error-box {
            background: #fef3f2;
            border: 1px solid #fbc8c4;
            color: #991b1b;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 22px;
        }

        @media (max-width: 820px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="back-link" onclick="window.location.href='/admin'">← Kembali ke Dashboard</div>
        <div class="card">
            <div class="header">
                <h1>Edit Jasa</h1>
                <p>Perbarui detail jasa agar informasi yang tampil lebih akurat.</p>
            </div>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa kembali data yang dimasukkan:</strong>
                    <ul style="margin: 12px 0 0 18px; padding: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jasa.update', $jasa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="field">
                        <label for="nama_usaha">Nama Usaha</label>
                        <input id="nama_usaha" type="text" name="nama_usaha" value="{{ old('nama_usaha', $jasa->nama_usaha) }}" required>
                    </div>

                    <div class="field">
                        <label for="alamat">Alamat</label>
                        <input id="alamat" type="text" name="alamat" value="{{ old('alamat', $jasa->alamat) }}" required>
                    </div>

                    <div class="field">
                        <label for="kota">Kota</label>
                        <input id="kota" type="text" name="kota" value="{{ old('kota', $jasa->kota) }}" required>
                    </div>

                    <div class="field">
                        <label for="id_kategori">Kategori</label>
                        <select id="id_kategori" name="id_kategori" required>
                            <option value="" disabled>Pilih kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('id_kategori', $jasa->id_kategori) == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="owner_id">Akun CV / PT</label>
                        <select id="owner_id" name="owner_id" required>
                            <option value="" disabled>Pilih akun CV/PT</option>
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->id }}" {{ old('owner_id', $jasa->owner_id) == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }} ({{ $vendor->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="estimasi_harga">Estimasi Harga</label>
                        <input id="estimasi_harga" type="number" name="estimasi_harga" value="{{ old('estimasi_harga', $jasa->estimasi_harga) }}" required>
                    </div>

                    <div class="field">
                        <label for="kontak">Kontak</label>
                        <input id="kontak" type="text" name="kontak" value="{{ old('kontak', $jasa->kontak) }}" required>
                    </div>

                    <div class="field full-width">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $jasa->deskripsi) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="foto">Foto Baru (opsional)</label>
                        <input id="foto" type="file" name="foto" accept="image/*">
                    </div>

                    @if($jasa->foto)
                        <div class="field full-width">
                            <label>Preview Foto Saat Ini</label>
                            <div class="photo-preview">
                                <img src="{{ asset($jasa->foto) }}" alt="Foto Jasa">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Perbarui Jasa</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='/admin'">Batal</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>