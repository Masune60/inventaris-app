<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Pengguna
        User::create([
            'name' => 'Admin Inventaris',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Tiga Kategori
        $aksesori = Category::create(['name' => 'Aksesori']);
        $perangkat = Category::create(['name' => 'Perangkat Komputer']);
        $penyimpanan = Category::create(['name' => 'Penyimpanan']);

        // 3. Lima Barang
        Item::create([
            'category_id' => $aksesori->id,
            'name' => 'Keyboard',
            'price' => 150000,
            'stock' => 10,
        ]);
        Item::create([
            'category_id' => $aksesori->id,
            'name' => 'Mouse',
            'price' => 75000,
            'stock' => 20,
        ]);
        Item::create([
            'category_id' => $perangkat->id,
            'name' => 'Monitor',
            'price' => 1500000,
            'stock' => 5,
        ]);
        Item::create([
            'category_id' => $aksesori->id,
            'name' => 'Headset',
            'price' => 250000,
            'stock' => 8,
        ]);
        Item::create([
            'category_id' => $penyimpanan->id,
            'name' => 'Flashdisk',
            'price' => 85000,
            'stock' => 15,
        ]);
    }
}
