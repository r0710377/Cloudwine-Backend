<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherStation extends Model
{
    public function configuration()
    {
        return $this->hasOne('App\Configuration');
    }

    public function values()
    {
        return $this->hasMany('App\Value');
    }

    public function weatherStationUsers()
    {
        return $this->hasMany('App\WeatherStationUser');
    }

}
