<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index(Request $request, WeatherStation $weatherStation)
    {
        $sensor = $request->get('sensor');
        $values = Value::where('weather_station_id', $weatherStation->id)->with('graphType')->get();

        if($weatherStation->is_public && $weatherStation->is_active){
            if($sensor) {
                $values = Value::where('weather_station_id', $weatherStation->id)->where('graph_type_id',$sensor)->with('graphType')->get();
            }
            return response()->json($values,200);
        }else {
            return response()->json([
                'message' => 'Data niet beschikbaar',
            ], 403);
        }
    }

    public function relais(WeatherStation $weatherStation)
    {

        $status = Value::where('weather_station_id', $weatherStation->id)->whereHas('graphType',function($query) {
            $query->where('name', 'SWS');
        })->latest()->first();

        if($weatherStation->is_public && $weatherStation->is_active){
            return response()->json($status,200);
        }else {
            return response()->json([
                'message' => 'Data niet beschikbaar',
            ], 403);
        }

    }

    public function battery(WeatherStation $weatherStation)
    {
        $status = Value::where('weather_station_id', $weatherStation->id)->whereHas('graphType',function($query){
            $query->where('name','BAP');
        })->latest()->first();

        if($weatherStation->is_public && $weatherStation->is_active){
            return response()->json($status,200);
        }else {
            return response()->json([
                'message' => 'Data niet beschikbaar',
            ], 403);
        }
    }

    public function location(WeatherStation $weatherStation)
    {
        $longitude = Value::where('weather_station_id', $weatherStation->id)->whereHas('graphType',function($query){
            $query->where('name','GLO');
        })->with('graphType')->latest()->first();

        $latitude = Value::where('weather_station_id', $weatherStation->id)->whereHas('graphType',function($query){
            $query->where('name','GLA');
        })->with('graphType')->latest()->first();;

        if($weatherStation->is_public && $weatherStation->is_active){
            return response()->json([$longitude,$latitude],200);
        }else {
            return response()->json([
                'message' => 'Data niet beschikbaar',
            ], 403);
        }
    }
}
