<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $guarded = ['id'];

    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'product_id');
    }
}
