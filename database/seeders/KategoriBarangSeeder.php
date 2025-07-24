<?php

namespace Database\Seeders;

use App\Models\KategoriBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Alat Besi', 'Elektronik', 'Tekstil', 'Dokumen', 'Kebersihan',
            'Alat Tulis', 'Audio', 'Olahraga', 'Medis', 'Lainnya'
        ];

        foreach ($kategori as $k) {
            KategoriBarang::create([
                'nama_kategori' => $k,
                'deskripsi' => 'Kategori untuk ' . $k
            ]);
        }
    }
}
