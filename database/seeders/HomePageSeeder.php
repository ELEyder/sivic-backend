<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageSeeder extends Seeder
{
    public function run()
    {
        HomePage::create([
            'welcome_title' => 'Bienvenidos a SIVIC TB',
            'welcome_text' => 'Una plataforma para la comunicación y atención de casos relacionados al estigma y discriminación de las personas afectadas por TB, así como a la atención en TB y canasta PANTB',
            'title' => 'Nosotros',
            'subtitle' => '¿Qué es el SIVIC - TB?',
            'description' => 'SIVIC - TB es una herramienta de monitoreo comunitario y ciudadano enfocada en la tuberculosis, que facilita la implementación de acciones de vigilancia en derechos humanos, con un énfasis en el estigma y la discriminación, así como en el tratamiento de la tuberculosis y la provisión de la canasta PANTB. Este sistema se fundamenta en la participación activa de la comunidad para detectar, seguir y abordar los problemas y obstáculos que enfrentan las personas afectadas por la tuberculosis.',
        ]);
    }
}
