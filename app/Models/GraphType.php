<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphType extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'name'
    ];

    public function values()
    {
        return $this->hasMany('App\Models\Value');
    }

    public function graphs()
    {
        return $this->hasMany('App\Models\Graph');
    }
}
