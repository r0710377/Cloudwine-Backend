<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'weather_station_id',
        'name',
        'is_active',
        'min',
        'max',
        'is_relais',
        'is_notification',
    ];

    public function weatherStation()
    {
        return $this->belongsTo('App\Models\WeatherStation')->withDefault();
    }

}
