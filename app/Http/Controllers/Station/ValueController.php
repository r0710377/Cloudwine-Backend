<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use App\Models\GraphType;
use App\Models\Value;
use App\Models\WeatherStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValueController extends Controller
{
    //ALLEEN VOOR WEERSTATION
    public function state($weather_station_gsm)
    {
        $weatherstation = WeatherStation::where('gsm',$weather_station_gsm)->first();
        $state = $weatherstation->switch_state;
        $manual = $weatherstation->is_manual_relais;
        return response()->json([
            'switch_state' => $state,
            'is_manual_relais' => $manual],200);
    }

    public function stateupdate(Request $request,$weather_station_gsm)
    {
        // Validate $request
        $validator = Validator::make($request->all(), [
            'switch_state' => 'required|boolean',
            'is_manual_relais' => 'required|boolean'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $weatherstation = WeatherStation::where('gsm',$weather_station_gsm)->first();

        //update the user
        if($validator->validated()){
            $weatherstation->update($request->all());
        }

        return response()->json([
            'message' => 'Updated state successfully',
        ], 200);

    }

    public function store(Request $request)
    {
        $graphTypes = GraphType::all();
        $weatherStation = WeatherStation::where('gsm',$request->gsm)->get();

        foreach ($graphTypes as $type) {
            $name = $type->name;
            Value::create([
                'weather_station_id' => $weatherStation[0]->id,
                'graph_type_id' => $type->id,
                'value' => $request->$name,
                'timestamp' => $request->time,
            ]);
        }

        return response()->json('data is created',201); //201 --> Object created. Usefull for the store actions

    }
}
