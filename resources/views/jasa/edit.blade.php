<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jasa</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
        }

        .page {
            max-width: 680px;
            margin: 40px auto;
            padding: 0 18px 40px;
        }

        .card {
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
            padding: 32px;
        }

        .header {
            margin-bottom: 24px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin: 10px 0 0;
            color: #475569;
            line-height: 1.75;
        }

        .back-link {
            display: inline-flex;
            margin-bottom: 22px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        .field.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 700;
            color: #1e293b;
        }

        input,
        textarea,
        select {
            width: 100%;
            min-height: 44px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            padding: 12px 14px;
            font-size: 15px;
            color: #0f172a;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .photo-preview {
            border-radius: 16px;
            overflow: hidden;
            max-width: 220px;
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
            gap: 12px;
            margin-top: 6px;
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

        @media (max-width: 700px) {
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