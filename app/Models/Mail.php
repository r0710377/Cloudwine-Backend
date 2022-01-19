<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'message',
        'subject',
        'recipient'
    ];

    use HasFactory;
}
