<h2>Tambah Kategori</h2>

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <input type="text" name="nama_kategori">
    <button>Simpan</button>
</form>