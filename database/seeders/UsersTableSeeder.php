<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear the users table first
//        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('test1');

        //SUPERADMIN
        User::create([
            'organisation_id' => null,
            'first_name' => 'SuperAdmin',
            'surname' => '',
            'email' => 'superdmin@test.com',
            'gsm' => '0470541285',
            'password' => $password,
            'is_active' => true,
            'is_admin' => false,
            'is_superadmin' => true,
            'can_message' => true,
        ]);

        //ADMIN ORGANISATIE 1
        User::create([
            'organisation_id' => 1,
            'first_name' => 'Administrator',
            'surname' => '1',
            'email' => 'admin@admin.com',
            'gsm' => '0425896547',
            'password' => $password,
            'is_active' => true,
            'is_admin' => true,
            'is_superadmin' => false,
            'can_message' => true,
        ]);

        // ORGANISATIE 1
        for ($i = 0; $i < 3; $i++) {
            User::create([
//                'organization_id' => $faker->numberBetween(1, 3),
                'organisation_id' => 1,
                'first_name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'gsm' => $faker->numerify('04########'),
                'password' => $password,
                'is_active' => true,
                'is_admin' => false,
                'is_superadmin' => false,
                'can_message' => false
            ]);
        }

        //ADMIN ORGANISATIE 2
        User::create([
            'organisation_id' => 2,
            'first_name' => 'Administrator',
            'surname' => '2',
            'email' => 'admin2@admin2.com',
            'gsm' => '0422222222',
            'password' => $password,
            'is_active' => true,
            'is_admin' => true,
            'is_superadmin' => false,
            'can_message' => true,
        ]);

        //ORGANISATIE 2
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'organisation_id' => 2,
                'first_name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'gsm' => $faker->numerify('04########'),
                'password' => $password,
                'is_active' => true,
                'is_admin' => false,
                'is_superadmin' => false,
                'can_message' => false
            ]);
        }

        // ADMIN ORGANISATIE 3
        User::create([
            'organisation_id' => 3,
            'first_name' => 'Administrator',
            'surname' => '3',
            'email' => 'admin3@admin3.com',
            'gsm' => '0433333333',
            'password' => $password,
            'is_active' => true,
            'is_admin' => true,
            'is_superadmin' => false,
            'can_message' => true,
        ]);

        //ORGANISATIE 3
        for ($i = 0; $i < 8; $i++) {
            User::create([
                'organisation_id' => 3,
                'first_name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'gsm' => $faker->numerify('04########'),
                'password' => $password,
                'is_active' => true,
                'is_admin' => false,
                'is_superadmin' => false,
                'can_message' => false
            ]);
        }
    }
}
