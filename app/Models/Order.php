<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getQty(){
        return $this->orderDetails()->sum('qty');
    }
}
