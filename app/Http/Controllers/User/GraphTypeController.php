<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller as Controller;

use App\Models\GraphType;
use Illuminate\Http\Request;

class GraphTypeController extends Controller
{
    public function index()
    {
        return GraphType::all();
    }
}
