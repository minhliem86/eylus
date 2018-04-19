<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $guarded = ['id'];

    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function metas()
    {
        return $this->morphMany('App\Models\Meta', 'metable');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photoable');
    }
}
