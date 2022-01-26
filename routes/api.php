<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout','AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::get('/user-profile','AuthController@user-profile');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('organisations', 'App\Http\Controllers\OrganisationController@index');
});

Route::middleware(['auth', 'superadmin'])->prefix('super')->group(function () {
    Route::get('users', 'App\Http\Controllers\UserController@index');
});


// ORGANISATION
//Route::get('organisations', 'App\Http\Controllers\OrganisationController@index');
Route::get('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@show');
Route::post('organisations', 'App\Http\Controllers\OrganisationController@store');
Route::put('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@update');

// USER
//Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{user}', 'App\Http\Controllers\UserController@update');


// VALUE
Route::get('values/{weather_station_id}', 'App\Http\Controllers\ValueController@index');
Route::get('values/relais/{weather_station_id}', 'App\Http\Controllers\ValueController@relais');
Route::get('values/battery/{weather_station_id}', 'App\Http\Controllers\ValueController@battery');
Route::get('values/location/{weather_station_id}', 'App\Http\Controllers\ValueController@location');
Route::post('values', 'App\Http\Controllers\ValueController@store');

// ALARM
Route::get('alarms/station/{weather_station_id}', 'App\Http\Controllers\AlarmController@index');
Route::get('alarms/{alarm_id}', 'App\Http\Controllers\AlarmController@show');
Route::get('alarms/gsm/{weather_station_gsm}', 'App\Http\Controllers\AlarmController@gsm');
Route::post('alarms', 'App\Http\Controllers\AlarmController@store');
Route::put('alarms/{alarm}', 'App\Http\Controllers\AlarmController@update');
Route::delete('alarms/{alarm}', 'App\Http\Controllers\AlarmController@delete');


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
Route::get('updates/{update}', 'App\Http\Controllers\OTAController@show');
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
Route::get('stationupdates/{station_id}/{update_id}', 'App\Http\Controllers\WeatherStationUpdateController@show');
Route::get('stationupdates/update/{update_id}', 'App\Http\Controllers\WeatherStationUpdateController@specificUpdate');
Route::get('stationupdates/station/{station_id}', 'App\Http\Controllers\WeatherStationUpdateController@specificStation');
Route::post('stationupdates', 'App\Http\Controllers\WeatherStationUpdateController@store');
Route::delete('stationupdates/{stationUpdate}', 'App\Http\Controllers\WeatherStationUpdateController@delete');




