<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run()
    {
        DB::table('estados')->insert([
            ['nombre' => 'Recibido', 'descripcion' => 'El caso ha sido recibido'],
            ['nombre' => 'Leído', 'descripcion' => 'El caso ha sido leído y está en proceso de ser resuelto.'],
            ['nombre' => 'Atendido', 'descripcion' => 'El caso ha sido atendido y está en proceso de resolución.'],
            ['nombre' => 'Resuelto', 'descripcion' => 'El caso ha sido deribado a OAT.'],
        ]);
    }
}
