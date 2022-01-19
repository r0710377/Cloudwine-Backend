<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Models\Organization;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// ORGANIZATION
Route::get('organizations', 'OrganizationController@index');
Route::get('organizations/{organization}', 'OrganizationController@show');
Route::post('organizations', 'OrganizationController@store');
Route::put('organizations/{organization}', 'OrganizationController@update');
//Route::delete('organizations/{organization}', 'OrganizationController@delete');

