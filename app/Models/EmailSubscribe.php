<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSubscribe extends Model
{
    public $table = 'email_subscribes';

    protected $guarded =['id'];
}
