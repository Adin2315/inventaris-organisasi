<div class="p-4" x-data="{ isOpen: @entangle('isOpen'), confirmingDelete: @entangle('confirmingDelete') }">
    <!-- Filter & Search -->
    <div class="flex justify-between items-start mb-4">
        <div class="w-1/4 space-y-2">
            <input type="text" wire:model.debounce.500ms="search"
                   class="w-full px-3 py-2 border rounded"
                   placeholder="Cari transaksi...">
        </div>
        <div class="w-3/4 flex justify-end">
            <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Tambah Transaksi
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Anggota</th>
                    <th class="px-4 py-2 border">Barang</th>
                    <th class="px-4 py-2 border">Jumlah</th>
                    <th class="px-4 py-2 border">Tanggal Pinjam</th>
                    <th class="px-4 py-2 border">Tanggal Kembali</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $transaksi)
                    <tr>
                        <td class="border px-4 py-2">{{ $transaksi->anggota->nama ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->barang->nama_barang ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->tanggal_pinjam }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->tanggal_kembali }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->status }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <button wire:click="showEditForm({{ $transaksi->id }})" class="text-yellow-500 hover:underline">Edit</button>
                            <button wire:click="confirmDelete({{ $transaksi->id }})" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $transaksis->links() }}
    </div>

    <!-- Modal Form Tambah/Edit -->
    <div x-show="isOpen" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">{{ $transaksiId ? 'Edit Transaksi' : 'Tambah Transaksi' }}</h2>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label>Anggota</label>
                    <select wire:model.defer="anggota_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Anggota --</option>
                        @foreach($anggotas as $anggota)
                            <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                        @endforeach
                    </select>
                    @error('anggota_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Barang</label>
                    <select wire:model.defer="barang_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('barang_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Jumlah</label>
                    <input type="number" wire:model.defer="jumlah" class="w-full border rounded px-3 py-2">
                    @error('jumlah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Tanggal Pinjam</label>
                    <input type="date" wire:model.defer="tanggal_pinjam" class="w-full border rounded px-3 py-2">
                    @error('tanggal_pinjam') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Tanggal Kembali</label>
                    <input type="date" wire:model.defer="tanggal_kembali" class="w-full border rounded px-3 py-2">
                    @error('tanggal_kembali') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Status</label>
                    <select wire:model.defer="status" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Status --</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="dikembalikan">Dikembalikan</option>
                        <option value="hilang">Hilang</option>
                        <option value="rusak">Rusak</option>
                    </select>
                    @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $transaksiId ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div x-show="confirmingDelete" style="display: none;" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow p-6 w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Hapus Transaksi</h2>
            <p class="mb-4">Apakah Anda yakin ingin menghapus transaksi ini?</p>
            <div class="flex justify-end space-x-2">
                <button wire:click="$set('confirmingDelete', false)" class="px-4 py-2 rounded bg-gray-300">Batal</button>
                <button wire:click="delete" class="px-4 py-2 rounded bg-red-600 text-white">Hapus</button>
            </div>
        </div>
    </div>
</div>
