<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherStationUser;

class WeatherStationUserController extends Controller
{
    public function index()
    {
        return WeatherStationUser::all();
    }

    public function show(WeatherStationUser $weatherStationUser)
    {
        return $weatherStationUser;
    }

    public function store(Request $request)
    {
        $weatherStationUser = WeatherStationUser::create($request->all());
        return response()->json($weatherStationUser, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, WeatherStationUser $weatherStationUser)
    {
        $weatherStationUser->update($request->all());
        return response()->json($weatherStationUser,200); //200 --> OK, The standard success code and default option
    }
}
