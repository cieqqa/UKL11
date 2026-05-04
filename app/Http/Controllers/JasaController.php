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
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $data = [
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
            'status_verif'   => 'pending',
            'rating'         => 0
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $folder = public_path('uploads/jasa');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($folder, $filename);
            $data['foto'] = 'uploads/jasa/' . $filename;
        }

        Jasa::create($data);

        return redirect('/admin')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jasa = Jasa::findOrFail($id);
        $kategori = Kategori::all();
        return view('jasa.edit', compact('jasa', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $jasa = Jasa::findOrFail($id);

        $request->validate([
            'nama_usaha'      => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'id_kategori'     => 'required',
            'deskripsi'       => 'required',
            'estimasi_harga'  => 'required',
            'kontak'          => 'required',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $folder = public_path('uploads/jasa');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($folder, $filename);
            // hapus file lama jika ada
            if ($jasa->foto && file_exists(public_path($jasa->foto))) {
                @unlink(public_path($jasa->foto));
            }
            $data['foto'] = 'uploads/jasa/' . $filename;
        }

        $jasa->update($data);

        return redirect('/admin')
            ->with('success', 'Jasa berhasil diupdate!');
    }

    public function destroy($id)
    {
        Jasa::findOrFail($id)->delete();

        return redirect('/admin')
            ->with('success', 'Jasa berhasil dihapus!');
    }
}