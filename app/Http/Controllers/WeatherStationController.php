<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherStation;

class WeatherStationController extends Controller
{

    public function public()
    {
        $weatherstation = WeatherStation::where('is_public', true)->where('is_active',1)->with(['organisation' => function($query){
            $query->select(['id','name']);
        }])->get();

        return response()->json($weatherstation->makeHidden(['gsm','relais_name','latitude','longitude','is_active','is_public','is_location_alarm','number_of_cycles','is_no_data_alarm']), 201); //201 --> Object created. Usefull for the store actions
    }

}
