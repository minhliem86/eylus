<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tygia extends Model
{
    public $table = 'tygia';

    protected $primaryKey = 'name';

    public $incrementing = false;

    protected $guarded = ['id'];
}
