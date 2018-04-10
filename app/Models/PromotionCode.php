<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionCode extends Model
{
    public $table = 'promotion_codes';

    protected $guarded = ['id'];

    public function metas()
    {
        return $this->morphMany('App\Models\Meta','metable');
    }
}
