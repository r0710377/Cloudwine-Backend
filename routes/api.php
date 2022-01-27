<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

//WEATHER STATION
Route::post('values', 'App\Http\Controllers\User\ValueController@store');
Route::get('alarms/gsm/{weather_station_gsm}', 'App\Http\Controllers\AlarmController@gsm');

//USER
Route::get('weatherstations/public', 'App\Http\Controllers\WeatherStationController@public');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');

//VERWIJDEREN
Route::get('users', 'App\Http\Controllers\UserController@index');

//LOGGED USER
Route::middleware(['auth'])->prefix('user')->namespace('App\Http\Controllers')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::put('profile', 'User\ProfileController@update');
    Route::post('password', 'User\PasswordController@update');

    //LOGIN
    Route::post('/logout','AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh'); //refresh token

    //ORGANISATION
    Route::get('organisation', 'OrganisationController@show');

    //Value
    Route::get('values/{weather_station_id}', 'User\ValueController@index');
    Route::get('values/relais/{weather_station_id}', 'User\ValueController@relais');
    Route::get('values/battery/{weather_station_id}', 'User\ValueController@battery');
    Route::get('values/location/{weather_station_id}', 'User\ValueController@location');

    //WEATHERSTATION
    Route::get('weatherstations/{weatherStation}', 'WeatherStationController@show');

    //WEATHERSTATIONUSER
    Route::get('stationusers/{weather_station_id}', 'WeatherStationUserController@show');
    Route::put('stationusers/{weather_station_id}', 'WeatherStationUserController@update');

    //GRAPHTYPE
    Route::get('types', 'User\GraphTypeController@index');
});

//ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('App\Http\Controllers')->group(function () {
    //ORGANISATION
    Route::put('organisation', 'Admin\OrganisationController@update');

    //USER
    Route::get('users', 'Admin\UserController@index');
    Route::post('users', 'Admin\UserController@store');
    Route::put('users/{user}', 'Admin\UserController@update');

    //ALARM
    Route::get('alarms/station/{weather_station_id}', 'AlarmController@index');
    Route::get('alarms/{alarm_id}', 'AlarmController@show');
    Route::post('alarms', 'AlarmController@store');
    Route::put('alarms/{alarm}', 'AlarmController@update');
    Route::delete('alarms/{alarm}', 'AlarmController@delete');

    //WEATHERSTATION
    Route::put('weatherstations/{weatherStation}', 'WeatherStationController@update');
});

// SUPERADMIN
Route::middleware(['auth', 'superadmin'])->prefix('super')->namespace('App\Http\Controllers')->group(function () {
    //ORGANISATION
    Route::get('organisations', 'OrganisationController@index');
    Route::get('organisations/{organisation}', 'OrganisationController@details');
    Route::post('organisations', 'OrganisationController@store');
    Route::put('organisations/{organisation}', 'OrganisationController@update1');

    //USER
    Route::get('users', 'SuperAdmin\UserController@index');

    //WEATHERSTATIONS
    Route::get('weatherstations', 'WeatherStationController@index');
    Route::post('weatherstations', 'WeatherStationController@store');

    //OTA UPDATE
    Route::resource('updates', 'SuperAdmin\OTAController');

    //WEATHER STATION UPDATE
    Route::get('stationupdates', 'SuperAdmin\WeatherStationUpdateController@index');
    Route::get('stationupdates/{station_id}/{update_id}', 'SuperAdmin\WeatherStationUpdateController@show');
    Route::get('stationupdates/update/{update_id}', 'SuperAdmin\WeatherStationUpdateController@specificUpdate');
    Route::get('stationupdates/station/{station_id}', 'SuperAdmin\WeatherStationUpdateController@specificStation');
    Route::post('stationupdates', 'SuperAdmin\WeatherStationUpdateController@store');
    Route::delete('stationupdates/{stationUpdate}', 'SuperAdmin\WeatherStationUpdateController@delete');

    //MAIL
    Route::resource('mails', 'SuperAdmin\MailController');
});



