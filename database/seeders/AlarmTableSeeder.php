<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alarm;

class AlarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //This resets the table, deleting all the data everytime the function is called.
//        Alarm::truncate();

        $names = ['temperatuur','vochtigheid','licht'];

        for ($i = 0; $i < 3; $i++) {
            Alarm::create([
                'configuration_id' => 1,
                'name' => $names[$i],
                'is_active' => false,
                'min' => null,
                'max' => null,
                'is_relais' => false,
                'is_notification' => false,
            ]);
        }

         for ($i = 0; $i < 3; $i++) {
             Alarm::create([
                 'configuration_id' => 2,
                 'name' => $names[$i],
                 'is_active' => false,
                 'min' => null,
                 'max' => null,
                 'is_relais' => false,
                 'is_notification' => false,
             ]);
         }

          for ($i = 0; $i < 3; $i++) {
              Alarm::create([
                  'configuration_id' => 3,
                  'name' => $names[$i],
                  'is_active' => false,
                  'min' => null,
                  'max' => null,
                  'is_relais' => false,
                  'is_notification' => false,
              ]);
          }
    }
}
