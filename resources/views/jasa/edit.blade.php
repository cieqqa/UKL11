<h3>Edit Data Jasa</h3>

<form action="{{ url('/jasa/update/'.$jasa->id) }}" method="POST">
    @csrf

    <table>
        <tr>
            <td>Nama Jasa</td>
            <td><input type="text" name="nama_jasa" value="{{ $jasa->nama_jasa }}" required></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value="{{ $jasa->harga }}" required></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="deskripsi" required>{{ $jasa->deskripsi }}</textarea></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><input type="text" name="kategori" value="{{ $jasa->kategori }}" required></td>
        </tr>
        <tr>
            <td>Kontak</td>
            <td><input type="text" name="kontak" value="{{ $jasa->kontak }}" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">UPDATE</button></td>
        </tr>
    </table>
</form>