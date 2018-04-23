<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Customer extends Authenticatable
{

    use LaratrustUserTrait;

    public $table = 'customers';

    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function addresses()
    {
        return $this->hasOne('App\Models\Address', 'customer_id');
    }

}
