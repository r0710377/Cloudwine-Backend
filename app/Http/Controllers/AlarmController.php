<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index(Request $request, $weather_station_id)
    {
        $alarms = Alarm::where('weather_station_id', $weather_station_id)->get();
        return response()->json($alarms,200);
    }

    public function update(Request $request, Alarm $alarm)
    {
        $alarm->update($request->all());
        return response()->json($alarm,200); //200 --> OK, The standard success code and default option
    }
}
