<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Penggunaan awal


<ul>
    <li>clone aplikasi menggunakan git dekstop atw bisa download</li>
    <li>buka file projek di dalam visul code,sublime,atom atw editor lainnya</li>
    <li>buka terminal di dalam projek jika mengguakan git bash, jika menggunakan terminal biasa arahkan ke dalam file projek</li>
    <li>lakukan <span style:"color=red"> "composer install" </span></li>
    <li>sesudah composer install selesai jelankan "cp .env.example .env" atau "copy .env.example .env" (pilih salah satu)</li>
    <li>lihat  apakah file ".env" sudah ada di dalam file projek bila sudah ada jalan kan perintah "php artisan key:generate" untuk menambahkan file key di file ".env" di dalam file projek,lihat di dalam file ".env" pada bagian "APP_KEY=" sudah terisi dengan key.</li>
    <li>bila sudah dalam file projek terdapat file DB_pengarsipan lakukan export dengan menggunakan "XAMPP" atau pengelola database lainnya.</li>
    <li>bila sudah bisa kembali ke terminal dan jalankan "php artisan db:seed".</li>
    <li>selanjutnya buka projek dalam browser menggunakan "php artisan serve" atau menggunakan htdocs.</li>
    <li>bila masuk ke tampilan login masukan email: admin@admin.com dengan password:password.</li>
</ul>
## penggunaan pertama

saya telah melakukan menyelasaikan dan harus membuat configurasi awal pemakaian pada pengguna bar berikut langkah-langkahnya:

-clone aplikasi menggunakan git dekstop atw bisa download
-buka file projek di dalam visul code,sublime,atom atw editor lainnya
-buka terminal di dalam projek jika mengguakan git bash, jika menggunakan terminal biasa arahkan ke dalam file projek
-lakukan "composer install"
-sesudah composer install selesai jelankan "cp .env.example .env" atau "copy .env.example .env" (pilih salah satu)
-lihat apakah file ".env" sudah ada di dalam file projek bila sudah ada jalan kan perintah "php artisan key:generate" untuk menambahkan ---file key di file ".env" di dalam file projek,lihat di dalam file ".env" pada bagian "APP_KEY=" sudah terisi dengan key.-
-bila sudah dalam file projek terdapat file DB_pengarsipan lakukan export dengan menggunakan "XAMPP" atau pengelola database lainnya.
-bila sudah bisa kembali ke terminal dan jalankan "php artisan db:seed".
-selanjutnya buka projek dalam browser menggunakan "php artisan serve" atau menggunakan htdocs.
-bila masuk ke tampilan login masukan email: admin@admin.com dengan password:password.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
