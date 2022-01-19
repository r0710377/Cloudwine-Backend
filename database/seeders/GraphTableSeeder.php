<?php

namespace Database\Seeders;

use App\Models\Graph;
use Illuminate\Database\Seeder;

class GraphTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TEMPERATUUR
        for ($i = 1; $i < 22; $i++) {
            Graph::create([
                'graph_type_id' => 4,
                'weather_station_user_id' => $i,
                'timeframe' => '2021-01-19T105:02:15 - 2022-01-19T105:02:15',
            ]);
        }

        //VOCHTIGHEID
        for ($i = 1; $i < 22; $i++) {
            Graph::create([
                'graph_type_id' => 3,
                'weather_station_user_id' => $i,
                'timeframe' => '2021-01-19T105:02:15 - 2022-01-19T105:02:15',
            ]);
        }

        //LICHT
        for ($i = 1; $i < 22; $i++) {
            Graph::create([
                'graph_type_id' => 9,
                'weather_station_user_id' => $i,
                'timeframe' => '2021-01-19T105:02:15 - 2022-01-19T105:02:15',
            ]);
        }
    }
}
