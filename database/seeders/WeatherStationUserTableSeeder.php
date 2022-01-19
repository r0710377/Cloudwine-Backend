<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeatherStationUser;

class WeatherStationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
//        WeatherStationUser::truncate();

        //ORGANISATIE 1 WEERSTATION 1
        for ($i = 2; $i < 6; $i++) {
            WeatherStationUser::create([
                'weather_station_id' => 1,
                'user_id' => $i
            ]);
        }

        //ORGANISATIE 1 WEERSTATION 2
        for ($i = 2; $i < 6; $i++) {
            WeatherStationUser::create([
                'weather_station_id' => 2,
                'user_id' => $i
            ]);
        }

        //ORGANISATIE 2 WEERSTATION
        for ($i = 6; $i < 10; $i++) {
            WeatherStationUser::create([
                'weather_station_id' => 3,
                'user_id' => $i
            ]);
        }

        //ORGANISATIE 3 WEERSTATION
        for ($i = 9; $i < 18; $i++) {
            WeatherStationUser::create([
                'weather_station_id' => 4,
                'user_id' => $i
            ]);
        }

    }
}
