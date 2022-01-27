<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

//WEATHER STATION
Route::post('values', 'App\Http\Controllers\ValueController@store');
Route::get('alarms/gsm/{weather_station_gsm}', 'App\Http\Controllers\AlarmController@gsm');

//USER
Route::get('weatherstations/public', 'App\Http\Controllers\WeatherStationController@public');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');

//VERWIJDEREN
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('stationusers', 'App\Http\Controllers\WeatherStationUserController@index');

//LOGGED USER
Route::middleware(['auth'])->prefix('user')->namespace('App\Http\Controllers')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::post('password', 'User\PasswordController@update');

    //LOGIN
    Route::post('/logout','AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh'); //refresh token

    //ORGANISATION
    Route::get('organisation', 'OrganisationController@show');

    //Value
    Route::get('values/{weather_station_id}', 'ValueController@index');
    Route::get('values/relais/{weather_station_id}', 'ValueController@relais');
    Route::get('values/battery/{weather_station_id}', 'ValueController@battery');
    Route::get('values/location/{weather_station_id}', 'ValueController@location');

    //WEATHERSTATION
    Route::get('weatherstations/{weatherStation}', 'WeatherStationController@show');

    //WEATHERSTATIONUSER
    Route::get('stationusers/{weather_station_id}', 'WeatherStationUserController@show');
    Route::put('stationusers/{weather_station_id}', 'WeatherStationUserController@update');

    //GRAPHTYPE
    Route::get('types', 'GraphTypeController@index');

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
    Route::post('organisations', 'OrganisationController@store');

    //USER
    Route::get('users', 'SuperAdmin\UserController@index');

    //WEATHERSTATIONS
    Route::get('weatherstations', 'WeatherStationController@index');
    Route::post('weatherstations', 'WeatherStationController@store');

    //OTA UPDATE
    Route::get('updates', 'OTAController@index');
    Route::get('updates/{update}', 'OTAController@show');
    Route::post('updates', 'OTAController@store');
    Route::put('updates/{update}', 'OTAController@update');
    Route::delete('updates/{update}', 'OTAController@delete');

    //WEATHER STATION UPDATE
    Route::get('stationupdates', 'WeatherStationUpdateController@index');
    Route::get('stationupdates/{station_id}/{update_id}', 'WeatherStationUpdateController@show');
    Route::get('stationupdates/update/{update_id}', 'WeatherStationUpdateController@specificUpdate');
    Route::get('stationupdates/station/{station_id}', 'WeatherStationUpdateController@specificStation');
    Route::post('stationupdates', 'WeatherStationUpdateController@store');
    Route::delete('stationupdates/{stationUpdate}', 'WeatherStationUpdateController@delete');

    //MAIL
    Route::resource('mails', 'SuperAdmin\MailController');

//    Route::get('mails', 'App\Http\Controllers\MailController@index');
//    Route::get('mails/{mail}', 'App\Http\Controllers\MailController@show');
//    Route::post('mails', 'App\Http\Controllers\MailController@store');
//    Route::put('mails/{mail}', 'App\Http\Controllers\MailController@update');
//    Route::delete('mails/{mail}', 'App\Http\Controllers\MailController@delete');

});


// ORGANISATION
//Route::get('organisations', 'App\Http\Controllers\OrganisationController@index');
//Route::get('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@show');
//Route::put('organisations/{organisation}', 'App\Http\Controllers\OrganisationController@update');

// USER
//Route::get('users', 'App\Http\Controllers\UserController@index');
//Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
//Route::post('users', 'App\Http\Controllers\UserController@store');
//Route::put('users/{user}', 'App\Http\Controllers\UserController@update');


// VALUE
//Route::get('values/{weather_station_id}', 'App\Http\Controllers\ValueController@index');
//Route::get('values/relais/{weather_station_id}', 'App\Http\Controllers\ValueController@relais');
//Route::get('values/battery/{weather_station_id}', 'App\Http\Controllers\ValueController@battery');
//Route::get('values/location/{weather_station_id}', 'App\Http\Controllers\ValueController@location');
//Route::post('values', 'App\Http\Controllers\ValueController@store');

// ALARM
//Route::get('alarms/station/{weather_station_id}', 'App\Http\Controllers\AlarmController@index');
//Route::get('alarms/{alarm_id}', 'App\Http\Controllers\AlarmController@show');
//Route::post('alarms', 'App\Http\Controllers\AlarmController@store');
//Route::put('alarms/{alarm}', 'App\Http\Controllers\AlarmController@update');
//Route::delete('alarms/{alarm}', 'App\Http\Controllers\AlarmController@delete');
//Route::get('alarms/gsm/{weather_station_gsm}', 'App\Http\Controllers\AlarmController@gsm');


// WEATHERSTATION
//Route::get('weatherstations/public', 'App\Http\Controllers\WeatherStationController@public');
//Route::get('weatherstations', 'App\Http\Controllers\WeatherStationController@index');
//Route::get('weatherstations/{weatherStation}', 'App\Http\Controllers\WeatherStationController@show');
//Route::post('weatherstations', 'App\Http\Controllers\WeatherStationController@store');
//Route::put('weatherstations/{weatherStation}', 'App\Http\Controllers\WeatherStationController@update');


// WEATHERSTATION USER
//Route::get('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@show');
//Route::put('stationusers/{user_id}/{weather_station_id}', 'App\Http\Controllers\WeatherStationUserController@update');

// OTA UPDATE
//Route::get('updates', 'App\Http\Controllers\OTAController@index');
//Route::get('updates/{update}', 'App\Http\Controllers\OTAController@show');
//Route::post('updates', 'App\Http\Controllers\OTAController@store');
//Route::put('updates/{update}', 'App\Http\Controllers\OTAController@update');
//Route::delete('updates/{update}', 'App\Http\Controllers\OTAController@delete');

// MAIL
//Route::get('mails', 'App\Http\Controllers\MailController@index');
//Route::get('mails/{mail}', 'App\Http\Controllers\MailController@show');
//Route::post('mails', 'App\Http\Controllers\MailController@store');
//Route::put('mails/{mail}', 'App\Http\Controllers\MailController@update');
//Route::delete('mails/{mail}', 'App\Http\Controllers\MailController@delete');

// GRAPHTYPE
//Route::get('types', 'App\Http\Controllers\GraphTypeController@index');

// WEATHER STATION UPDATE
//Route::get('stationupdates', 'App\Http\Controllers\WeatherStationUpdateController@index');
//Route::get('stationupdates/{station_id}/{update_id}', 'App\Http\Controllers\WeatherStationUpdateController@show');
//Route::get('stationupdates/update/{update_id}', 'App\Http\Controllers\WeatherStationUpdateController@specificUpdate');
//Route::get('stationupdates/station/{station_id}', 'App\Http\Controllers\WeatherStationUpdateController@specificStation');
//Route::post('stationupdates', 'App\Http\Controllers\WeatherStationUpdateController@store');
//Route::delete('stationupdates/{stationUpdate}', 'App\Http\Controllers\WeatherStationUpdateController@delete');




