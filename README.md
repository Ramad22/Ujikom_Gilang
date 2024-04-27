## Tentang Aplikasi
Aplikasi Kasir Toko Abadi ini dibuat untuk melakukan pendataan dan transaksi di sebuah Toko dengan tujuan untuk mempermudah pengelolaan pendataan barang dan transaksi penjualan. Dengan aplikasi ini, pemilik atau pengelola warung dapat mencatat masuk dan keluarnya barang secara sistematis, serta mengelola transaksi penjualan dengan lebih efisien.

### Beberapa Fitur yang tersedia:
- Mengelola Barang
  - Menambah (Create)
  - Mengubah (Update)
  - Menghapus (Delete)
  - Menampilkan (Show)
- Pengaturan Pengguna
- Peran (Admin, Petugas)
- Mengelola Pelanggan
  - Menambah (Create)
  - Mengubah (Update)
  - Menghapus (Delete)
  - Menampilkan (Show)
- Mengelola Diskon
  - Menambah (Create)
  - Mengubah (Update)
- Transaksi
  - Pemesanan (Order)
  - Pembayaran (Bayar)
- Laporan Stok
  - Print laporan
- Dashboard
Menampilkan jumlah keseluruhan data barang, akun petugas, dan informasi penjualan secara ringkas.

## Instalasi
#### Via Git
```bash
git clone https://github.com/Ramad22/Ujikom_Gilang.git

##### Setup Aplikasi
1. Copy file '.env':
    cp .env.example .env
2. Konfigurasi File .env:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kasir_ujikom
    DB_USERNAME=root
    DB_PASSWORD=
3. Generete Key Aplikasi:
    php artisan key:generate
4. Migrate Database:
    php artisan migrate
5. Seeder Tabel User dan Pengaturan:
    php artisan db:seed --class=UserSeeder
6. Menajalankan Aplikasi:
    php artisan serve



