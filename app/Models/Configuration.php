<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public function weatherStation()
    {
        return $this->belongsTo('App\WeatherStation')->withDefault();
    }

    public function alarms()
    {
        return $this->hasMany('App\Alarm');
    }
}
