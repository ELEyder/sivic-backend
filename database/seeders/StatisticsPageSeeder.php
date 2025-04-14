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
            'description' => 'Lorem ipsum dolor sit amet consectetur. Faucibus varius nunc varius condimentum nunc consectetur duis ipsum. Duis libero sit porttitor arcu in adipiscing. At lorem sed id dolor nisl erat urna. Ac magna ullamcorper sagittis euismod rhoncus eget. Ornare amet ut id risus ante. Scelerisque non lectus fames velit elit. Porta.',
        ]);
    }
}
