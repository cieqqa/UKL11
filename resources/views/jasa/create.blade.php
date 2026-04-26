<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jasa</title>

    <style>
        body {
            background: #eef4ff;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h3 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px 5px;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #2563eb;
        }

        button {
            background: #2563eb;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #1d4ed8;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            color: #2563eb;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

  <a href="{{ route('jasa.index') }}">← Kembali</a>

    <h3>Tambah Data Jasa</h3>

    <form action="{{ route('jasa.store') }}" method="POST">
        @csrf

        <table>
            <tr>
                <td>Nama Usaha</td>
                <td><input type="text" name="nama_usaha" required></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>

            <tr>
                <td>Kota</td>
                <td><input type="text" name="kota" required></td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>
                    <select name="id_kategori">
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td><textarea name="deskripsi" required></textarea></td>
            </tr>

            <tr>
                <td>Estimasi Harga</td>
                <td><input type="number" name="estimasi_harga" required></td>
            </tr>

            <tr>
                <td>Kontak</td>
                <td><input type="text" name="kontak" required></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit">SIMPAN DATA</button>
                </td>
            </tr>
        </table>

    </form>

</div>

</body>
</html>