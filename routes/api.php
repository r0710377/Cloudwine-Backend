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


// USER
Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');

// WEATHERSTATION
Route::get('weatherstations', 'WeatherstationController@index');
Route::get('weatherstations/{weatherstation}', 'WeatherstationController@show');
Route::post('weatherstations', 'WeatherstationController@store');
Route::put('weatherstations/{weatherstation}', 'WeatherstationController@update');

// WEATHERSTATION USER
Route::get('weatherStationUsers', 'WeatherStationUserController@index');
Route::get('weatherStationUsers/{weatherStationUser}', 'WeatherStationUserController@show');
Route::post('weatherStationUsers', 'WeatherStationUserController@store');
Route::put('weatherStationUsers/{weatherStationUser}', 'WeatherStationUserController@update');

// CONFIGURATION
Route::get('configurations', 'ConfigurationController@index');
Route::get('configurations/{configuration}', 'ConfigurationController@show');
Route::post('configurations', 'ConfigurationController@store');
Route::put('configurations/{configuration}', 'ConfigurationController@update');
