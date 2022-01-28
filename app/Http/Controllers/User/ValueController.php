<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller as Controller;

use App\Models\GraphType;
use App\Models\Organisation;
use App\Models\Value;
use App\Models\WeatherStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValueController extends Controller
{
    public function index(Request $request, $weather_station_id)
    {

        $organisation = Organisation::where('organisation_id',auth()->user()->organisation_id)->get();

        $sensor = $request->get('sensor');
        $values = Value::where('weather_station_id', $weather_station_id)->with('graphType')->get();

        if($sensor) {
            $values = Value::where('weather_station_id', $weather_station_id)->where('graph_type_id',$sensor)->with('graphType')->get();
        }
        return response()->json($values,200);
    }


    public function relais($weather_station_id)
    {
        $status = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','SWS');
        })->latest()->first();;

        return response()->json($status,200); //200 --> OK, The standard success code and default option
    }

    public function battery($weather_station_id)
    {
        $status = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','BAP');
        })->latest()->first();;

        return response()->json($status,200); //200 --> OK, The standard success code and default option
    }

    public function location($weather_station_id)
    {
        $longitude = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','GLO');
        })->with('graphType')->latest()->first();

        $latitude = Value::where('weather_station_id', $weather_station_id)->whereHas('graphType',function($query){
            $query->where('name','GLA');
        })->with('graphType')->latest()->first();;

        return response()->json([$longitude,$latitude],200); //200 --> OK, The standard success code and default option
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

    public function state($weather_station_gsm)
    {
        $weatherstation = WeatherStation::where('gsm',$weather_station_gsm)->first();
        $state = $weatherstation->switch_state;
        return response()->json($state,200);
    }


    public function stateupdate(Request $request,$weather_station_gsm)
    {
        // Validate $request
        $validator = Validator::make($request->all(), [
            'switch_state' => 'required|boolean'
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
}
