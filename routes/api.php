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

// USER
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{user}', 'App\Http\Controllers\UserController@update');
Route::delete('users/{user}', 'App\Http\Controllers\UserController@delete');

// VALUE
Route::get('values/{weather_station_id}', 'App\Http\Controllers\ValueController@index');
Route::get('values/relais/{weather_station_id}', 'App\Http\Controllers\ValueController@relais');
Route::get('values/battery/{weather_station_id}', 'App\Http\Controllers\ValueController@battery');
Route::get('values/location/{weather_station_id}', 'App\Http\Controllers\ValueController@location');
Route::post('values', 'App\Http\Controllers\ValueController@store');

// ALARM
Route::get('alarms/{weather_station_id}', 'App\Http\Controllers\AlarmController@index');
Route::post('alarms', 'App\Http\Controllers\AlarmController@store');
Route::put('alarms/{alarm}', 'App\Http\Controllers\AlarmController@update');
Route::delete('alarms/{alarm}', 'App\Http\Controllers\AlarmController@delete');
Route::get('alarms/gsm/{weather_station_gsm}', 'App\Http\Controllers\AlarmController@gsm');


// WEATHERSTATION
Route::get('weatherstations/public', 'App\Http\Controllers\WeatherStationController@public');
Route::get('weatherstations', 'App\Http\Controllers\WeatherStationController@index');
Route::get('weatherstations/{weatherStation}', 'App\Http\Controllers\WeatherStationController@show');
Route::post('weatherstations', 'App\Http\Controllers\WeatherStationController@store');
Route::put('weatherstations/{weatherStation}', 'App\Http\Controllers\WeatherStationController@update');


// WEATHERSTATION USER
Route::get('stationusers', 'App\Http\Controllers\WeatherStationUserController@index');
Route::get('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@show');
Route::put('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@update');

// OTA UPDATE
Route::get('updates', 'App\Http\Controllers\OTAController@index');
Route::post('updates', 'App\Http\Controllers\OTAController@store');
Route::put('updates/{update}', 'App\Http\Controllers\OTAController@update');
Route::delete('updates/{update}', 'App\Http\Controllers\OTAController@delete');

// MAIL
Route::get('mails', 'App\Http\Controllers\MailController@index');
Route::get('mails/{mail}', 'App\Http\Controllers\MailController@show');
Route::post('mails', 'App\Http\Controllers\MailController@store');
Route::put('mails/{mail}', 'App\Http\Controllers\MailController@update');
Route::delete('mails/{mail}', 'App\Http\Controllers\MailController@delete');

// GRAPHTYPE
Route::get('types', 'App\Http\Controllers\GraphTypeController@index');

// WEATHER STATION UPDATE
Route::get('stationupdates', 'App\Http\Controllers\WeatherStationUpdateController@index');
Route::post('stationupdates', 'App\Http\Controllers\WeatherStationUpdateController@store');
Route::delete('stationupdates/{stationUpdate}', 'App\Http\Controllers\WeatherStationUpdateController@delete');




