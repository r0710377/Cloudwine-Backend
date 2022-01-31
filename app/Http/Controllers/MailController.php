<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationMail;

class MailController extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'ActivatieMail Wijnbouwer.be',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to('ferrevangenechten@hotmail.com')->send(new ActivationMail($details));
        return response()->json("MAIL SEND",200);
    }
}
