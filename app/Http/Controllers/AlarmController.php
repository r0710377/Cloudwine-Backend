<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index(Request $request, $weather_station_id)
    {
        $kind = $request->get('kind');
        if ($kind){
            switch ($kind){
                case('temp'):
                    $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','temperatuur')->get();
                    break;
                case('hum'):
                    $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','vochtigheid')->get();
                    break;
                case('lux'):
                    $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','licht')->get();
                    break;
                default:
                    $alarms = Alarm::where('weather_station_id', $weather_station_id)->get();
            }
            return response()->json($alarms,200);
        }
//        if($kind == "temp"){
//            $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','temperatuur')->get();
//        } else if ($kind == "hum") {
//            $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','temperatuur')->get();
//        } else if ($kind == "lux"){
//            $alarms = Alarm::where('weather_station_id', $weather_station_id)->where('name','temperatuur')->get();
//        }

        $alarms = Alarm::where('weather_station_id', $weather_station_id)->get();
        return response()->json($alarms,200);
    }

    public function update(Request $request, Alarm $alarm)
    {
        $alarm->update($request->all());
        return response()->json($alarm,200); //200 --> OK, The standard success code and default option
    }
}
