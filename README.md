# POS Minimarket - CodeIgniter 4

Aplikasi Point of Sale (POS) untuk minimarket berbasis CodeIgniter 4.

## Fitur

### Kasir
- Login terpisah per role
- Transaksi POS dengan keranjang belanja
- Pencarian produk & scan barcode
- Pilih member pelanggan (poin otomatis)
- Metode bayar: Tunai, QRIS, GoPay, ShopeePay
- Cetak struk
- Riwayat transaksi

### Kepala Toko
- Dashboard dengan grafik & statistik
- Manajemen Produk (CRUD)
- Manajemen Kategori
- Manajemen Supplier
- Manajemen Stok (barang masuk)
- Manajemen Karyawan
- Data Pelanggan
- Laporan Penjualan (filter periode)
- Laporan Stok

## Instalasi

### Prasyarat
- PHP >= 8.1
- MySQL / MariaDB
- Composer
- Web Server (Apache/Nginx)

### Langkah Instalasi

1. **Extract** file zip ke folder htdocs (XAMPP) atau www (WAMP)

2. **Install dependensi** via Composer:
   ```bash
   composer install
   ```

3. **Import database** di phpMyAdmin:
   - Buat database baru: `db_pos_minimarket`
   - Import file: `db_pos_minimarket.sql`

4. **Konfigurasi environment**:
   - Salin `.env` (sudah ada), sesuaikan jika perlu:
   ```
   database.default.username = root
   database.default.password = (password MySQL Anda)
   ```

5. **Atur writable permissions**:
   ```bash
   chmod -R 777 writable/
   ```

6. **Akses aplikasi** di browser:
   ```
   http://localhost/pos_minimarket/public/
   ```

## Akun Default

| Username    | Password   | Role         |
|-------------|------------|--------------|
| budi_kepala | password   | Kepala Toko  |
| sari_kasir  | password   | Kasir        |
| andi_kasir  | password   | Kasir        |

## Struktur Database

- `karyawan` - Data dan akun karyawan
- `kategori` - Kategori produk
- `supplier` - Data supplier
- `produk` - Master data produk
- `pelanggan` - Data member pelanggan
- `transaksi_penjualan` - Header transaksi
- `detail_penjualan` - Detail item per transaksi
- `barang_masuk` - Pencatatan stok masuk
- `barang_keluar` - Pencatatan stok keluar
- `pembelian_stok` - Purchase order

## Tech Stack
- **Backend**: CodeIgniter 4.5
- **Frontend**: Bootstrap 5.3
- **Icons**: Bootstrap Icons
- **Charts**: Chart.js
- **Database**: MySQL / MariaDB
