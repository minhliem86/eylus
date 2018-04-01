<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'cities';

    public function districts()
    {
        return $this->hasMany('App\Models\District','parent_code','code');
    }
}
