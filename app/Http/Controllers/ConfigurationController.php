<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        return Configuration::all();
    }

    public function show(Configuration $configuration)
    {
        return $configuration;
    }

    public function store(Request $request)
    {
        $configuration = Configuration::create($request->all());
        return response()->json($configuration, 201); //201 --> Object created. Usefull for the store actions
    }

    public function update(Request $request, Configuration $configuration)
    {
        $configuration->update($request->all());
        return response()->json($configuration,200); //200 --> OK, The standard success code and default option
    }
}
