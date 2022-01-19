<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
//        Organization::truncate();

        Organization::create([
            'name' => 'Wijnbouwer',
            'address' => 'Wijnstraat 2',
            'postal_code' => '2450',
            'city' => 'Balen',
            'country' => 'België',
        ]);

        Organization::create([
            'name' => 'VinhoMaker',
            'address' => 'vinholaan 8',
            'postal_code' => '2440',
            'city' => 'Geel',
            'country' => 'België',
        ]);

        Organization::create([
            'name' => 'Grapes4You',
            'address' => 'Grapestraat 74',
            'postal_code' => '4587',
            'city' => 'Deurne',
            'country' => 'België',
        ]);
    }
}
