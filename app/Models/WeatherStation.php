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
        'number_of_cycles'
    ];

    public function alarms()
    {
        return $this->hasMany('App\Alarm');
    }

    public function values()
    {
        return $this->hasMany('App\Value');
    }

    public function weatherStationUsers()
    {
        return $this->hasMany('App\WeatherStationUser');
    }


    public function organisation()
    {
        return $this->belongsTo('App\Organisation')->withDefault();
    }

}
