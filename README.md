# RESTful API - Praktikum 11 (Token Authentication & Todo CRUD)

Repositori ini berisi implementasi RESTful API menggunakan **Laravel 11** dan **Laravel Sanctum** untuk sistem autentikasi token dan manajemen data **Todo**. Proyek ini dibuat sebagai pemenuhan modul Praktikum 1 dan Praktikum 2 Pemrograman Web Lanjut (PWL).

---

## ✨ Fitur Utama

1. **Autentikasi Token (Laravel Sanctum)**:
   - Registrasi akun baru (`/api/register`).
   - Login akun lama (`/api/login`) untuk mendapatkan API token.
   - Logout (`/api/logout`) untuk menghapus/mencabut API token yang aktif.
2. **RESTful CRUD Todo**:
   - Menambahkan todo baru (`POST /api/todos`).
   - Menampilkan daftar todo milik user yang login (`GET /api/todos`).
   - Menampilkan detail todo tertentu (`GET /api/todos/{id}`).
   - Mengupdate judul atau status penyelesaian todo (`PUT/PATCH /api/todos/{id}`).
   - Menghapus todo (`DELETE /api/todos/{id}`).
3. **Validasi & Keamanan Request (Form Request)**:
   - Validasi data input yang otomatis mengembalikan respon JSON format standard jika gagal (menggunakan abstract class `ApiRequest`).
   - Proteksi kepemilikan resource (user hanya bisa melihat, mengupdate, atau menghapus todo miliknya sendiri).
4. **Exception Handling Modern (Laravel 11)**:
   - Mengubah handling error `ModelNotFoundException` (jika data tidak ditemukan) dan `AuthorizationException` (jika user tidak memiliki akses) menjadi format JSON rapi di file `bootstrap/app.php`.

---

## 🛠️ Daftar Endpoint API

Semua request yang dikirimkan menggunakan header `Accept: application/json`.

| HTTP Method | Endpoint | Middleware | Deskripsi | Parameter Body (urlencoded) |
| :--- | :--- | :--- | :--- | :--- |
| **POST** | `/api/register` | Public | Mendaftarkan user baru | `name`, `email`, `password`, `password_confirmation` |
| **POST** | `/api/login` | Public | Login untuk mendapatkan token | `email`, `password` |
| **POST** | `/api/logout` | `auth:sanctum` | Revoke/hapus token aktif | - (membutuhkan Bearer Token) |
| **GET** | `/api/todos` | `auth:sanctum` | Melihat semua todo milik user | - |
| **POST** | `/api/todos` | `auth:sanctum` | Membuat todo baru | `title` |
| **GET** | `/api/todos/{id}` | `auth:sanctum` | Melihat detail todo tertentu | - |
| **PUT/PATCH**| `/api/todos/{id}` | `auth:sanctum` | Mengupdate todo | `title` (opsional), `done` (opsional: 0 atau 1) |
| **DELETE** | `/api/todos/{id}` | `auth:sanctum` | Menghapus todo | - |

---

## 🚀 Cara Menjalankan Proyek

### 1. Prasyarat
- PHP >= 8.2
- MySQL Server (direkomendasikan Laragon atau XAMPP)
- Composer

### 2. Pengaturan Environment & Database
1. Pastikan server database MySQL Anda menyala.
2. Konfigurasi file `.env` di root direktori untuk koneksi database Anda, contoh:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=Filament2026
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 3. Migrasi Database
Jalankan perintah berikut untuk mengeksekusi semua file migrasi (termasuk tabel `users`, `personal_access_tokens`, dan `todos`):
```bash
php artisan migrate
```

### 4. Jalankan Local Server
Jalankan perintah ini untuk menyalakan local server development Laravel:
```bash
php artisan serve
```
Server akan aktif di alamat: `http://127.0.0.1:8000`

---

## 📬 Cara Menguji Menggunakan Postman

Untuk mempermudah pengujian, kami telah menyediakan file **Postman Collection** siap pakai di dalam repositori ini dengan nama **[todo_api_collection.json](todo_api_collection.json)**.

### Langkah-langkah Import & Pengujian:
1. Buka aplikasi **Postman**.
2. Klik tombol **Import** di pojok kiri atas.
3. Pilih file `todo_api_collection.json` dari root folder project ini dan klik **Import**.
4. Lakukan registrasi terlebih dahulu menggunakan request **Register** atau login dengan request **Login**.
5. Salin string token yang dikembalikan dari respon registrasi/login tersebut.
6. Masuk ke variabel collection (atau langsung edit variabel `token` di bagian tab Variables/Authorization) dan tempel token Anda di sana agar endpoint CRUD Todo dapat diakses secara otomatis.
