<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return Mail::all();
    }

    public function show(Mail $mail)
    {
        return $mail;
    }

    public function store(Request $request)
    {
        $mail = Mail::create($request->all());
        return response()->json($mail, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Mail $mail)
    {
        $mail->update($request->all());
        return response()->json($mail,200); //200 --> OK, The standard success code and default option
    }

    public function delete(Mail $mail)
    {
        $mail->delete();
        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
    }
}
