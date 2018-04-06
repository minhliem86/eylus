<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $table = 'brands';

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','product_id');
    }

    public function metas()
    {
        return $this->morphMany('App\Models\Meta', 'metable');
    }
}
