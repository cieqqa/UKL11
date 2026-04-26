@extends('layouts.app')

@section('content')

<h2>Dashboard Admin</h2>

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
<a href="/admin/jasa/create" class="btn btn-add">+ Tambah Jasa</a>
<a href="/admin/kategori/create" class="btn btn-add">+ Tambah Kategori</a>

<!-- DATA JASA -->
<div class="box">
    <h3>Data Jasa</h3>
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
            <td>{{ $j->kategori->nama_kategori ?? '-' }}</td>
            <td>Rp {{ $j->estimasi_harga }}</td>
            <td>{{ $j->kota }}</td>
            <td>
                <a href="/admin/jasa/{{ $j->id }}/edit" class="btn btn-edit">Edit</a>

                <form action="/admin/jasa/{{ $j->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Belum ada data</td>
        </tr>
        @endforelse
    </table>
</div>

<!-- DATA KATEGORI -->
<div class="box">
    <h3>Data Kategori</h3>
    <table>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        @forelse($kategori as $k)
        <tr>
            <td>{{ $k->nama_kategori }}</td>
            <td>
                <a href="/admin/kategori/{{ $k->id }}/edit" class="btn btn-edit">Edit</a>

                <form action="/admin/kategori/{{ $k->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">Belum ada kategori</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection