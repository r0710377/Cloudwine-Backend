<?php

namespace App\Http\Controllers;

use App\Models\OTA_Update;
use Illuminate\Http\Request;

class OTAController extends Controller
{
    public function index()
    {
        return OTA_Update::all();
    }


    public function store(Request $request)
    {
        $update = OTA_Update::create($request->all());
        return response()->json($update, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, OTA_Update $update)
    {
        $update->update($request->all());
        return response()->json($update,200); //200 --> OK, The standard success code and default option
    }

    public function delete(OTA_Update $update)
    {
        $update->delete();
        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
    }
}
