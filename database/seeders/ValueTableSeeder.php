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
        for ($a = 0; $a < 4; $a++) {
            for ($i = 1; $i < 21; $i++) {
                Value::create([
                    'weather_station_id' => 1,
                    'graph_type_id' => $i,
                    'value' => strval($faker->randomDigit),
                    'timestamp' => '22-1-24 8:54:12',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 2
        for ($a = 0; $a < 4; $a++) {
            for ($i = 1; $i < 21; $i++) {
                Value::create([
                    'weather_station_id' => 2,
                    'graph_type_id' => $i,
                    'value' => strval($faker->randomDigit),
                    'timestamp' => '22-1-24 8:54:12',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 3
        for ($a = 0; $a < 4; $a++) {
            for ($i = 1; $i < 21; $i++) {
                Value::create([
                    'weather_station_id' => 3,
                    'graph_type_id' => $i,
                    'value' => strval($faker->randomDigit),
                    'timestamp' => '22-1-24 8:54:12',
                ]);
            }
        }

        //ADD DATA WHEATERSTATION 4
        for ($a = 0; $a < 4; $a++) {
            for ($i = 1; $i < 21; $i++) {
                Value::create([
                    'weather_station_id' => 4,
                    'graph_type_id' => $i,
                    'value' => strval($faker->randomDigit),
                    'timestamp' => '22-1-24 8:54:12',
                ]);
            }
        }
    }
}
