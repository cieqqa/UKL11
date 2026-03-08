<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jasa</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f2f2f2;
        }

        .container{
            width:90%;
            margin:30px auto;
            background:white;
            padding:20px;
            border-radius:8px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid #ccc;
        }

        th{
            background:#eee;
        }

        th,td{
            padding:10px;
            text-align:left;
        }

        .harga{
            color:green;
            font-weight:bold;
        }

        .aksi{
            display:flex;
            gap:8px;
            justify-content:center;
        }

        .btn{
            padding:6px 12px;
            border-radius:4px;
            border:none;
            font-size:14px;
            font-weight:bold;
            cursor:pointer;
            text-decoration:none;
            display:inline-block;
        }

        .btn-add{
            background:#4CAF50;
            color:white;
            margin-bottom:15px;
        }

        .btn-edit{
            background:#2196F3;
            color:white;
        }

        .btn-delete{
            background:#f44336;
            color:white;
        }

        .btn:hover{
            opacity:0.85;
        }
    </style>
</head>

<body>

    <div class="container">

    <h2>Data Jasa</h2>

    <a href="{{ url('/jasa/add') }}" class="btn btn-add">
    + Tambah Jasa
    </a>

    <table>

    <thead>
    <tr>
    <th>No</th>
    <th>Nama Usaha</th>
    <th>Kategori</th>
    <th>Kota</th>
    <th>Estimasi Harga</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    </thead>

    <tbody>

    @forelse ($jasa as $j)

    <tr>
    <td>{{ $loop->iteration }}</td>

    <td>{{ $j->nama_usaha }}</td>

    <td>
    {{ $j->kategori->nama_kategori ?? '-' }}
    </td>

    <td>{{ $j->kota }}</td>

    <td class="harga">
    Rp {{ number_format($j->estimasi_harga,0,',','.') }}
    </td>

    <td>{{ $j->status_verif }}</td>

    <td class="aksi">

    <a href="{{ url('/jasa/edit/'.$j->id) }}" class="btn btn-edit">
    Edit
    </a>

    <a href="{{ url('/jasa/delete/'.$j->id) }}"
    class="btn btn-delete"
    onclick="return confirm('Hapus jasa ini?')">
    Hapus
    </a>

    </td>

    </tr>

    @empty

    <tr>
    <td colspan="7" style="text-align:center;">
    Data jasa belum ada
    </td>
    </tr>

    @endforelse

    </tbody>

    </table>

</div>

</body>
</html>