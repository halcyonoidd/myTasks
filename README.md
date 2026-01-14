myTasks adalah aplikasi manajemen tugas sederhana yang dibangun menggunakan Laravel. Aplikasi ini memungkinkan pengguna untuk membuat, mengelola, dan melacak tugas-tugas mereka.

## Fitur

- Membuat dan mengelola daftar tugas
- Menandai tugas sebagai selesai
- Menghapus tugas
- Interface yang sederhana dan mudah digunakan

## Teknologi

- PHP
- Laravel Framework
- Blade Template Engine
- MySQL/Database

## Cara Menjalankan

### Persyaratan

- PHP >= 8.0
- Composer
- MySQL atau database lainnya
- Node.js & NPM (opsional, untuk assets)

### Langkah Instalasi

1. Clone repository ini
```bash
git clone https://github.com/halcyonoidd/myTasks.git
cd myTasks
```

2. Install dependencies
```bash
composer install
```

3. Salin file environment
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mytasks
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migrasi database
```bash
php artisan migrate
```

7. Jalankan aplikasi
```bash
php artisan serve
```

8. Buka browser dan akses `http://localhost:8000`
>>>>>>> e250609059dbfa1c300b7351becd0371754bd2f4