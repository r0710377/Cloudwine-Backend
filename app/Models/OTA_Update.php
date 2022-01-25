<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTA_Update extends Model
{
    /*** The attributes that are mass assignable.*/
    protected $fillable = [
        'bin_file_path',
        'name',
        'deploy_on'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function values()
    {
        return $this->hasMany('App\Models\Value');
    }
}
