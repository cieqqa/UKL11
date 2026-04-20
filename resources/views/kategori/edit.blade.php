<h2>Edit Kategori</h2>

<form action="/admin/kategori/{{ $kategori->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
    <button>Update</button>
</form>