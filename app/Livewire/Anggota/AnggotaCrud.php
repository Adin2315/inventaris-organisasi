<?php

namespace App\Livewire\Anggota;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;

class AnggotaCrud extends Component
{
    use WithPagination;

    public $anggotaId;
    public $nama;
    public $jabatan;
    public $no_telepon;
    public $alamat;
    public $status;

    public $search = '';
    public $showForm = false;
    public $confirmingDelete = false;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'no_telepon' => 'nullable|string|max:20',
        'alamat' => 'nullable|string|max:255',
        'status' => 'required|in:aktif,non-aktif',
    ];

    public function render()
    {
        $anggotas = Anggota::where('nama', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.anggota.anggota-crud', compact('anggotas'));
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function showEditForm($id)
    {
        $anggota = Anggota::findOrFail($id);
        $this->anggotaId = $anggota->id;
        $this->nama = $anggota->nama;
        $this->jabatan = $anggota->jabatan;
        $this->no_telepon = $anggota->no_telepon;
        $this->alamat = $anggota->alamat;
        $this->status = $anggota->status;

        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        Anggota::updateOrCreate(
            ['id' => $this->anggotaId],
            [
                'nama' => $this->nama,
                'jabatan' => $this->jabatan,
                'no_telepon' => $this->no_telepon,
                'alamat' => $this->alamat,
                'status' => $this->status,
            ]
        );

        $this->showForm = false;
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->anggotaId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Anggota::findOrFail($this->anggotaId)->delete();
        $this->confirmingDelete = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['anggotaId', 'nama', 'jabatan', 'no_telepon', 'alamat', 'status']);
    }
}
