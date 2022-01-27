<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherStation extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'name',
        'organisation_id',
        'gsm',
        'relais_name',
        'latitude',
        'longitude',
        'is_active',
        'is_public',
        'is_location_alarm',
        'is_no_data_alarm',
        'number_of_cycles',
        'is_manual_relais'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function alarms()
    {
        return $this->hasMany('App\Models\Alarm');
    }

    public function values()
    {
        return $this->hasMany('App\Models\Value');
    }

    public function weatherStationUsers()
    {
        return $this->hasMany('App\Models\WeatherStationUser');
    }

    public function weather_station_updates()
    {
        return $this->hasMany('App\Models\WeatherStationUpdate');
    }

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation')->withDefault();
    }

}
