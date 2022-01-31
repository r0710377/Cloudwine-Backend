<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index($weather_station_gsm)
    {
        $weatherstation = WeatherStation::where('gsm',$weather_station_gsm)->first();
        $phone_numbers = User::where('organisation_id', $weatherstation->organisation_id)->where('can_message',true)->get('gsm');
        return response()->json($phone_numbers);
    }
}
