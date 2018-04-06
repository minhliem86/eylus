<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';

    protected $guarded =['id'];

    public function metas()
    {
        return $this->morphMany('App\Models\Meta', 'metable');
    }
}
