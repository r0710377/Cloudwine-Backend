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
            'bin_file_path' => 'c:/xx/xx',
            'name' => 'Test Update',
            'deploy_on' => '22-1-24 8:54:12',
        ]);

        OTA_Update::create([
            'bin_file_path' => 'c:/xx/xx',
            'name' => 'Update 1.2',
            'deploy_on' => '22-1-28 8:54:12',
        ]);
    }
}
