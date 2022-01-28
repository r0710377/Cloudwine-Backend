<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class WeatherStationController extends Controller
{
    public function index(Request $request)
    {
        $organisation = auth()->user()->organisation_id;
        $status = $request->get('active');

        if($status){
            if($status == 2){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',0)->with(['alarms','organisation'])->get();
            } else if($status == 1){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->with(['alarms','organisation'])->get();
            } else {
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',1)->with(['alarms','organisation'])->get();
            }
            return response()->json($weatherstations,200);
        }

        return WeatherStation::where('organisation_id', $organisation)->where('is_active',1)->with(['alarms','organisation'])->get();
    }

    public function show(WeatherStation $weatherStation)
    {
        return $weatherStation;
    }

    public function update(Request $request, WeatherStation $weatherStation)
    {
        $weatherStation->update($request->all());
        return response()->json($weatherStation,200); //200 --> OK, The standard success code and default option
    }
}
