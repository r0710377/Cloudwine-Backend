<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller as Controller;

use App\Models\OTA_Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OTAController extends Controller
{
    public function index()
    {
        return OTA_Update::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bin_file_path' => 'required|string',
            'name' => 'string|between:2,100|nullable',
            'deploy_on' => 'required|date_format:d-m-Y H:i:s',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($validator->validated()){
            $update = OTA_Update::create($request->all());
        }
        return response()->json($update, 201); //201 --> Object created. Usefull for the store actions

    }

    public function show(OTA_Update $update)
    {
        return $update;
    }

    public function update(Request $request, OTA_Update $update)
    {
        $validator = Validator::make($request->all(), [
            'bin_file_path' => 'required|string',
            'name' => 'string|between:2,100|nullable',
            'deploy_on' => 'required|date_format:d-m-Y H:i:s',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($validator->validated()){
            $update->update($request->all());
        }

        return response()->json($update,200); //200 --> OK, The standard success code and default option
    }

    public function destroy(OTA_Update $update)
    {
        $update->delete();
        return response()->json(null, 204); //204 --> No content. When action was executed succesfully, but there is no content to return
    }
}
