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
Route::delete('users/{user}', 'App\Http\Controllers\UserController@delete');

// VALUE
Route::get('values/{weather_station_id}', 'App\Http\Controllers\ValueController@index');
Route::get('values/{value}', 'App\Http\Controllers\ValueController@show');

// ALARM
Route::get('alarms/{weather_station_id}', 'App\Http\Controllers\AlarmController@index');
Route::put('alarms/{alarm}', 'App\Http\Controllers\AlarmController@update');

// WEATHERSTATION
Route::get('weatherstations', 'App\Http\Controllers\WeatherstationController@index');
Route::get('weatherstations/{weatherstation}', 'App\Http\Controllers\WeatherstationController@show');
Route::post('weatherstations', 'App\Http\Controllers\WeatherstationController@store');
Route::put('weatherstations/{weatherstation}', 'App\Http\Controllers\WeatherstationController@update');


// WEATHERSTATION USER
Route::get('stationusers', 'App\Http\Controllers\WeatherStationUserController@index');
Route::get('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@show');
Route::put('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@update');

// OTA UPDATE
Route::get('updates', 'App\Http\Controllers\OTAController@index');
Route::post('updates/{update_id}', 'App\Http\Controllers\OTAController@show');
Route::delete('updates/{update_id}', 'App\Http\Controllers\OTAController@update');

// MAIL
Route::get('mails', 'App\Http\Controllers\MailController@index');
Route::get('mails/{mail}', 'App\Http\Controllers\MailController@show');
Route::post('mails', 'App\Http\Controllers\MailController@store');
Route::put('mails/{mail}', 'App\Http\Controllers\MailController@update');
Route::delete('mails/{mail}', 'App\Http\Controllers\MailController@delete');


