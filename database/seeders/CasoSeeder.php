<?php

namespace Database\Seeders;

use App\Models\Caso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CasoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $startDate = Carbon::create(2024, 1, 1);
        $endDate = Carbon::create(2024, 12, 31);

        foreach (range(1, end: 200) as $i) {
            Caso::create([
                'dni' => $faker->numerify('########'),
                'nombre_completo' => $faker->name(),
                'genero' => $faker->randomElement(['Masculino', 'Femenino']),
                'telefono' => $faker->phoneNumber(),
                'nacionalidad' => $faker->country(),
                'direccion' => $faker->address(),
                'departamento' => $faker->state(),
                'provincia' => $faker->city(),
                'distrito' => $faker->citySuffix(),
                'lugar_caso' => $faker->city(),
                'descripcion' => $faker->sentence(10),
                'autorizacion_comunicacion' => $faker->boolean(),
                'autorizacion_copia_reporte' => $faker->boolean(),
                'fecha_resolucion' => $faker->optional()->dateTimeBetween($startDate, $endDate),
                'fecha_atencion' => $faker->optional()->dateTimeBetween($startDate, $endDate),
                'asignado' => $faker->name(),
                'resolucion' => $faker->optional()->sentence(),
                'resolucion_url' => $faker->optional()->url(),
                'tipo_caso_id' => $faker->numberBetween(1, 3),
                'estado_id' => $faker->randomElement([1, 3, 4]),
                'created_at' => $faker->dateTimeBetween($startDate, $endDate),
                'updated_at' => $faker->dateTimeBetween($startDate, $endDate)
            ]);
        }
    }
}
