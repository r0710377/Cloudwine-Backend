<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Seeder;

class mailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Mail::create([
             'message' => 'Beste Welkom bij Wijnbouwer.be, druk op de onderstaande link om uw account te activeren --- link ---',
             'subject' => 'Activatiemail - wijnbouwer.be',
         ]);

        Mail::create([
            'message' => 'Beste druk op de onderstaande link om uw wachtwoord aan te passen --- link ---',
            'subject' => 'Wachtwoord aanpassen - wijnbouwer.be',
        ]);

    }
}
