# Proyek Laravel

Ini adalah Tes Seleksi berbasis Laravel. Di Tunjukan Untuk Tes DisKominfo

## Persyaratan

Untuk menjalankan proyek ini, Anda memerlukan:

- PHP >= 7.4
- Composer
- Node.js & npm
- MySQL atau database lain yang didukung Laravel

## Instalasi

Berikut langkah-langkah untuk menginstal dan menjalankan proyek ini di komputer Anda.

### 1. Clone Repository

Clone repository proyek ini ke komputer lokal Anda:

```bash
git clone https://github.com/AinunMahendra/Tes-Dikominfo.git
cd Tes-Dikominfo
```

### 2. Install Dependencies

Jalankan perintah berikut untuk menginstal semua dependency PHP dan Node.js:

```bash
composer install
npm install
```

### 3. Menyiapkan File Konfigurasi `.env`

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Setelah itu, buka file `.env` dan sesuaikan konfigurasi database:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=username_mysql_anda
DB_PASSWORD=password_mysql_anda
```

### 4. Generate Application Key

Laravel memerlukan application key yang unik untuk setiap proyek. Untuk membuat key baru, jalankan perintah berikut:

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

Untuk membuat tabel di database sesuai dengan skema yang ada di proyek ini, jalankan perintah:

```bash
php artisan migrate -seed
dan 
 
```

Jika Anda juga perlu mengisi beberapa data awal (seeder), jalankan perintah berikut:

```bash
php artisan db:seed
dan ini
php artisan db:seed --class=NewOrdersTableSeeder
```

### 6. Menjalankan Server Development

Setelah semua konfigurasi selesai, Anda bisa menjalankan server Laravel dengan perintah:

```bash
php artisan serve
```

Server Laravel akan berjalan di `http://localhost:8000`. Anda bisa membuka browser dan mengakses URL tersebut.

### 7. Jika terkendala masalah Route (Jika Diperlukan)

Jika proyek ini terkendala route 404 atau tidak bisa akses endpoint API untuk mengompilasi resouce tersebut disarankan melakukan ini:

```bash
php artisan optimize
php artisan config:clear
php artisan route:clear
```


## Fitur

1. **CRUD Produk**: Aplikasi ini memungkinkan untuk membuat, membaca, memperbarui, dan menghapus produk.
2. **Manajemen Order**: Anda dapat membuat order yang berisi beberapa produk.
3. **Pivot Table**: Hubungan antara order dan produk disimpan dalam pivot table.

## Cara Penggunaan

1. Setelah menjalankan `php artisan serve`, buka browser dan akses aplikasi melalui `http://localhost:8000`.
2. Gunakan Postman atau antarmuka lain untuk mengakses API berikut:
   - **GET /api/produk**: 
   - **GET /api/orders**: 

## Penanganan Error

- **400 Bad Request**: Jika input tidak valid, Anda akan menerima pesan kesalahan dengan detail.
- **404 Not Found**: Jika resource (produk atau order) tidak ditemukan.
- **500 Internal Server Error**: Jika terjadi kesalahan pada server.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau laporkan isu melalui halaman GitHub.

## Catatan

Untuk menjalankan proyek ini, pastikan Anda sudah menginstal semua persyaratan yang disebutkan di atas. Jika Anda mengalami masalah, jangan ragu untuk menghubungi kami atau mengajukan pertanyaan di bagian `Issues` GitHub.
