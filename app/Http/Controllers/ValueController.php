<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index(Request $request, $weather_station_id)
    {
        $sensor = $request->get('sensor');
        $values = Value::where('weather_station_id', $weather_station_id)->with('graphType')->get();
//        $start =  $request->get('start');
//        $stop =  $request->get('stop');

        if($sensor) {
            $values = Value::where('weather_station_id', $weather_station_id)->where('graph_type_id',$sensor)->with('graphType')->get();
        }

        return response()->json($values,200);

    }
}
