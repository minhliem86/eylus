<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $guarded = ['id'];

    public function brands()
    {
        return $this->hasMany('App\Models\Brand');
    }
}
