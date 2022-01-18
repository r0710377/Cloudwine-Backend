<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{

    public function weatherStation()
    {
        return $this->belongsTo('App\WeatherStation')->withDefault();
    }

    public function graphType()
    {
        return $this->belongsTo('App\GraphType')->withDefault();
    }
}
