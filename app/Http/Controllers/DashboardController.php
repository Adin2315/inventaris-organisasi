<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $barangGroup = Barang::select('nama_barang')
            ->selectRaw('SUM(stok) as total')
            ->groupBy('nama_barang')
            ->get();

        $barangChart = [
            'labels' => $barangGroup->pluck('nama_barang'),
            'data' => $barangGroup->pluck('total'),
        ];

        $transaksiGroup = Transaksi::select('status')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('status')
            ->get();

        $transaksiChart = [
            'labels' => $transaksiGroup->pluck('status'),
            'data' => $transaksiGroup->pluck('total'),
        ];

        return view('dashboard', [
            'jumlah_barang' => Barang::count(),
            'jumlah_kategori' => KategoriBarang::count(),
            'jumlah_anggota' => Anggota::count(),
            'jumlah_transaksi' => Transaksi::count(),

            'barangChart' => $barangChart,
            'transaksiChart' => $transaksiChart,
        ]);
    }

}
