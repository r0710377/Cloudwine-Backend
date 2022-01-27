<?php

namespace App\Http\Controllers;

use App\Models\GraphType;
use Illuminate\Http\Request;

class GraphTypeController extends Controller
{
    public function index()
    {
        return GraphType::all();
    }
}
