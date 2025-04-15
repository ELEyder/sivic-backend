<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('tu_contraseña_segura'),
            'is_admin' => true
        ]);

        $this->call([
            TiposCasoSeeder::class,
            EstadosSeeder::class,
            ImagenesWebSeeder::class,
            HomePageSeeder::class,
            StatisticsPageSeeder::class,
            InformationPageSeeder::class,
            CasoSeeder::class,
        ]);
    }
}
