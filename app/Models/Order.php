<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $guarded = ['id'];

    public function customers()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function paymentmethods()
    {
        return $this->belongsTo('App\Models\PaymentMethod','paymentmethod_id');
    }

    public function shipstatus()
    {
        return $this->belongsTo('App\Models\ShipStatus', 'shipstatus_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity', 'unit_price');
    }
}
