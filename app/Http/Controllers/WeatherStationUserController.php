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

    public function show($weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', auth()->id())->where('weather_station_id',$weather_station_id)->get();
        return response()->json($weatherStationUser,200); //200 --> OK, The standard success code and default option
    }

    public function update(Request $request,$weather_station_id)
    {
        $weatherStationUser = WeatherStationUser::where('user_id', auth()->id())->where('weather_station_id',$weather_station_id);
        $weatherStationUser->update($request->all());

        return response()->json($weatherStationUser,200); //200 --> OK, The standard success code and default option
    }
}
