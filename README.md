# Projek Jokian Boss!

## Persyaratan Sistem

-   PHP ≥ 8.1
-   Composer
-   Node.js & NPM
-   MySQL

## Cara Instalasi

1. Clone dulu repo-nya biar nggak ketinggalan zaman:

```bash
git clone https://github.com/zachran-recodex/toko-kain.git
cd toko-kain
```

2. Install semua kebutuhan kayak si tukang service:

```bash
composer install
npm install
```

3. Setel environment, biar nggak jalan di awan kosong:

```bash
cp .env.example .env
php artisan key:generate
```

4. Edit database di .env kayak setting WiFi tetangga:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko-kain
DB_USERNAME=root
DB_PASSWORD=
```

5. Migrasi database biar nggak buta arah:

```bash
php artisan migrate
```

6. Gas server lokal kayak anak balap:

```bash
php artisan serve
npm run dev
```

## Fitur

-   Login dan Registrasi yang nggak bikin pusing
-   CRUD buat ngatur data semudah ngatur playlist
-   Tampilan responsif, cocok buat HP sampe layar bioskop

## Lisensi

Framework Laravel ini open-source, jadi bebas lu oprek! Lisensinya [MIT](https://opensource.org/licenses/MIT). Jangan lupa kopi, biar ngoding makin semangat!
