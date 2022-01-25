<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherStation;

class WeatherStationController extends Controller
{
    public function index(Request $request)
    {
        $organisation = $request->get('organisation');
        $status = $request->get('active');

        if($organisation){
            if($status == 2){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->get();
            } else if($status == '0'){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',0)->get();
            } else {
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',1)->get();
            }
            return response()->json($weatherstations,200);
        }

        return WeatherStation::with(['alarms','organisation'])->get();
    }


    public function public()
    {
        $weatherstation = WeatherStation::where('is_public', true)->where('is_active',1)->with(['organisation' => function($query){
            $query->select(['id','name']);
        }])->get();

        return response()->json($weatherstation->makeHidden(['gsm','relais_name','latitude','longitude','is_active','is_public','is_location_alarm','number_of_cycles','is_no_data_alarm']), 201); //201 --> Object created. Usefull for the store actions
    }

    public function show(WeatherStation $weatherStation)
    {
        return $weatherStation;
    }

    public function store(Request $request)
    {
        $weatherStation = WeatherStation::create($request->all());
        return response()->json($weatherStation, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, WeatherStation $weatherStation)
    {
        $weatherStation->update($request->all());
        return response()->json($weatherStation,200); //200 --> OK, The standard success code and default option
    }
}
