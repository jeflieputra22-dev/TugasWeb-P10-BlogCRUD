<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

// Opsional: isi data contoh supaya pagination terlihat (butuh lebih dari 6 post)
// Jalankan: php artisan db:seed --class=PostSeeder
class PostSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            'Mengenal Konsep MVC di Laravel',
            'Cara Install Laravel dengan Composer',
            'Routing Dasar dan Named Route',
            'Belajar Blade Template Engine',
            'Membuat Layout Master dengan @extends',
            'Validasi Form di Laravel',
            'Flash Message Sukses dan Gagal',
            'Route Model Binding Itu Mudah',
            'Pagination Otomatis dengan paginate()',
            'Kenapa Form Wajib Pakai @csrf',
            'Membuat Blade Component Pertama',
            'Tips Belajar Pemrograman Web',
        ];

        foreach ($titles as $title) {
            Post::firstOrCreate(
                ['title' => $title],
                ['body' => "Ini adalah isi contoh untuk post \"{$title}\". "
                    . 'Data ini dibuat oleh PostSeeder agar halaman daftar post '
                    . 'dan pagination bisa dicoba tanpa mengetik data satu per satu.']
            );
        }
    }
}
