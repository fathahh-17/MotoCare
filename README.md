# MotoCare — Aplikasi Manajemen Service Motor

Aplikasi berbasis Laravel 12 + MySQL untuk mengelola pelanggan, kendaraan, pendaftaran service, pengerjaan service, dan pembayaran.

## Kebutuhan
- PHP 8.2 atau lebih baru
- Composer
- MySQL/MariaDB (XAMPP)
- Git
- Postman (untuk pengujian API)

## Menjalankan project
1. Ekstrak folder project ke `C:\xampp\htdocs\MotoCare`.
2. Buka folder tersebut di VS Code.
3. Buat database MySQL bernama `motocare_db` melalui phpMyAdmin.
4. Salin `.env.example` menjadi `.env`.
5. Pastikan konfigurasi database pada `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=motocare_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Sesuaikan username/password bila MySQL kamu berbeda.
6. Jalankan:
   ```
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```
7. Buka `http://127.0.0.1:8000`.

Jika project sudah memiliki folder `vendor`, perintah `composer install` tetap aman untuk memastikan dependensi terpasang. Jangan jalankan `php artisan migrate:fresh` pada database yang sudah berisi data karena perintah tersebut menghapus seluruh tabel.

## Menu aplikasi
- Dashboard: ringkasan pelanggan, kendaraan, pendaftaran, pengerjaan, dan transaksi.
- Data Pelanggan: tambah, lihat, ubah, hapus.
- Data Kendaraan: tambah, lihat, ubah, hapus; jenis kendaraan memakai radio button.
- Daftar Service: memilih nomor plat dan ID pelanggan; nama pelanggan terisi otomatis.
- Data Service: memilih ID pendaftaran service; keluhan kendaraan terisi otomatis.
- Pembayaran: memilih ID pendaftaran service, jumlah biaya, jenis pembayaran Cash/Tunai atau Non Tunai, dan keterangan.

## API untuk Postman
Base URL saat menjalankan `php artisan serve`:
`http://127.0.0.1:8000/api`

Semua endpoint menerima dan mengembalikan JSON. Untuk POST/PUT pilih Body → raw → JSON dan header `Accept: application/json`, `Content-Type: application/json`.

| Resource | GET semua | GET detail | POST | PUT | DELETE |
|---|---|---|---|---|---|
| Pelanggan | `/pelanggan` | `/pelanggan/{id}` | `/pelanggan` | `/pelanggan/{id}` | `/pelanggan/{id}` |
| Kendaraan | `/kendaraan` | `/kendaraan/{id}` | `/kendaraan` | `/kendaraan/{id}` | `/kendaraan/{id}` |
| Daftar Service | `/daftar-service` | `/daftar-service/{id}` | `/daftar-service` | `/daftar-service/{id}` | `/daftar-service/{id}` |
| Data Service | `/data-service` | `/data-service/{id}` | `/data-service` | `/data-service/{id}` | `/data-service/{id}` |
| Pembayaran | `/pembayaran` | `/pembayaran/{id}` | `/pembayaran` | `/pembayaran/{id}` | `/pembayaran/{id}` |

### Contoh body JSON

**POST `/pelanggan`**
```json
{
  "nama_lengkap": "Budi Santoso",
  "no_hp": "081234567890",
  "alamat_pelanggan": "Takengon",
  "pekerjaan": "Wiraswasta"
}
```

**POST `/kendaraan`**
```json
{
  "no_plat": "BL 1234 AB",
  "jenis_kendaraan": "Matic",
  "no_stnk": "123456789",
  "tahun_pembuatan": 2022,
  "nama_pemilik": "Budi Santoso",
  "warna_kendaraan": "Hitam"
}
```

**POST `/daftar-service`**
```json
{
  "no_plat": "BL 1234 AB",
  "id_pelanggan": 1,
  "keluhan_kendaraan": "Mesin sulit dinyalakan",
  "tanggal_servis": "2026-11-19"
}
```

**POST `/data-service`**
```json
{
  "id_servis_pelanggan": 1,
  "estimasi_service": 150000,
  "nama_mekanik": "Andi",
  "sparepart_pengganti": "Busi"
}
```

**POST `/pembayaran`**
```json
{
  "id_servis_pelanggan": 1,
  "jumlah_biaya_servis": 150000,
  "jenis_pembayaran": "Cash / Tunai",
  "keterangan": "Lunas"
}
```

ID pada contoh harus disesuaikan dengan data yang benar-benar sudah ada di database. Urutan pengisian yang disarankan: pelanggan → kendaraan → daftar service → data service → pembayaran.

## Git: push dan clone
### Mengunggah project ke repository GitHub
Buat repository kosong di GitHub, lalu jalankan dari folder project:
```
git init
git add .
git commit -m "Initial MotoCare application"
git branch -M main
git remote add origin https://github.com/USERNAME/motocare.git
git push -u origin main
```
Ganti `USERNAME` dan URL dengan repository milik sendiri.

### Clone pada komputer lain
```
git clone https://github.com/USERNAME/motocare.git
cd motocare
composer install
copy .env.example .env
php artisan key:generate
```
Buat database `motocare_db`, sesuaikan `.env`, kemudian:
```
php artisan migrate
php artisan serve
```

## Catatan
- `.env` dan `vendor/` tidak disimpan ke Git. `.env` berisi konfigurasi lokal; `vendor/` dapat dibuat kembali dengan `composer install`.
- File `MotoCare.postman_collection.json` dapat diimpor langsung ke Postman.
- File `database/motocare_schema.sql` adalah skrip struktur tabel inti, bukan dump data transaksi dari database lokal. Untuk backup lengkap beserta data, gunakan Export pada phpMyAdmin.
