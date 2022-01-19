<?php

namespace Database\Seeders;

use App\Models\GraphType;
use Illuminate\Database\Seeder;

class GraphTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = ['gsm','time','RH','T1','T2','T3','RF','IRL','FLL','VIL','LUX','LW1','LW2','BAV','BAP','WD','WS','GLA','GLO','SW1','SW1T','SW1L'];

        for ($i = 0; $i < count($types); $i++) {
            GraphType::create([
                'name' => $types[$i],
            ]);
        }
    }
}
