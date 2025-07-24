<div class="p-4" x-data="{ showForm: @entangle('showForm'), confirmingDelete: @entangle('confirmingDelete') }">
    <!-- Filter & Search -->
    <div class="flex justify-between items-start mb-4">
        <div class="w-1/4 space-y-2">
            <input type="text" wire:model.debounce.500ms="search"
                   class="w-full px-3 py-2 border rounded"
                   placeholder="Cari barang...">
        </div>
        <div class="w-3/4 flex justify-end">
            <button @click="showForm = true" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Tambah Barang
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Kondisi</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                    <th class="px-4 py-2 border">Dibuat</th>
                    <th class="px-4 py-2 border">Diubah</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td class="border px-4 py-2 capitalize">{{ $barang->kondisi }}</td>
                        <td class="border px-4 py-2">{{ $barang->stok }}</td>
                        <td class="border px-4 py-2">{{ $barang->lokasi }}</td>
                        <td class="border px-4 py-2">{{ $barang->created_at->format('d-m-Y H:i') }}</td>
                        <td class="border px-4 py-2">{{ $barang->updated_at->format('d-m-Y H:i') }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <button wire:click="showEditForm({{ $barang->id }})" class="text-yellow-500 hover:underline">Edit</button>
                            <button wire:click="confirmDelete({{ $barang->id }})" class="text-red-600 hover:underline">Hapus</button>
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
        {{ $barangs->links() }}
    </div>

    <!-- Modal Form Tambah/Edit -->
    <div x-show="showForm" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">{{ $barangId ? 'Edit Barang' : 'Tambah Barang' }}</h2>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label>Nama Barang</label>
                    <input type="text" wire:model.defer="nama_barang" class="w-full border rounded px-3 py-2">
                    @error('nama_barang') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Stok</label>
                    <input type="number" wire:model.defer="stok" class="w-full border rounded px-3 py-2">
                    @error('stok') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" wire:model.defer="lokasi" class="w-full border rounded px-3 py-2">
                    @error('lokasi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Kategori</label>
                    <select wire:model.defer="kategori_barang_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_barang_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Kondisi</label>
                    <select wire:model.defer="kondisi" class="w-full border rounded px-3 py-2">
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                        <option value="hilang">Hilang</option>
                    </select>
                    @error('kondisi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" @click="showForm = false" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $barangId ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div x-show="confirmingDelete" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Hapus Barang</h2>
            <p class="mb-4">Apakah Anda yakin ingin menghapus barang ini?</p>
            <div class="flex justify-end space-x-2">
                <button @click="confirmingDelete = false" class="px-4 py-2 rounded bg-gray-300">Batal</button>
                <button wire:click="delete" class="px-4 py-2 rounded bg-red-600 text-white">Hapus</button>
            </div>
        </div>
    </div>
</div>
