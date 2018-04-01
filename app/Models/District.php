<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $table = 'districts';

    public function cities()
    {
        return $this->belongsTo('App\Models\City','parent_code','code');
    }

    public function wards()
    {
        return $this->hasMany('App\Models\Ward','parent_code','code');
    }
}
