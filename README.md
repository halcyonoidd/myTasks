# myTasks

**myTasks** adalah aplikasi web sederhana untuk manajemen produktivitas pribadi. Aplikasi ini membantu pengguna mengatur tugas harian, menyimpan catatan penting, dan melacak daftar keinginan (wishlist) dalam satu platform yang terpusat.

## 🌟 Fitur Utama

* **Autentikasi Pengguna:** Sistem Login dan Registrasi yang aman.
* **Manajemen Tugas (Tasks):** Membuat, membaca, memperbarui, dan menghapus daftar tugas harian.
* **Catatan (Notes):** Menyimpan dan mengelola catatan teks sederhana.
* **Daftar Keinginan (Wishlist):** Mengelola daftar barang atau hal yang diinginkan.
* **Dashboard:** Ringkasan aktivitas pengguna.

## 🛠️ Teknologi

* **Backend:** [Laravel](https://laravel.com)
* **Frontend:** Blade Templates, JavaScript
* **Asset Bundler:** Vite
* **Database:** PostgreSQL

## 🚀 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

### Prasyarat
* PHP & Composer
* Node.js & NPM
* MySQL

### Langkah Instalasi

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/username-anda/mytasks.git](https://github.com/username-anda/mytasks.git)
    cd mytasks
    ```

2.  **Instal Dependensi**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file contoh konfigurasi:
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan atur koneksi database Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mytasks
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Key & Migrasi Database**
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Jalankan Aplikasi**
    Jalankan server Laravel dan Vite di dua terminal terpisah:

    * Terminal 1:
        ```bash
        php artisan serve
        ```
    * Terminal 2:
        ```bash
        npm run dev
        ```

6.  **Selesai**
    Buka `http://127.0.0.1:8000` di browser Anda.

## 📂 Struktur Folder

* `app/Models` - Model data (Task, Note, WishlistItem).
* `app/Http/Controllers` - Logika kontroler.
* `resources/views` - Halaman antarmuka (Blade).
* `routes/web.php` - Rute aplikasi.

## 📄 Lisensi

[MIT License](https://opensource.org/licenses/MIT).