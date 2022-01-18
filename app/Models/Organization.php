<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');   // a genre has many records
    }
}
