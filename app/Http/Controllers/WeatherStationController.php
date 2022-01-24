<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherStation;

class WeatherStationController extends Controller
{
    public function index()
    {
        if (request()->active){
            $weatherstation = WeatherStation::where('is_active', request()->active)->with('alarms')->get();
            return response()->json($weatherstation,200);
        }

        if (request()->organisation){
            $weatherstation = WeatherStation::where('organisation_id', request()->organisation)->with('alarms')->get();
            return response()->json($weatherstation,200);
        }
        return WeatherStation::with('alarms')->get();
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
