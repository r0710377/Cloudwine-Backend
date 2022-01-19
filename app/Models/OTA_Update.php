<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTA_Update extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'send_on',
        'bin_file_path',
        'name'
    ];

    use HasFactory;
}
