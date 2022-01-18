<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    public function weatherStationUser()
    {
        return $this->belongsTo('App\WeatherStationUser')->withDefault();
    }
    public function graphType()
    {
        return $this->belongsTo('App\GraphType')->withDefault();
    }
}
