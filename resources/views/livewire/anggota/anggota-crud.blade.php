<div class="p-4" x-data
="{ showForm: @entangle('showForm'), confirmingDelete: @entangle('confirmingDelete') }">
    <div class="flex justify-between items-start mb-4">
        <div class="w-1/4 space-y-2">
            <input type="text" wire:model.debounce.500ms="search"
                   class="w-full px-3 py-2 border rounded"
                   placeholder="Cari anggota...">
        </div>
        <div class="w-3/4 flex justify-end">
            <button @click="showForm = true" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Tambah Anggota
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Jabatan</th>
                    <th class="px-4 py-2 border">No Telepon</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Dibuat</th>
                    <th class="px-4 py-2 border">Diubah</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggotas as $anggota)
                    <tr>
                        <td class="border px-4 py-2">{{ $anggota->nama }}</td>
                        <td class="border px-4 py-2">{{ $anggota->jabatan }}</td>
                        <td class="border px-4 py-2">{{ $anggota->no_telepon }}</td>
                        <td class="border px-4 py-2">{{ $anggota->alamat }}</td>
                        <td class="border px-4 py-2">{{ $anggota->status }}</td>
                        <td class="border px-4 py-2">{{ $anggota->created_at->format('d-m-Y H:i') }}</td>
                        <td class="border px-4 py-2">{{ $anggota->updated_at->format('d-m-Y H:i') }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <button wire:click="showEditForm({{ $anggota->id }})" class="text-yellow-500 hover:underline">Edit</button>
                            <button wire:click="confirmDelete({{ $anggota->id }})" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $anggotas->links() }}
    </div>

    <!-- Modal Form Tambah/Edit -->
    <div x-show="showForm" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">{{ $anggotaId ? 'Edit Anggota' : 'Tambah Anggota' }}</h2>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label>Nama</label>
                    <input type="text" wire:model.defer="nama" class="w-full border rounded px-3 py-2">
                    @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Jabatan</label>
                    <input type="text" wire:model.defer="jabatan" class="w-full border rounded px-3 py-2">
                    @error('jabatan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>No Telepon</label>
                    <input type="text" wire:model.defer="no_telepon" class="w-full border rounded px-3 py-2">
                    @error('no_telepon') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Alamat</label>
                    <textarea wire:model.defer="alamat" class="w-full border rounded px-3 py-2"></textarea>
                    @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Status</label>
                    <select wire:model.defer="status" class="w-full border rounded px-3 py-2">
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                    @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" @click="showForm = false" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $anggotaId ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div x-show="confirmingDelete" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Hapus Anggota</h2>
            <p class="mb-4">Apakah Anda yakin ingin menghapus anggota ini?</p>
            <div class="flex justify-end space-x-2">
                <button @click="confirmingDelete = false" class="px-4 py-2 rounded bg-gray-300">Batal</button>
                <button wire:click="delete" class="px-4 py-2 rounded bg-red-600 text-white">Hapus</button>
            </div>
        </div>
    </div>
</div>
