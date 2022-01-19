<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user,200); //200 --> OK, The standard success code and default option
    }
}
