<div class="p-4">
    <div class="flex justify-between mb-4">
        <input type="text" wire:model.debounce.300ms="search"
               class="border rounded px-3 py-2 w-1/3" placeholder="Cari Kategori...">
        <button wire:click="showCreateForm" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
            + Tambah Kategori
        </button>
    </div>

    <!-- Table -->
    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border p-2">#</th>
                <th class="border p-2">Nama Kategori</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $index => $kategori)
                <tr wire:key="kategori-{{ $kategori->id }}">
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $kategori->nama_kategori }}</td>
                    <td class="border p-2">
                        <button wire:click="showEditForm({{ $kategori->id }})"
                                class="text-yellow-600 hover:underline">Edit</button>
                        <button wire:click="confirmDelete({{ $kategori->id }})"
                                class="text-red-600 hover:underline ml-2">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $kategoris->links() }}
    </div>

    <!-- Form Modal -->
    @if ($showForm)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">{{ $kategoriId ? 'Edit Kategori' : 'Tambah Kategori' }}</h2>
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label class="block mb-1">Nama Kategori</label>
                        <input type="text" wire:model="nama_kategori" class="border px-3 py-2 rounded w-full">
                        @error('nama_kategori') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" wire:click="$set('showForm', false)"
                                class="px-4 py-2 border rounded">Batal</button>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow max-w-sm w-full">
                <p class="mb-4">Yakin ingin menghapus kategori ini?</p>
                <div class="flex justify-end gap-2">
                    <button wire:click="$set('confirmingDelete', false)"
                            class="px-4 py-2 border rounded">Batal</button>
                    <button wire:click="delete"
                            class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
                </div>
            </div>
        </div>
    @endif
</div>
