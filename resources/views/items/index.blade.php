<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Barang Inventaris') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Pesan Notifikasi --}}
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-6 flex justify-between items-center">
                    <a href="{{ route('items.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Barang
                    </a>
                    <a href="{{ route('categories.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kelola Kategori
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 border-r w-12">NO</th>
                                <th class="px-6 py-3 border-r">NAMA BARANG</th>
                                <th class="px-6 py-3 border-r">KATEGORI</th>
                                <th class="px-6 py-3 border-r">HARGA</th>
                                <th class="px-6 py-3 border-r">STOK</th>
                                <th class="px-6 py-3 text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $index => $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 border-r font-medium text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 border-r font-semibold text-gray-800">{{ $item->name }}</td>
                                    <td class="px-6 py-4 border-r">{{ $item->category->name ?? '-' }}</td>
                                    <td class="px-6 py-4 border-r">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 border-r">{{ $item->stock }}</td>
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('items.edit', $item->id) }}" class="text-blue-600 hover:underline font-medium">Edit</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline font-medium">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data barang.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>