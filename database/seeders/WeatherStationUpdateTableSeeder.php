<?php

namespace Database\Seeders;

use App\Models\WeatherStationUpdate;
use Illuminate\Database\Seeder;

class WeatherStationUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        WeatherStationUpdate::create([
            'ota_update_id' => 1,
            'weather_station_id' => 1,
        ]);
        WeatherStationUpdate::create([
            'ota_update_id' => 1,
            'weather_station_id' => 2,
        ]);
        WeatherStationUpdate::create([
            'ota_update_id' => 1,
            'weather_station_id' => 3,
        ]);
        WeatherStationUpdate::create([
            'ota_update_id' => 1,
            'weather_station_id' => 4,
        ]);

        WeatherStationUpdate::create([
            'ota_update_id' => 2,
            'weather_station_id' => 1,
        ]);
        WeatherStationUpdate::create([
            'ota_update_id' => 2,
            'weather_station_id' => 2,
        ]);
    }
}
