<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'graph_type_id',
        'weather_station_user_id',
        'timeframe'
    ];

    public function weatherStationUser()
    {
        return $this->belongsTo('App\Models\WeatherStationUser')->withDefault();
    }
    public function graphType()
    {
        return $this->belongsTo('App\Models\GraphType')->withDefault();
    }
}
