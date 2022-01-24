<?php

namespace App\Http\Controllers;

use App\Models\GraphType;
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


    public function relais($weather_station_id)
    {

        $status = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','SW1');
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

    public function store(Request $request)
    {
        $graphTypes = GraphType::all();
        $weatherStation = WeatherStation::where('gsm',$request->gsm)->get();

        foreach ($request as $key => $value) {
            $test = $key;
        }

        foreach ($graphTypes as $type) {
            $name = $type->name;
            $value = Value::create([
                    'weather_station_id' => $weatherStation[0]->id,
                    'graph_type_id' => $type->id,
                    'value' => $request->$name,
                    'timestamp' => $request->time,
                ]);
        }

//        foreach($data as $key => $value)
//        {
//           foreach ($graphTypes as $type){
//               if($type->name == $key) {
////                   $value = Value::create([
////                    'weather_station_id' => $weatherStation->id,
////                    'graph_type_id' => $type->id,
////                    'value' => $value,
////                    'timestamp' => $request->time,
////                ]);
//                   $test = '{"1":"a","2":"b","3":"c","4":"d","5":"e"}';
//
//               }
//           }
//        }
        return response()->json($value, 201); //201 --> Object created. Usefull for the store actions

    }
}
