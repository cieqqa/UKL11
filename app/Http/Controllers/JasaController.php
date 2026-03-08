<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jasa;
use App\Models\Kategori;

class JasaController extends Controller
{
    // List data jasa
    public function index()
    {
        $jasa = Jasa::with('kategori')->get();
        return view('ukl11.index', compact('jasa'));
    }

    // Form tambah jasa
    public function add()
    {
        $kategori = Kategori::all();
        return view('ukl11.add', compact('kategori'));
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha'      => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'id_kategori'     => 'required',
            'deskripsi'       => 'required',
            'estimasi_harga'  => 'required',
            'kontak'          => 'required',
        ]);

        Jasa::create([
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
            'status_verif'   => 'pending',
            'rating'         => 0
        ]);

        return redirect('/')->with('success', 'Jasa berhasil ditambahkan!');
    }

    // Edit
    public function edit($id)
    {
        $jasa = Jasa::findOrFail($id);
        $kategori = Kategori::all();
        return view('ukl11.edit', compact('jasa','kategori'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $jasa = Jasa::findOrFail($id);

        $jasa->update([
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
        ]);

        return redirect('/')->with('success', 'Jasa berhasil diupdate!');
    }

    // Hapus
    public function destroy($id)
    {
        Jasa::findOrFail($id)->delete();
        return redirect('/')->with('success', 'Jasa berhasil dihapus!');
    }
}