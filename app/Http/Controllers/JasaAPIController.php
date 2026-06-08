<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JasaAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasa = Jasa::with(['kategori','owner'])->get();
        return response()->json($jasa, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'id_kategori' => 'required|integer|exists:kategori,id',
            'deskripsi' => 'required|string',
            'estimasi_harga' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'status_verif' => 'in:pending,disetujui,ditolak',
            'foto' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'owner_id' => 'nullable|integer|exists:users,id',
        ]);

        $jasa = Jasa::create($data);

        return response()->json($jasa, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jasa = Jasa::with(['kategori','owner'])->find($id);
        if (! $jasa) {
            return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($jasa, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jasa = Jasa::find($id);
        if (! $jasa) {
            return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'nama_usaha' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'kota' => 'sometimes|required|string|max:255',
            'id_kategori' => 'sometimes|required|integer|exists:kategori,id',
            'deskripsi' => 'sometimes|required|string',
            'estimasi_harga' => 'sometimes|required|string|max:255',
            'kontak' => 'sometimes|required|string|max:255',
            'status_verif' => 'sometimes|in:pending,disetujui,ditolak',
            'foto' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'owner_id' => 'nullable|integer|exists:users,id',
        ]);

        $jasa->update($data);

        return response()->json($jasa->fresh(), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jasa = Jasa::find($id);
        if (! $jasa) {
            return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
        }

        $jasa->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
