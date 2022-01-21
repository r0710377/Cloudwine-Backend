<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganisationTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WeatherStationTableSeeder::class);
        $this->call(WeatherStationUserTableSeeder::class);
        $this->call(AlarmTableSeeder::class);
        $this->call(GraphTypeTableSeeder::class);
        $this->call(ValueTableSeeder::class);
        $this->call(mailTableSeeder::class);
        $this->call(otaTableSeeder::class);
//        $this->call(GraphTableSeeder::class);
    }
}
