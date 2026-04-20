<h1>{{ $jasa->nama_jasa }}</h1>
<p>Harga: Rp {{ number_format($jasa->harga) }}</p>
<p>{{ $jasa->deskripsi }}</p>
<p>Kategori: {{ $jasa->kategori->nama_kategori ?? '-' }}</p>

<a href="/jasa">Kembali</a>