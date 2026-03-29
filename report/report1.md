# LAPORAN PRAKTIKUM

## Instalasi dan Setup Filament v4 pada Laravel

### Identitas

* Mata Kuliah: Pemrograman Web Lanjut
* Topik: Instalasi Filament v4
* Nama: Muhammad Fatahillah Athabrani
* Kelas: TI2F
* NIM: 244107020121

---

## Tujuan

1. Memahami konsep dasar Filament PHP
2. Menginstall Laravel 11
3. Menginstall dan mengkonfigurasi Filament v4
4. Membuat user admin
5. Menjalankan dan mengakses admin panel

---

## Langkah-langkah Praktikum

### 1. Membuat Project Laravel

```bash
composer create-project laravel/laravel PraktikumPWL
cd PraktikumPWL
```

---

### 2. Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Filament2026
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi:

```bash
php artisan migrate
```

---

### 3. Install Filament v4

```bash
composer require filament/filament:^4.0
php artisan filament:install --panels
```

Konfigurasi:

* Panel ID: admin
* GitHub repo: No

---

### 4. Membuat User Admin

```bash
php artisan make:filament-user
```

---

### 5. Menjalankan Aplikasi

```bash
php artisan serve
```

Akses melalui browser:
http://localhost:8000/admin

---

## Hasil

(Tambahkan Screenshot)

* Halaman login Filament

* Dashboard admin

* Data user pada database


---

## Analisis & Diskusi

1. **Kelebihan Filament dibanding admin panel manual**
   Filament memungkinkan pembuatan admin panel secara cepat dengan fitur bawaan seperti CRUD, autentikasi, dan UI yang sudah terintegrasi. Hal ini mengurangi kebutuhan penulisan kode dari awal sehingga meningkatkan efisiensi pengembangan.

2. **Alasan penggunaan Livewire pada Filament**
   Filament menggunakan Livewire karena mampu membuat aplikasi yang interaktif tanpa harus banyak menggunakan JavaScript. Livewire memungkinkan komunikasi langsung antara frontend dan backend secara real-time.

3. **Perbedaan SQLite dan MySQL**
   SQLite lebih ringan dan cocok untuk pengembangan awal karena tidak memerlukan server terpisah. MySQL lebih stabil dan scalable sehingga lebih cocok digunakan pada lingkungan production.

4. **Fungsi Panel Builder**
   Panel Builder berfungsi untuk membangun struktur admin panel secara otomatis, termasuk navigasi, halaman, dan autentikasi pengguna.

---

## Kesimpulan

Praktikum ini berhasil mengimplementasikan instalasi Laravel dan Filament, konfigurasi database, serta menjalankan admin panel dengan user yang dapat melakukan login ke dalam sistem.
