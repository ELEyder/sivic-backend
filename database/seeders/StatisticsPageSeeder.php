<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatisticsPage;

class StatisticsPageSeeder extends Seeder
{
    public function run()
    {
        StatisticsPage::create([
            'title' => 'Estadísticas',
            'description' => ' A continuación, se muestra gráficos de tres indicadores; frecuencia de casos de denuncia registrados, estado de casos de denuncia registrados y número de casos de denuncia registrados acumulados en la plataforma SIVICTB.',
        ]);
    }
}
