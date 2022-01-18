<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphType extends Model
{
    public function values()
    {
        return $this->hasMany('App\Value');
    }

    public function graphs()
    {
        return $this->hasMany('App\Graph');
    }
}
