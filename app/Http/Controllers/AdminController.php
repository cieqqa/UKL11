<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jasa = Jasa::with('kategori')->get();
        $kategori = Kategori::all();

        $stats = [
            'totalJasa' => Jasa::count(),
            'totalKategori' => Kategori::count(),
        ];

        return view('admin.dashboard', compact('jasa', 'kategori', 'stats'));
    }
}