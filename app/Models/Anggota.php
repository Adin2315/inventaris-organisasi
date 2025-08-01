<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan', 'no_telepon', 'alamat', 'status'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
