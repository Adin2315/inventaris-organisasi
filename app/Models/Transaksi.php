<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id', 'anggota_id', 'jumlah',
        'tanggal_pinjam', 'tanggal_kembali', 'status'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id');
    }
}
