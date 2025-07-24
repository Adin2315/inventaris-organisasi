<?php

namespace App\Livewire\Inventaris;

use App\Models\KategoriBarang;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriCrud extends Component
{
    use WithPagination;

    public $search = '';
    public $kategoriId;
    public $nama_kategori;

    public $showForm = false;
    public $confirmingDelete = false;

    protected $rules = [
        'nama_kategori' => 'required|string|max:100',
    ];

    public function render()
    {
        $kategoris = KategoriBarang::where('nama_kategori', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.inventaris.kategori-crud', compact('kategoris'));
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function showEditForm($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $this->kategoriId = $kategori->id;
        $this->nama_kategori = $kategori->nama_kategori;

        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        KategoriBarang::updateOrCreate(
            ['id' => $this->kategoriId],
            ['nama_kategori' => $this->nama_kategori]
        );

        $this->showForm = false;
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->kategoriId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        KategoriBarang::findOrFail($this->kategoriId)->delete();
        $this->confirmingDelete = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['kategoriId', 'nama_kategori']);
    }
}
