<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total_price',
        'order_status_id',
    ];
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function product(){
        return $this->belongsTo("App\Models\Product");
    }
    public function orderStatus(){
        return $this->belongsTo("App\Models\OrderStatus");
    }

}
