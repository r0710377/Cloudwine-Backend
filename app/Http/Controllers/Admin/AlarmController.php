<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alarm;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index($weather_station_id)
    {
        if(auth()->user()->is_superadmin){
            $alarms = Alarm::where('weather_station_id', $weather_station_id)->with('graphType')->get();
            return response()->json($alarms,200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $weather_station_id){
                    $alarms = Alarm::where('weather_station_id', $weather_station_id)->with('graphType')->get();
                    return response()->json($alarms,200);
                }
            }
        }
        return response()->json([
            'message' => 'Dit alarm is niet van jouw organisatie',
        ], 401);


    }

    public function show(Alarm $alarm)
    {
        $show = Alarm::where('id',$alarm->id)->with(['weatherStation' => function($query){
            $query->select(['id','relais_name']);
        },'graphtype' => function($query1){
            $query1->select(['id','name']);
        }])->get();

        if(auth()->user()->is_superadmin){
            return response()->json($alarm[0],200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $alarm->weather_station_id){
                    return response()->json($show[0],200);
                }
            }
        }
        return response()->json([
            'message' => 'Dit alarm is niet van jouw organisatie',
        ], 401);

    }

    public function store(Request $request)
    {
        $alarm = Alarm::create($request->all());
        return response()->json($alarm, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Alarm $alarm)
    {
        if(auth()->user()->is_superadmin){
            $alarm->update($request->all());
            return response()->json($alarm,200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $alarm->weather_station_id){
                    $alarm->update($request->all());
                    return response()->json($alarm,200);
                }
            }
        }
        return response()->json([
            'message' => 'Dit alarm is niet van jouw organisatie',
        ], 401);
    }


    public function destroy(Alarm $alarm)
    {
        if(auth()->user()->is_superadmin){
            $alarm->delete();
            return response()->json(null, 204);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $alarm->weather_station_id){
                    $alarm->delete();
                    return response()->json(null, 204);
                }
            }
        }
        return response()->json([
            'message' => 'Dit alarm is niet van jouw organisatie',
        ], 401);

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
