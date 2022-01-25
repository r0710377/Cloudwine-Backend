<?php

namespace App\Http\Controllers;

use App\Models\WeatherStationUpdate;
use Illuminate\Http\Request;

class WeatherStationUpdateController extends Controller
{

    public function index()
    {
        return WeatherStationUpdate::with(['weatherStation','otaUpdate'])->get();

    }

    public function store(Request $request)
    {
        $stationUpdate = WeatherStationUpdate::create($request->all());
        return response()->json($stationUpdate, 201); //201 --> Object created. Usefull for the store actions
    }

    public function delete(WeatherStationUpdate $stationUpdate)
    {
        $stationUpdate->delete();
        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
    }
}
