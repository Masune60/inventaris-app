<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kategori Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-bold mb-4">Tambah Kategori Baru</h3>
                <form action="{{ route('categories.store') }}" method="POST" class="flex gap-4">
                    @csrf
                    <div class="flex-1">
                        <input type="text" name="name" placeholder="Nama Kategori" class="w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan
                    </button>
                </form>
            </div>

            <div class="bg-white p-6 shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Daftar Kategori</h3>
                    <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline font-medium">
                        &larr; Kembali ke Daftar Barang
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 border-r w-12">NO</th>
                                <th class="px-6 py-3 border-r">NAMA KATEGORI</th>
                                <th class="px-6 py-3 text-center w-32">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $index => $category)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 border-r font-medium text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 border-r font-semibold text-gray-800">{{ $category->name }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline font-medium">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>