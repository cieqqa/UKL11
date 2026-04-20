<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jasa;
use App\Models\Kategori;

class JasaController extends Controller
{
    public function index()
    {
        $jasa = Jasa::with('kategori')->get();
        return view('jasa.index', compact('jasa'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('jasa.create', compact('kategori'));
    }

    public function show($id)
    {
        $jasa = Jasa::with('kategori')->findOrFail($id);
        return view('jasa.show', compact('jasa'));
    }

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

        return redirect('/jasa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jasa = Jasa::findOrFail($id);
        $kategori = Kategori::all();
        return view('jasa.edit', compact('jasa','kategori'));
    }

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

        return redirect('/jasa')->with('success', 'Jasa berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        Jasa::findOrFail($id)->delete();
        return redirect('/jasa')->with('success', 'Jasa berhasil dihapus!');
    }
}