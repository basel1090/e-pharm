<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'old_price',
        'new_price',
        'brand_id',
        'category_id',
        'size',
        'active',
    ];

    public function category (){
        return $this->belongsTo('App\Models\Category' , 'category_id' , 'id');
    }
    public function brand (){
        return $this->belongsTo('App\Models\Brand' , 'brand_id' , 'id');
    }
}
