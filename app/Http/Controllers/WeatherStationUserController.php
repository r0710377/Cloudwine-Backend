<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WeatherStationUser;

class WeatherStationUserController extends Controller
{
    public function index()
    {
        return WeatherStationUser::all();
    }

    public function show($user_id,$weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', $user_id)->where('weather_station_id',$weather_station_id)->get();
        return response()->json($weatherStationUser,200); //200 --> OK, The standard success code and default option
    }

//    public function store(Request $request)
//    {
//        $weatherStationUser = WeatherStationUser::create($request->all());
//        return response()->json($weatherStationUser, 201); //201 --> Object created. Usefull for the store actions
//    }

    public function update(Request $request, $user_id,$weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', $user_id)->where('weather_station_id',$weather_station_id);
        $weatherStationUser->update($request->all());

        return response()->json($weatherStationUser,200); //200 --> OK, The standard success code and default option
    }
}
