<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeatherStation;
use App\Models\WeatherStationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Create a new AuthController instance.
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    //Get a JWT via given credentials.
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    //register a user
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'organisation_id' =>'int|nullable',
            'first_name' => 'required|string|between:2,100',
            'surname' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'is_active' => 'required',
            'is_admin' => 'required',
            'is_superadmin' => 'required',
            'can_message' => 'required',
            'can_receive_notification' => 'required',
            'gsm' => 'string|unique:users,gsm|regex:/(04)[0-9]{8}/'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        //create stationusers when user is added
        if($request->organisation_id !== null){
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
        }

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    // Log the user out (Invalidate the token)
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    //Refresh a token
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    // Get the token array structure.
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
