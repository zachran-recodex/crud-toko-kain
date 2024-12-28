# Projek Jokian Manajemen Stok Toko Kain nih Boss!

## Persyaratan Sistem

-   PHP ≥ 8.2
-   Composer
-   Node.js & NPM
-   MySQL
-   PDO PHP Extension

## Cara Instalasi

### 1. Clone dulu repo-nya biar nggak ketinggalan zaman:

```bash
git clone https://github.com/zachran-recodex/crud-toko-kain.git
cd crud-toko-kain
```

### 2. Install semua kebutuhan kayak si tukang service:

```bash
composer install
npm install
```

### 3. Setel environment, biar nggak jalan di awan kosong:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Edit database di .env kayak setting WiFi tetangga:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_toko_kain
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi database biar nggak buta arah:

```bash
php artisan migrate
```

### 6. Gas server lokal kayak anak balap:

```bash
# Pake concurrently buat jalanin semua service
composer run dev
```

### 7. Jangan lupa daftar akun dulu biar bisa login dan mulai eksplorasi fitur-fiturnya!

## Fitur

-   Login dan Registrasi yang nggak bikin pusing
-   CRUD buat ngatur data semudah ngatur playlist
-   Queue worker buat background tasks
-   Real-time logs pake Laravel Pail
-   Testing pake PEST

## Tools Development

-   Laravel Pint buat formatting code
-   Laravel Sail buat Docker environment
-   Vite buat asset bundling

## Lisensi

Framework Laravel ini open-source, jadi bebas lu oprek! Lisensinya [MIT](https://opensource.org/licenses/MIT). Jangan lupa kopi, biar ngoding makin semangat!
