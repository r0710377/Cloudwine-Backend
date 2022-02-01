<?php

namespace App\Http\Controllers;

use App\Mail\SendDemoMail;
use App\Mail\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationMail;

class MailController extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Welkom bij Wijnbouwer.be',
            'body' => 'U bent toegewezen als administrator op wijnbouwer.be, je kan jezelf inloggen met het onderstaande wachtwoord. Vergeet zeker je wachtwoord niet te veranderen',
            'password' => 'DFSD456FD456'
        ];

        \Mail::to('ferrevangenechten@hotmail.com')->send(new ActivationMail($details));


//        \Mail::to('ferrevangenechten@hotmail.com')->send(new SendDemoMail($maildata));
        return response()->json("MAIL SEND",200);
    }
}
