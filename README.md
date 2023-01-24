# User Manual

## Requirements
- PHP minimal versi 8 (Menggunakan Laravel 9)
- Composer
- MYSQL database

## Cara setup local development
-	Git clone project ini
-	Pastikan telah memenuhi requirements
-   Buka terminal cd ke project yang telah di clone (pastikan bahwa path berada pada root folder yang sudah di clone)
-	Tuliskan perintah "composer install" pada terminal untuk menginstal dependency
-	Copy file .env.example lalu ubah namanya menjadi .env
-	Masukan setingan database pada folder .env seperti nama host, user, password, dan nama database
-	Tuliskan perintah "php artisan key:generate" pada terminal untuk mengenerate application key
-   Tuliskan perintah "php artisan migrate --seed" pada terminal untuk melakukan database migration dan seeding database (pastikan konfigurasi sudah benar pada file .env dan sudah membuat database dengan nama yang sama dengan file konfigurasi)
-	Tuliskan perintah "php artisan serve" pada terminal untuk menjalankan server
-	Buka browser lalu ketikan url yang telah digenerate oleh php artisan serve (default : http://localhost:8000/)

## Penjelasan singkat
- Tidak terdapat fitur login karena aplikasi ini untuk sistem admin
- Jika sudah melakukan seeding dan migration terdapat 2 user yaitu (Manager, Employee)
- Manager (email : manager@example.com, pass : password) (Dapat memanipulasi data frozen food)
- Employee (email : employee@example.com, pass : password) (Dapat memanipulasi data transaction menggunakan data frozen food yang telah dibuat manager)
