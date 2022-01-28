<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller as Controller;
use App\Models\WeatherStation;
use App\Models\WeatherStationUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $organisation = $request->get('organisation');
        $order = $request->get('order');
        $status = $request->get('active');

        if($organisation){
            if($status == 2){
                $users = User::where('organisation_id', $organisation)->where('is_active',0)->with('organisation')->get();
            } else if($status == 1){
                $users = User::where('organisation_id', $organisation)->with('organisation')->get();
            } else {
                $users = User::where('organisation_id', $organisation)->where('is_active',1)->with('organisation')->get();
            }
            return response()->json($users,200);
        }else if($order){
            if($status == 2){
                $users = User::orderBy('first_name', $order)->where('is_active',0)->with('organisation')->get();
            } else if($status == '0'){
                $users = User::orderBy('first_name', $order)->with('organisation')->get();
            } else {
                $users = User::orderBy('first_name', $order)->where('is_active',1)->with('organisation')->get();
            }
            return response()->json($users,200);
        } else if($status){
            if($status == 2){
                $users = User::orderBy('organisation_id','asc')->where('is_active',0)->with('organisation')->get();
            } else if($status == '0'){
                $users = User::orderBy('organisation_id','asc')->with('organisation')->get();
            } else {
                $users = User::orderBy('organisation_id','asc')->where('is_active',1)->with('organisation')->get();            }
            return response()->json($users,200);
        }
//        $users = User::orderBy('organisation_id','asc')->where('is_active',1)->get();
        $users = User::where('is_active',1)->get();

        return response()->json($users,200);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
//        $password= Hash::make('test1');
        //create the user
//        $user = User::create([
//            'organisation_id' => $request->organisation_id,
//            'first_name' => $request->first_name,
//            'surname' => $request->surname,
//            'email' => $request->email,
//            'gsm' => $request->gsm,
//            'password' => $password,
//            'is_active' => $request->is_active,
//            'is_admin' => $request->is_admin,
//            'is_superadmin' => $request->is_superadmin,
//            'can_message' => $request->can_message,
//            'can_receive_notification' => $request->can_receive_notification,
//        ]);

//        $user = User::create($request->all());
//
//        //create stationusers when user is added
//        if($request->organisation_id !== null){
//            $weatherstations = WeatherStation::where('organisation_id',$request->get('organisation_id'))->get();
//            foreach ($weatherstations as $weatherstation){
//                WeatherStationUser::create([
//                    'weather_station_id' => $weatherstation->id,
//                    'user_id' => $user->id,
//                    'timeframe_temp' => null,
//                    'timerframe_hum' => null,
//                    'timeframe_lux' => null
//                ]);
//            }
//        }
//
//        return response()->json($user, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'organisation_id' =>'int|nullable',
            'first_name' => 'required|string|between:2,100',
            'surname' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id ,
            'is_active' => 'required',
            'is_admin' => 'required',
            'is_superadmin' => 'required',
            'can_message' => 'required',
            'can_receive_notification' => 'required',
            'gsm' => 'string|regex:/(04)[0-9]{8}/|unique:users,gsm,' . $user->id
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        //delete existing weatherstationusers and add new if organisatioin is changed
        if($request->organisation_id !== null && $request->organisation_id !== $user->organisation_id){
            $stationUsers = WeatherStationUser::where('user_id',$user->id)->get();
            foreach ($stationUsers as $stationUser){
                $stationUser->delete();
            }
            $weatherstations = WeatherStation::where('organisation_id',$request->get('organisation_id'))->get();
            foreach ($weatherstations as $weatherstation){
                WeatherStationUser::create([
                    'weather_station_id' => $weatherstation->id,
                    'user_id' => $user->id,
                    'timeframe_temp' => null,
                    'timerframe_hum' => null,
                    'timeframe_lux' => null
                ]);
            }
            //delete all stationusers when no organisation
        } else if($request->organisation_id == null){
            $stationUsers = WeatherStationUser::where('user_id',$user->id)->get();
            foreach ($stationUsers as $stationUser){
                $stationUser->delete();
            }
        }

        //update the user
        if($validator->validated()){
            $user->update($request->all());
        }
        return response()->json($user,200); //200 --> OK, The standard success code and default option
    }
}
