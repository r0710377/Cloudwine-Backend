<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WeatherStation;
use App\Models\WeatherStationUser;
use Illuminate\Http\Request;

class WeatherStationController extends Controller
{

    public function index(Request $request)
    {
        $organisation = $request->get('organisation');
        $status = $request->get('active');

        if($organisation){
            if($status == 1){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->get();
            } else if($status == 2){
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',0)->get();
            } else {
                $weatherstations = WeatherStation::where('organisation_id', $organisation)->where('is_active',1)->get();
            }
            return response()->json($weatherstations,200);
        } else if($status){
            if($status == 2){
                $weatherstations = WeatherStation::where('is_active',0)->get();
            } else if($status == 1){
                $weatherstations = WeatherStation::all();
            } else {
                $weatherstations = WeatherStation::where('is_active', 1)->get();
            }
            return response()->json($weatherstations,200);
        }

        return WeatherStation::with(['alarms','organisation'])->get();
    }

    public function show($weatherStation)
    {
        $station = WeatherStation::findOrFail($weatherStation);
        return $station;
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
