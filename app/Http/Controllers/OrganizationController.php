<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return Organization::all();
    }

    public function show(Organization $organization)
    {
        return $organization;
    }

    public function store(Request $request)
    {
        $organization = Organization::create($request->all());
        return response()->json($organization, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());
        return response()->json($organization,200); //200 --> OK, The standard success code and default option
    }

//    public function delete(Organization $organization)
//    {
//        $organization->delete();
//        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
//    }
}
