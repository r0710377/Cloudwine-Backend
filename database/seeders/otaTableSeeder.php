<?php

namespace Database\Seeders;

use App\Models\OTA_Update;
use Illuminate\Database\Seeder;

class otaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OTA_Update::create([
            'send_on' => '1968-11-16T00:00:00',
            'bin_file_path' => 'c:/xx/xx',
            'name' => 'Test Update',
        ]);

        OTA_Update::create([
            'send_on' => '2022-01-23T00:00:00',
            'bin_file_path' => 'c:/xx/xx',
            'name' => 'Update 1.2',
        ]);
    }
}
