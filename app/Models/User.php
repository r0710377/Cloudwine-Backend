<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'organisation_id',
        'first_name',
        'surname',
        'email',
        'gsm',
        'password',
        'is_active',
        'is_admin',
        'is_superadmin',
        'can_message',
    ];

    /*** The attributes that should be hidden for serialization.*/
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public function organisation()
    {
        return $this->belongsTo('App\Organisation')->withDefault();   // a user belongs to an organization
    }

    public function weatherStationUsers()
    {
        return $this->hasMany('App\WeatherStationUser');
    }

//    /*** The attributes that should be cast.*/
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
