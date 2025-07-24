<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori', 'deskripsi'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
