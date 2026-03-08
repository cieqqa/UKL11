<div class="container">

    <h3>Tambah Data Jasa</h3>
 <form action="{{ url('/jasa/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table>
            <tr>
                <td>Nama Jasa</td>
                <td><input type="text" name="nama_jasa" required></td>
            </tr>

            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" required></td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td><textarea name="deskripsi" rows="3" cols="25" required></textarea></td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori" required></td>
            </tr>

            <tr>
                <td>Kontak</td>
                <td><input type="text" name="kontak" required></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table>

    </form>

</div>
