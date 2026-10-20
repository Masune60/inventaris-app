<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Menampilkan daftar barang beserta nama kategorinya
    public function index()
    {
        // Menggunakan eager loading (with) agar efisien dan menampilkan nama kategori
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        // Validasi input sesuai aturan ujian
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Harus ada di tabel categories
            'price'       => 'required|numeric|gt:0',         // Angka > 0
            'stock'       => 'required|integer|min:0',       // Bilangan bulat >= 0
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form edit barang
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    // Mengubah data barang
    public function update(Request $request, Item $item)
    {
        // Validasi input
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|gt:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // Menghapus data barang
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
