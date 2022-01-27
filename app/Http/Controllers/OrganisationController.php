<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use App\Models\Organisation;
use Illuminate\Support\Facades\Validator;

class OrganisationController extends Controller
{

    public function index()
    {
        if(request()->order){
            $organisation = Organisation::orderBy('name', request()->order)->get();
            if (request()->active){
                $organisation = Organisation::orderBy('name', request()->order)->where('is_active', request()->active)->get();
            }
            return response()->json($organisation,200);
        }
        return Organisation::all();
    }

    public function show(Organisation $organisation)
    {
        return $organisation;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'postal_code' => 'required|string|max:6',
            'city' => 'required|string',
            'country' => 'required',
            'is_active' => 'required|boolean',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $organisation = Organisation::create($validator->validated());

        return response()->json([
            'message' => 'Organisation successfully created',
            'organisation' => $organisation
        ], 201);

    }

    public function update(Request $request, Organisation $organisation)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'postal_code' => 'required|string|max:6',
            'city' => 'required|string',
            'country' => 'required',
            'is_active' => 'required|boolean',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $organisation->update($validator->validated());
        return response()->json($organisation,200); //200 --> OK, The standard success code and default option
    }

//    public function delete(Organization $organization)
//    {
//        $organization->delete();
//        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
//    }
}
