<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public $table = 'metables';

    protected $guarded = ['id'];

    public function metable()
    {
        return $this->morphTo();
    }
}
