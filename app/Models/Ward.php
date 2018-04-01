<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $table = 'wards';

    public function districts()
    {
        return $this->belongsTo('App\Models\District','parent_code','code');
    }
}
