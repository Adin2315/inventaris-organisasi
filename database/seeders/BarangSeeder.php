<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Barang::create([
                'nama_barang' => "Barang $i",
                'stok' => rand(5, 30),
                'lokasi' => "Gudang " . chr(64 + $i),
                'kategori_barang_id' => rand(1, 10),
                'kondisi' => ['baik', 'rusak', 'hilang'][rand(0, 2)],
            ]);
        }
    }
}
