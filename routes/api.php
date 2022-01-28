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
Route::get('switchstate/{weather_station_gsm}','App\Http\Controllers\User\ValueController@state');
Route::put('switchstate/{weather_station_gsm}','App\Http\Controllers\User\ValueController@stateupdate');

//USER
Route::get('weatherstations', 'App\Http\Controllers\WeatherStationController@public');
Route::get('weatherstations/{weatherStation}', 'App\Http\Controllers\WeatherStationController@publicid');
Route::get('values/{weatherStation}', 'App\Http\Controllers\ValueController@index');
Route::get('values/relais/{weatherStation}', 'App\Http\Controllers\ValueController@relais');
Route::get('values/battery/{weatherStation}', 'App\Http\Controllers\ValueController@battery');
Route::get('values/location/{weatherStation}', 'App\Http\Controllers\ValueController@location');

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');

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
    Route::get('weatherstations/{weatherStation}', 'Admin\WeatherStationController@show');
    Route::get('weatherstations', 'Admin\WeatherStationController@index');

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
    Route::get('users/{user}', 'Admin\UserController@show');
    Route::put('users/{user}', 'Admin\UserController@update');

    //ALARM
    Route::get('alarms/station/{weather_station_id}', 'AlarmController@index');
    Route::get('alarms/{alarm_id}', 'AlarmController@show');
    Route::post('alarms', 'AlarmController@store');
    Route::put('alarms/{alarm}', 'AlarmController@update');
    Route::delete('alarms/{alarm}', 'AlarmController@delete');

    //WEATHERSTATION
    Route::get('weatherstations/{weatherStation}', 'Admin\WeatherStationController@show');
    Route::put('weatherstations/{weatherStation}', 'Admin\WeatherStationController@update');
});

// SUPERADMIN
Route::middleware(['auth', 'superadmin'])->prefix('super')->namespace('App\Http\Controllers')->group(function () {
    //ORGANISATION
    Route::resource('organisations', 'SuperAdmin\OrganisationController');
//    Route::get('organisations', 'OrganisationController@index');
//    Route::get('organisations/{organisation}', 'OrganisationController@details');
//    Route::post('organisations', 'OrganisationController@store');
//    Route::put('organisations/{organisation}', 'OrganisationController@update1');

    //USER
    Route::get('users', 'SuperAdmin\UserController@index');

    //WEATHERSTATIONS
    Route::resource('weatherstations', 'SuperAdmin\WeatherStationController');
//    Route::get('weatherstations', 'WeatherStationController@index');
//    Route::post('weatherstations', 'WeatherStationController@store');
//    Route::get('weatherstations/{weather_station_id}', 'WeatherStationController@show');
//    Route::put('weatherstations/{weatherStation}', 'WeatherStationController@update');


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



