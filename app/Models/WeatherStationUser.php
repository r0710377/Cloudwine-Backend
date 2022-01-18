<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherStationUser extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function graphs()
    {
        return $this->hasMany('App\Graph');
    }

    public function weatherStation()
    {
        return $this->belongsTo('App\WeatherStation')->withDefault();
    }

}
