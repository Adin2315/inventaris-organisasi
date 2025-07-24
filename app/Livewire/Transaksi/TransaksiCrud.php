<?php

namespace App\Livewire\Transaksi;

use App\Models\Anggota;
use App\Models\Barang;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiCrud extends Component
{
    use WithPagination;

    public $transaksiId;
    public $barang_id, $anggota_id, $jumlah, $tanggal_pinjam, $tanggal_kembali, $status;
    public $isOpen = false;
    public $confirmingDelete = false;
    public $deleteId = null;
    protected $updatesQueryString = ['page'];


    protected $rules = [
        'barang_id' => 'required',
        'anggota_id' => 'required',
        'jumlah' => 'required|integer|min:1',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'status' => 'required|in:dipinjam,dikembalikan,hilang,rusak',
    ];

    public function render()
    {
        return view('livewire.transaksi.transaksi-crud', [
            'transaksis' => Transaksi::with(['barang', 'anggota', 'kategori'])->latest()->paginate(10),
            'barangs' => Barang::all(),
            'anggotas' => Anggota::all(),
        ]);
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->isOpen = false;
    }

    public function resetForm()
    {
        $this->transaksiId = null;
        $this->barang_id = '';
        $this->anggota_id = '';
        $this->jumlah = '';
        $this->tanggal_pinjam = '';
        $this->tanggal_kembali = '';
        $this->status = '';
    }

    public function save()
    {
        $this->validate();

        Transaksi::updateOrCreate(
            ['id' => $this->transaksiId],
            [
                'barang_id' => $this->barang_id,
                'anggota_id' => $this->anggota_id,
                'jumlah' => $this->jumlah,
                'tanggal_pinjam' => $this->tanggal_pinjam,
                'tanggal_kembali' => $this->tanggal_kembali,
                'status' => $this->status,
            ]
        );

        session()->flash('message', $this->transaksiId ? 'Transaksi berhasil diperbarui.' : 'Transaksi berhasil ditambahkan.');

        $this->closeModal();
    }


    public function showEditForm($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        if (!$transaksi) {
            session()->flash('error', 'Transaksi tidak ditemukan.');
            return;
        }

        $this->transaksiId = $transaksi->id;
        $this->barang_id = $transaksi->barang_id;
        $this->anggota_id = $transaksi->anggota_id;
        $this->jumlah = $transaksi->jumlah;
        $this->tanggal_pinjam = $transaksi->tanggal_pinjam;
        $this->tanggal_kembali = $transaksi->tanggal_kembali;
        $this->status = $transaksi->status;

        $this->isOpen = true;
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Transaksi::destroy($this->deleteId);
        $this->confirmingDelete = false;
        $this->deleteId = null;
        session()->flash('message', 'Transaksi berhasil dihapus.');
    }
}
