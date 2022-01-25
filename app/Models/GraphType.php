<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphType extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function values()
    {
        return $this->hasMany('App\Models\Value');
    }

    public function weather_station_updates()
    {
        return $this->hasMany('App\Models\WeatherStationUpdate');
    }

//    public function graphs()
//    {
//        return $this->hasMany('App\Graph');
//    }
}
