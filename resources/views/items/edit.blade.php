<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang Inventaris') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Nama Barang --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nama Barang</label>
                        <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori Barang --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Kategori</label>
                        <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm @error('category_id') border-red-500 @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga Barang --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price', $item->price) }}" class="w-full border-gray-300 rounded-md shadow-sm @error('price') border-red-500 @enderror" required>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Stok Barang --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Stok</label>
                        <input type="number" name="stock" value="{{ old('stock', $item->stock) }}" class="w-full border-gray-300 rounded-md shadow-sm @error('stock') border-red-500 @enderror" required>
                        @error('stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-2 pt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Barang
                        </button>
                        <a href="{{ route('items.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>