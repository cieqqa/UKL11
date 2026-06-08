<?php

namespace Database\Seeders;

use App\Models\Jasa;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JasaSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            'Pembersihan Ruangan',
            'Deep Cleaning',
            'AC Service',
            'Sofa and Carpet',
        ];

        foreach ($categories as $namaKategori) {
            Kategori::firstOrCreate(['nama_kategori' => $namaKategori]);
        }

        $samples = [
            [
                'nama_usaha' => 'PT Bersih Sejahtera',
                'alamat' => 'Jl. Melati No. 12, Jakarta',
                'kota' => 'Jakarta',
                'id_kategori' => Kategori::where('nama_kategori', 'Pembersihan Ruangan')->first()->id,
                'deskripsi' => 'Pembersihan rumah dan kantor dengan tim profesional.',
                'estimasi_harga' => '150000',
                'kontak' => '081234567890',
                'status_verif' => 'disetujui',
                'foto' => null,
                'rating' => 4.8,
            ],
            [
                'nama_usaha' => 'CV Rumah Cemerlang',
                'alamat' => 'Jl. Sudirman No. 45, Bandung',
                'kota' => 'Bandung',
                'id_kategori' => Kategori::where('nama_kategori', 'Deep Cleaning')->first()->id,
                'deskripsi' => 'Deep cleaning untuk segala jenis bangunan dan perabotan.',
                'estimasi_harga' => '200000',
                'kontak' => '082345678901',
                'status_verif' => 'disetujui',
                'foto' => null,
                'rating' => 4.9,
            ],
            [
                'nama_usaha' => 'Budi Cooling Service',
                'alamat' => 'Jl. Merdeka No. 88, Surabaya',
                'kota' => 'Surabaya',
                'id_kategori' => Kategori::where('nama_kategori', 'AC Service')->first()->id,
                'deskripsi' => 'Servis dan perawatan AC untuk rumah dan kantor.',
                'estimasi_harga' => '250000',
                'kontak' => '083456789012',
                'status_verif' => 'disetujui',
                'foto' => null,
                'rating' => 4.7,
            ],
            [
                'nama_usaha' => 'Toko Sofa Siap',
                'alamat' => 'Jl. Pemuda No. 27, Medan',
                'kota' => 'Medan',
                'id_kategori' => Kategori::where('nama_kategori', 'Sofa and Carpet')->first()->id,
                'deskripsi' => 'Pembersihan sofa, kursi, dan karpet dengan teknik modern.',
                'estimasi_harga' => '300000',
                'kontak' => '084567890123',
                'status_verif' => 'disetujui',
                'foto' => null,
                'rating' => 4.6,
            ],
        ];

        foreach ($samples as $sample) {
            Jasa::updateOrCreate(
                ['nama_usaha' => $sample['nama_usaha']],
                $sample
            );
        }
    }
}
