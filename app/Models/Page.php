<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = 'pages';

    protected $guarded =['id'];

    public function metas()
    {
        return $this->morphMany('App\Models\Meta', 'metable');
    }
}
