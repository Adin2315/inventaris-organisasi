<?php

namespace App\Livewire\inventaris;

use Livewire\Component;
use App\Models\Barang;
use App\Models\KategoriBarang;
use Livewire\WithPagination;

class BarangCrud extends Component
{
    use WithPagination;

    public $search = '';
    public $barangId;
    public $nama_barang;
    public $stok;
    public $lokasi;
    public $kategori_barang_id;
    public $kondisi = 'baik';

    public $showForm = false;
    public $confirmingDelete = false;

    protected $rules = [
        'nama_barang' => 'required|string',
        'stok' => 'required|integer|min:1',
        'lokasi' => 'nullable|string',
        'kategori_barang_id' => 'required|exists:kategori_barangs,id',
        'kondisi' => 'required|in:baik,rusak,hilang',
    ];

    public function render()
    {
        $barangs = Barang::where('nama_barang', 'like', '%'.$this->search.'%')
            ->with('kategori')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $kategoriList = KategoriBarang::all();

        return view('livewire.inventaris.barang-crud', compact('barangs', 'kategoriList'));
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function showEditForm($id)
    {
        $barang = Barang::findOrFail($id);
        $this->barangId = $barang->id;
        $this->nama_barang = $barang->nama_barang;
        $this->stok = $barang->stok;
        $this->lokasi = $barang->lokasi;
        $this->kategori_barang_id = $barang->kategori_barang_id;
        $this->kondisi = $barang->kondisi;

        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        Barang::updateOrCreate(
            ['id' => $this->barangId],
            [
                'nama_barang' => $this->nama_barang,
                'stok' => $this->stok,
                'lokasi' => $this->lokasi,
                'kategori_barang_id' => $this->kategori_barang_id,
                'kondisi' => $this->kondisi,
            ]
        );

        $this->showForm = false;
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->barangId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Barang::findOrFail($this->barangId)->delete();
        $this->confirmingDelete = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['barangId', 'nama_barang', 'stok', 'lokasi', 'kategori_barang_id', 'kondisi']);
    }
}
