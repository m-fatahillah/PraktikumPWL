# LAPORAN PRAKTIKUM

## Migration, Model, Relasi dan Resource Category

### Identitas

* Mata Kuliah: Pemrograman Web Lanjut
* Topik: Migration & Relasi
* Nama: Muhammad Fatahillah Athabrani
* Kelas: TI2F
* NIM: 244107020121

---

## Tujuan

1. Membuat Model dan Migration
2. Mendesain struktur database
3. Menggunakan fillable dan casts
4. Membuat relasi antar model
5. Membuat Resource Category

---

## Langkah-langkah Praktikum

### 1. Membuat Model & Migration Category

```bash
php artisan make:model Category -m
php artisan migrate
```

---

### 2. Mengatur Model Category

```php
protected $fillable = ['name', 'slug'];
```

---

### 3. Membuat Model & Migration Post

```bash
php artisan make:model Post -m
php artisan migrate
```

---

### 4. Mengatur Model Post

```php
protected $fillable = [
  'title', 'slug', 'category_id',
  'color', 'image', 'body',
  'tags', 'published', 'published_at'
];
```

Casting:

```php
protected $casts = [
  'tags' => 'array',
  'published' => 'boolean',
  'published_at' => 'date'
];
```

---

### 5. Membuat Relasi

```php
public function category() {
    return $this->belongsTo(Category::class);
}
```

---

### 6. Membuat Resource Category

```bash
php artisan make:filament-resource Category
```

Edit:

* CategoryForm.php
* CategoriesTable.php

---

## Hasil

(Tambahkan Screenshot)

* Struktur tabel database
* Form Category
* List Category

---


## Analisis & Diskusi

1. **Fungsi $fillable**
   Digunakan untuk menentukan atribut yang boleh diisi secara massal demi menjaga keamanan data.

2. **Fungsi $casts**
   Digunakan untuk mengubah tipe data secara otomatis sesuai kebutuhan aplikasi.

3. **Perbedaan integer dan foreign key**
   Integer hanya menyimpan angka, sedangkan foreign key digunakan untuk menghubungkan antar tabel serta menjaga integritas data.

4. **Jika category dihapus namun masih ada post**
   Diperlukan pengaturan relasi seperti cascade delete atau restrict untuk menjaga konsistensi data.

---

## Kesimpulan

Praktikum ini berhasil mengimplementasikan migration, model, relasi database, serta CRUD Category menggunakan Filament secara terstruktur.
