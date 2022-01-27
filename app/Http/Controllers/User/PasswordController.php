<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller as Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PasswordController extends Controller
{

    // Update and encrypt user password
    public function update(Request $request)
    {
        // Validate $request
        // Validate $request
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Update encrypted user password in the database
        $user = User::findOrFail(auth()->id());
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => "Your current password doesn't match the password in the database",
            ], 400);
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return response()->json([
            'message' => 'Password successfully updated',
        ], 201);
    }

}
