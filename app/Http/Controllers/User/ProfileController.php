<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller as Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Edit user profile
    public function edit()
    {
        return response()->json(auth()->user());
    }

    // Update user profile
    public function update(Request $request)
    {
        // Validate $request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'surname' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email,' . auth()->id() ,
            'gsm' => 'string|regex:/(04)[0-9]{8}/|unique:users,gsm,' . auth()->id()
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::findOrFail(auth()->id());

        //update the user
        if($validator->validated()){
            $user->update($request->all());
        }

        return response()->json($user, 201);
    }
}
