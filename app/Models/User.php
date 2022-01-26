<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

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
        'can_receive_notification'
    ];

    /*** The attributes that should be hidden for serialization.*/
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];


//    /*** The attributes that should be cast.*/
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Get the identifier that will be stored in the subject claim of the JWT.
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    //Return a key value array, containing any custom claims to be added to the JWT.
    public function getJWTCustomClaims() {
        return [];
    }

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation')->withDefault();   // a user belongs to an organization
    }

    public function weatherStationUsers()
    {
        return $this->hasMany('App\Models\WeatherStationUser');
    }


}
