<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImagenWeb;
use Illuminate\Support\Facades\DB;

class ImagenesWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('imagenes_web')->insert([
            ['key' => 'logo', 'path' => '/storage/imagenes_web/logo.png'],
            ['key' => 'carrusel1', 'path' => '/storage/imagenes_web/carrusel1.png'],
            ['key' => 'carrusel2', 'path' => '/storage/imagenes_web/carrusel2.png'],
            ['key' => 'carrusel3', 'path' => '/storage/imagenes_web/carrusel3.png'],
        ]);
        
    }
}
