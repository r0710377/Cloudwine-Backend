<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index(Request $request, WeatherStation $weather_station)
    {
        $sensor = $request->get('sensor');
        $values = Value::where('weather_station_id', $weather_station->id)->with('graphType')->get();

        if($weather_station->is_public){
            return response()->json($values,200);
        }else {
            if($sensor) {
                $values = Value::where('weather_station_id', $weather_station_id)->where('graph_type_id',$sensor)->with('graphType')->get();
            }
            return response()->json($values,200);
        }

        return response()->json([
            'message' => 'Dit weerstation zit niet bij jouw organisatie',
        ], 401);

    }


    public function relais($weather_station_id)
    {
        $status = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','SWS');
        })->latest()->first();;

        return response()->json($status,200); //200 --> OK, The standard success code and default option
    }

    public function battery($weather_station_id)
    {
        $status = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','BAP');
        })->latest()->first();;

        return response()->json($status,200); //200 --> OK, The standard success code and default option
    }

    public function location($weather_station_id)
    {
        $longitude = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','GLO');
        })->with('graphType')->latest()->first();

        $latitude = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','GLA');
        })->with('graphType')->latest()->first();;

        if(auth()->user()->is_superadmin){
            return response()->json([$longitude,$latitude],200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $weather_station_id){
                    return response()->json([$longitude,$latitude],200);
                }
            }
        }

        return response()->json([
            'message' => 'Dit weerstation zit niet bij jouw organisatie',
        ], 401);
    }
}
