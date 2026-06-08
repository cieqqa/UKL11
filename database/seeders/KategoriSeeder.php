<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Pembersihan Ruangan'],
            ['nama_kategori' => 'Deep Cleaning'],
            ['nama_kategori' => 'AC Service'],
            ['nama_kategori' => 'Sofa and Carpet'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::updateOrCreate(['nama_kategori' => $kategori['nama_kategori']], $kategori);
        }
    }
}
