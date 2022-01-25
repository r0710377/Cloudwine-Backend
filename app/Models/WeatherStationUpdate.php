<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherStationUpdate extends Model
{
    protected $fillable = [
        'ota_update_id',
        'weather_station_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function weatherStation()
    {
        return $this->belongsTo('App\Models\WeatherStation')->withDefault();
    }

    public function otaUpdate()
    {
        return $this->belongsTo('App\Models\OTA_Update')->withDefault();
    }
}
