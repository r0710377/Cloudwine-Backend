<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = \Faker\Factory::create();


        //ADD DATA WHEATERSTATION 1
        for ($i = 0; $i < 4; $i++) {
            for ($i = 1; $i < 23; $i++) {
                Value::create([
                    'weather_station_id' => 1,
                    'graph_type_id' => $i,
                    'value' => strval( $faker->randomDigit),
                    'timestamp' => '2022-01-19T15:02:15',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 2
        for ($i = 0; $i < 4; $i++) {
            for ($i = 1; $i < 23; $i++) {
                Value::create([
                    'weather_station_id' => 2,
                    'graph_type_id' => $i,
                    'value' => strval( $faker->randomDigit),
                    'timestamp' => '2022-01-19T17:02:15',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 3
        for ($i = 0; $i < 4; $i++) {
            for ($i = 1; $i < 23; $i++) {
                Value::create([
                    'weather_station_id' => 3,
                    'graph_type_id' => $i,
                    'value' => strval( $faker->randomDigit),
                    'timestamp' => '2022-01-19T09:02:15',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 4
        for ($i = 0; $i < 4; $i++) {
            for ($i = 1; $i < 23; $i++) {
                Value::create([
                    'weather_station_id' => 4,
                    'graph_type_id' => $i,
                    'value' => strval( $faker->randomDigit),
                    'timestamp' => '2022-01-19T105:02:15',
                ]);
            }
        }
    }
}
