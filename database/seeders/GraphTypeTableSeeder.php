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

        $types = ['gsm','time','RH','T1','T2','T3','RF','IRL','FLL','VIL','LUX','LW1','LW2','BAV','BAP','WD','WS','GLA','GLO','SWS','SWT','SWL','SWN'];
        $descriptions = ['String van Device Name',
            'Huidig tijd',
            'Vochtigheid (humidity)',
            'Temperatuursensor 1',
            'Temperatuursensor 2',
            'Temperatuursensor 3',
            'Totale regenval in cm (RainFall)',
            'Infrarood sensor',
            'Volledige helderheid',
            'visuele helderheid',
            'Intensiteit van het licht',
            'Leaf-Wetness sensor (phase 1)',
            'Leaf-Wetness sensor (phase 2)',
            'Battery voltage',
            'Battery voltage in percent',
            'Wind direction',
            'Wind speed',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];

        for ($i = 0; $i < count($types); $i++) {
            GraphType::create([
                'name' => $types[$i],
                'description'=> $descriptions[$i]
            ]);
        }
    }
}
