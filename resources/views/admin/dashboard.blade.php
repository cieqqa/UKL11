<x-app-layout>

<style>

body{
    background:#f4f7fb;
    font-family:Arial, Helvetica, sans-serif;
}

.container{
    padding:40px;
}

.title{
    font-size:35px;
    font-weight:bold;
    color:#2563eb;
    margin-bottom:30px;
}

/* CARD */

.card-container{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:25px;
    margin-bottom:40px;
}

.card{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.card p{
    color:#666;
    margin-bottom:10px;
}

.card h2{
    font-size:40px;
    color:#2563eb;
}

/* BUTTON */

.button-group{
    margin-bottom:30px;
}

.btn{
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-weight:bold;
    margin-right:10px;
}

.blue{
    background:#2563eb;
}

.green{
    background:#16a34a;
}

/* TABLE */

.table-container{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    margin-bottom:40px;
}

.table-container h2{
    margin-bottom:20px;
    color:#222;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#2563eb;
    color:white;
    padding:15px;
    text-align:left;
}

table td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.edit{
    background:orange;
    color:white;
    padding:8px 12px;
    border-radius:8px;
    text-decoration:none;
}

.delete{
    background:red;
    color:white;
    padding:8px 12px;
    border:none;
    border-radius:8px;
}

</style>

<div class="container">

    <div class="title">
        Dashboard Admin
    </div>

    <!-- CARD -->
    <div class="card-container">

        <div class="card">
            <p>Total Jasa</p>
            <h2>{{ $stats['totalJasa'] }}</h2>
        </div>

        <div class="card">
            <p>Total Kategori</p>
            <h2>{{ $stats['totalKategori'] }}</h2>
        </div>

    </div>

    <!-- BUTTON -->
    <div class="button-group">

        <a href="/admin/jasa/create" class="btn blue">
            + Tambah Jasa
        </a>

        <a href="/admin/kategori/create" class="btn green">
            + Tambah Kategori
        </a>

    </div>

    <!-- DATA JASA -->
    <div class="table-container">

        <h2>Data Jasa</h2>

        <table>

            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>

            @forelse($jasa as $j)

            <tr>

                <td>{{ $j->nama_usaha }}</td>

                <td>
                    {{ $j->kategori->nama_kategori ?? '-' }}
                </td>

                <td>
                    Rp {{ number_format($j->estimasi_harga) }}
                </td>

                <td>{{ $j->kota }}</td>

                <td>

                    <a href="/admin/jasa/{{ $j->id }}/edit"
                       class="edit">
                       Edit
                    </a>

                    <form action="/admin/jasa/{{ $j->id }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="delete">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5">
                    Belum ada data
                </td>
            </tr>

            @endforelse

        </table>

    </div>
<!-- DATA KATEGORI -->

<div class="table-container">

    <h2>Data Kategori</h2>

    <table>

        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        @forelse($kategori as $k)

        <tr>

            <td>{{ $k->nama_kategori }}</td>

            <td>

                <a href="/admin/kategori/{{ $k->id }}/edit"
                   class="edit">
                   Edit
                </a>

                <form action="/admin/kategori/{{ $k->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="delete">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="2">
                Belum ada kategori
            </td>
        </tr>

        @endforelse

    </table>

</div>
</div>

</x-app-layout>