<?php

namespace Database\Seeders;

use App\Models\TipoCaso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposCasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoCaso::insert([
            [
                'nombre' => 'Estigma y discriminación(a)', 
                'descripcion' => 'Descripción de estigma y discriminación', 
                'activo' => true
            ],
            [
                'nombre' => 'Canasta PANTB', 
                'descripcion' => 'Descripción de la canasta PANTB', 
                'activo' => true
            ],
            [
                'nombre' => 'Tratamiento de TB', 
                'descripcion' => 'Descripción del tratamiento de TB', 
                'activo' => true
            ],
        ]);
    }
}
