<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'city',
        'country',
    ];


    public function users()
    {
        return $this->hasMany('App\User');   // a genre has many records
    }
}
