<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Anggota\AnggotaCrud;
use App\Livewire\inventaris\BarangCrud;
use App\Livewire\Inventaris\KategoriCrud;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Transaksi\TransaksiCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('barang', BarangCrud::class)->name('barang.index');
    Route::get('kategori', KategoriCrud::class)->name('kategori.index');
    Route::get('anggota', AnggotaCrud::class)->name('anggota.index');
    Route::get('transaksi',TransaksiCrud::class)->name('transaksi.index');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
