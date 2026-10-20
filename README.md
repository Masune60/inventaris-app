# Aplikasi Manajemen Inventaris Toko Komputer

Aplikasi web sederhana berbasis Laravel untuk mengelola data inventaris toko perlengkapan komputer. Aplikasi ini dilengkapi dengan sistem autentikasi, manajemen data kategori dan barang (CRUD), serta relasi database antar tabel.

---

## 🚀 Fitur Utama

- **Authentication System**: Melindungi halaman inventaris menggunakan middleware `auth` dan password hashing untuk keamanan sesi pengguna.
- **Relasi Database One-to-Many**: Relasi Eloquent antara `Category` (hasMany) dan `Item` (belongsTo).
- **CRUD Kategori**: Menambahkan, melihat, dan menghapus kategori dengan penanganan keamanan (ditolak jika kategori masih digunakan barang).
- **CRUD Barang**: Menambahkan, melihat, mengubah, dan menghapus barang beserta pemilihan kategori secara rinci.
- **Validasi Input Ketat**:
  - Nama kategori & nama barang wajib diisi.
  - Harga barang harus angka lebih besar dari nol.
  - Stok barang berupa bilangan bulat minimal nol.
  - Kategori harus valid dan tersedia di database.

---

## 🛠️ Persyaratan Sistem

- **PHP**: ^8.2
- **Composer**: Terinstal
- **Node.js**: v20+ atau v22+
- **Database**: MySQL / MariaDB

---

## ⚙️ Petunjuk Instalasi & Cara Menjalankan Project

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda:

### 1. Clone Repository
```bash
git clone [https://github.com/Masune60/inventaris-app.git](https://github.com/Masune60/inventaris-app.git)
cd inventaris-app
