<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'weather_station_id',
        'graph_type_id',
        'value',
        'timestamp'
    ];

    public function weatherStation()
    {
        return $this->belongsTo('App\WeatherStation')->withDefault();
    }

    public function graphType()
    {
        return $this->belongsTo('App\GraphType')->withDefault();
    }
}
