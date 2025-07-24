<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Anggota::create([
                'nama' => "Anggota $i",
                'jabatan' => ['Ketua', 'Wakil', 'Sekretaris', 'Bendahara', 'Anggota'][rand(0, 4)],
                'no_telepon' => '08123' . rand(100000, 999999),
                'alamat' => "Jalan Nomor $i, Kota ABC",
                'status' => ['aktif', 'non-aktif'][rand(0, 1)],
            ]);
        }
    }
}
