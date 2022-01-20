<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ORGANISATION
Route::get('organisations', 'App\Http\Controllers\OrganisationController@index');
Route::get('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@show');
Route::post('organisations', 'App\Http\Controllers\OrganisationController@store');
Route::put('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@update');
//Route::delete('organisations/{organisation}', 'OrganizationController@delete');


// USER
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{user}', 'App\Http\Controllers\UserController@update');

// VALUE
Route::get('values/{weather_station_id}', 'App\Http\Controllers\ValueController@index');
Route::get('values/{value}', 'App\Http\Controllers\ValueController@show');


// WEATHERSTATION
Route::get('weatherstations', 'App\Http\Controllers\WeatherstationController@index');
Route::get('weatherstations/{weatherstation}', 'App\Http\Controllers\WeatherstationController@show');
Route::post('weatherstations', 'App\Http\Controllers\WeatherstationController@store');
Route::put('weatherstations/{weatherstation}', 'App\Http\Controllers\WeatherstationController@update');


// WEATHERSTATION USER
Route::get('weatherStationUsers', 'App\Http\Controllers\WeatherStationUserController@index');
Route::get('weatherStationUsers/{weatherStationUser}', 'App\Http\Controllers\WeatherStationUserController@show');
Route::post('weatherStationUsers', 'App\Http\Controllers\WeatherStationUserController@store');
Route::put('weatherStationUsers/{weatherStationUser}', 'App\Http\Controllers\WeatherStationUserController@update');

