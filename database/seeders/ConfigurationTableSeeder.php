<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationTableSeeder extends Seeder
{
    /*** Run the database seeds.*/

    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
//        Configuration::truncate();

        Configuration::create([
            'weather_station_id' => 1,
            'is_public' => false,
            'is_location_alarm' => false,
            'is_no_data_alarm' => false,
            'number_of_cycles' => 8,
        ]);
        Configuration::create([
            'weather_station_id' => 2,
            'is_public' => true,
            'is_location_alarm' => false,
            'is_no_data_alarm' => false,
            'number_of_cycles' => null,
        ]);
        Configuration::create([
            'weather_station_id' => 3,
            'is_public' => true,
            'is_location_alarm' => false,
            'is_no_data_alarm' => false,
            'number_of_cycles' => 20,
        ]);
        Configuration::create([
            'weather_station_id' => 4,
            'is_public' => false,
            'is_location_alarm' => true,
            'is_no_data_alarm' => false,
            'number_of_cycles' => null,
        ]);
    }
}
