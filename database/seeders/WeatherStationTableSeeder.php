<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeatherStation;


class WeatherStationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
//        WeatherStation::truncate();

        WeatherStation::create([
            'name' => 'Weerstation Noord',
            'gsm' => '0470589863',
            'relais_name' => 'Warmte draadje',
            'latitude' => '38.8951',
            'longitude' => ' -77.0364 ',
            'is_active' => true
        ]);

        WeatherStation::create([
            'name' => 'Weerstation Zuid',
            'gsm' => '0470885532',
            'relais_name' => 'Automatische overdekking',
            'latitude' => '31.54',
            'longitude' => ' -7.0235 ',
            'is_active' => true
        ]);

        WeatherStation::create([
            'name' => 'Station Groeneveld',
            'gsm' => '0478562199',
            'relais_name' => 'Sproeiers',
            'latitude' => '1.54',
            'longitude' => ' -85.425 ',
            'is_active' => true
        ]);

        WeatherStation::create([
            'name' => 'Weatherstation Vinho',
            'gsm' => '0470253566',
            'relais_name' => null,
            'latitude' => '4.54',
            'longitude' => ' -9.0235 ',
            'is_active' => true
        ]);
    }
}
