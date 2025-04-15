<?php

namespace Database\Seeders;

use App\Models\InformationPage;
use Illuminate\Database\Seeder;

class InformationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InformationPage::create([
            'title' => 'Información',
            'title_2' => '¿QUE ES VIGILANCIA CIUDADANA?',

            'subtitle_1' => 'Definición',
            'description_1' => "Proceso activo y crítico de supervisión por parte de los ciudadanos hacia las acciones y políticas de gobiernos, instituciones y servicios públicos, que busca garantizar transparencia y buen uso de recursos.",

            'subtitle_2' => 'Relevancia de la vigilancia ciudadana en la salud',
            'description_2' => "Constituye de gran Importancia en la lucha contra enfermedades como la tuberculosis y mejora de la calidad del servicio de salud.\nSirve para detección de barreras, debilidades e irregularidades para el aseguramiento de las acciones, estrategias y programas en las comunidades.\nInvolucra a los ciudadanos, organizaciones comunitarias y organizaciones no gubernamentales, medios de comunicación y académicos como actores clave en la exigencia de rendición de cuentas.\nFomenta la corresponsabilidad entre gobierno y sociedad civil.\nCrea un entorno colaborativo en la lucha contra la tuberculosis y otras enfermedades.\nPermite hacer denuncia de irregularidades (mal uso de fondos, falta de medicamentos, entre otros relacionados a la TB).\nFomenta la colaboración con autoridades para optimizar políticas sanitarias.",

            'subtitle_3' => '¿Qué vigilamos?',
            'description_3' => "Estigma y discriminación\nTratamiento de tuberculosis\nCanasta PAN TB",

            'image_1' => '/storage/information/image1.png',

            'subtitle_4' => '¿QUE ES ESTIGMA Y DISCRIMINACIÓN?',
            'description_4' => "El estigma se refiere a un atributo profundamente desacreditador que reduce a un individuo de ser una persona completa a alguien marcado negativamente en la sociedad. Se puede entender como una desaprobación social basada en alguna característica o condición considerada desventajosa.\nLa discriminación es la acción negativa que se toma contra un individuo o grupo, basándose en el estigma que se les atribuye. Se trata de un trato desigual, injusto e inequitativo que limita las oportunidades y el acceso a recursos y servicios.",

            'image_2' => '/storage/information/image2.png',

            'subtitle_5' => '¿CÓMO ES EL TRATAMIENTO DE LA TB?',
            'description_5' => "El tratamiento de la tuberculosis es un proceso prolongado, implica el uso de medicamentos antibióticos durante un período, generalmente de seis a nueve meses. El objetivo del tratamiento es eliminar las bacterias de la TB del cuerpo y prevenir la reaparición de la enfermedad.\nLos medicamentos antibióticos más comunes utilizados para tratar la TB son:\n- Isoniazida (H)\n- Rifampicina (R)\n- Pirazinamida (Z)\n- Etambutol (E)",

            'subtitle_6' => 'REGÍMENES DE TRATAMIENTO:',
            'description_6' => "Los regímenes de tratamiento para la TB varían según la gravedad de la enfermedad, la cepa de la bacteria y la respuesta del paciente al tratamiento. Los regímenes de tratamiento comunes son:\nTratamiento de primera línea: Este régimen se utiliza para tratar la TB sensible a los medicamentos. Incluye una combinación de medicamentos antibióticos que se administran durante seis meses o más.\nTratamiento de segunda línea: Este régimen se utiliza para tratar la TB resistente a los medicamentos. Incluye medicamentos antibióticos más fuertes y se administra durante períodos más largos, mayor a 6 meses.",

            'subtitle_7' => 'Seguimiento estrictamente observado DOT:',
            'description_7' => "Es importante que los pacientes sigan estrictamente su régimen de tratamiento y se sometan a un seguimiento permanente para controlar su progreso y detectar cualquier efecto secundario",

            'image_3' => '/storage/information/image3.png',
        ]);
    }
}
