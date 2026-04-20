<h2>Data Kategori</h2>

<a href="/admin/kategori/create">+ Tambah</a>

<table border="1">
@foreach($kategori as $k)
<tr>
    <td>{{ $k->nama_kategori }}</td>
    <td>
        <a href="/admin/kategori/{{ $k->id }}/edit">Edit</a>

        <form action="/admin/kategori/{{ $k->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>