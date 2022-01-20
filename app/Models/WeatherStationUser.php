<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherStationUser extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'weather_station_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function graphs()
    {
        return $this->hasMany('App\Models\Graph');
    }

    public function weatherStation()
    {
        return $this->belongsTo('App\Models\WeatherStation')->withDefault();
    }

}
