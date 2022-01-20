<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use App\Models\Organisation;

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
        $organisation = Organisation::create($request->all());
        return response()->json($organisation, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Organisation $organisation)
    {
        $organisation->update($request->all());
        return response()->json($organisation,200); //200 --> OK, The standard success code and default option
    }

//    public function delete(Organization $organization)
//    {
//        $organization->delete();
//        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
//    }
}
