<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index(Request $request, $weather_station_id)
    {
//        $kind = $request->get('kind');
//        if ($kind){
//            switch ($kind){
//                case('temp'):
//                    $word = 'temperatuur';
//                    break;
//                case('hum'):
//                    $word = 'vochtigheid';
//                    break;
//                case('lux'):
//                    $word = 'licht';
//                    break;
//                default:
//                    $word = 'temperatuur';
//            }
//            $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name',$word)->get();
//            return response()->json($alarms,200);
//        }

        $alarms = Alarm::where('weather_station_id', $weather_station_id)->with('graphType')->get();

        return response()->json($alarms,200);
    }

    public function show( $alarm_id)
    {
        $alarm = Alarm::find($alarm_id)->with(['weatherStation' => function($query){
            $query->select(['id','relais_name']);
        }])->get();

        return response()->json($alarm,200);
    }

    public function store(Request $request)
    {
        $alarm = Alarm::create($request->all());
        return response()->json($alarm, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Alarm $alarm)
    {
        $alarm->update($request->all());
        return response()->json($alarm,200); //200 --> OK, The standard success code and default option
    }


    public function delete(Alarm $alarm)
    {
        $alarm->delete();
        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
    }

    public function gsm($weather_station_gsm)
    {
        $weatherstation = WeatherStation::where('gsm',$weather_station_gsm);
        $weather_station_id = json_decode($weatherstation->get('id'), true);
        $alarms = Alarm::where('weather_station_id',$weather_station_id)->where('is_relais',1)->with(['graphType' => function($query){
            $query->select(['id','name']);
        }])->get();

        return response()->json($alarms->makeHidden(['id','weather_station_id','graph_type_id','is_relais','is_notification','graphType.id']),200);

    }
}
