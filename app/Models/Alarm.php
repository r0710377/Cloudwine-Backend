<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    public function configuration()
    {
        return $this->belongsTo('App\Configuration')->withDefault();
    }

}
