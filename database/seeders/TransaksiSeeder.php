<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
        Transaksi::create([
                'barang_id' => rand(1, 10),
                'anggota_id' => rand(1, 10),
                'jumlah' => rand(1, 5),
                'tanggal_pinjam' => now()->subDays(rand(1, 10)),
                'tanggal_kembali' => now()->addDays(rand(1, 10)),
                'status' => ['dipinjam', 'dikembalikan', 'hilang', 'rusak'][rand(0, 3)],
            ]);
        }
    }
}
