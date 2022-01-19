<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'weather_station_id',
        'is_public',
        'is_location_alarm',
        'is_no_data_alarm',
        'number_of_cycles',
    ];

    public function weatherStation()
    {
        return $this->belongsTo('App\WeatherStation')->withDefault();
    }

    public function alarms()
    {
        return $this->hasMany('App\Alarm');
    }
}
