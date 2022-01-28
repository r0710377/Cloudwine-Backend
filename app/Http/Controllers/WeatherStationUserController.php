<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeatherStation;
use Illuminate\Http\Request;
use App\Models\WeatherStationUser;

class WeatherStationUserController extends Controller
{
    public function index()
    {
        return WeatherStationUser::all();
    }

    public function show($weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', auth()->id())->where('weather_station_id',$weather_station_id)->get();

        if(auth()->user()->is_superadmin){
            return response()->json($weatherStationUser,200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $weather_station_id){
                    return response()->json($weatherStationUser,200);
                }
            }
        }
        return response()->json([
            'message' => 'Dit weerstation zit niet bij jouw organisatie',
        ], 401);

    }



    public function update(Request $request,$weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', auth()->id())->where('weather_station_id',$weather_station_id);

        if(auth()->user()->is_superadmin){
            $weatherStationUser->update($request->all());
            return response()->json($weatherStationUser,200);
        }else {
            $userStations = WeatherStation::where('organisation_id',auth()->user()->organisation_id)->get('id');
            foreach ($userStations as $station){
                if($station->id == $weather_station_id){
                    $weatherStationUser->update($request->all());
                    return response()->json($weatherStationUser,200);
                }
            }
        }
        return response()->json([
            'message' => 'Dit weerstation zit niet bij jouw organisatie',
        ], 401);
    }
}
