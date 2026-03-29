# LAPORAN PRAKTIKUM

## Membuat CRUD Resource dengan Filament v4

### Identitas

* Mata Kuliah: Pemrograman Web Lanjut
* Topik: CRUD Resource Filament
* Nama: Muhammad Fatahillah Athabrani
* Kelas: TI2F
* NIM: 244107020121

---

## Tujuan

1. Memahami konsep Resource pada Filament
2. Membuat CRUD otomatis
3. Menggunakan Form Builder dan Table Builder
4. Mengelola data melalui admin panel

---

## Langkah-langkah Praktikum

### 1. Membuat Resource User

```bash
php artisan make:filament-resource User
```

---

### 2. Membuat Form Input

Edit file:
`UserForm.php`

Tambahkan field:

* Name
* Email
* Password

---

### 3. Menampilkan Data pada Tabel

Edit file:
`UsersTable.php`

Tambahkan kolom:

* Name
* Email

---

### 4. Menjalankan Aplikasi

```bash
php artisan serve
```

Akses:
http://localhost:8000/admin

---

### 5. Mengubah Icon Resource

Edit file:
`UserResource.php`

---

## Hasil

(Tambahkan Screenshot)

* Halaman List User
* Form Create User
* Data pada database

---

## Analisis & Diskusi

1. **Mengapa Filament dapat membuat CRUD dengan cepat**
   Filament menggunakan generator berbasis model Laravel yang secara otomatis membuat struktur CRUD seperti form, tabel, dan halaman.

2. **Perbedaan Form Schema dan Table Schema**
   Form Schema digunakan untuk mendefinisikan input data, sedangkan Table Schema digunakan untuk menampilkan data dalam bentuk tabel.

3. **Menambahkan validasi email unik**
   Validasi dapat dilakukan dengan menambahkan rule `unique` pada field email di Form Schema.

4. **Alasan password tidak perlu di-hash manual**
   Laravel secara otomatis melakukan hashing password melalui mekanisme bawaan saat data disimpan.

---

## Kesimpulan

Praktikum ini berhasil mengimplementasikan CRUD menggunakan Filament dengan memanfaatkan fitur Resource, Form Builder, dan Table Builder secara optimal.
