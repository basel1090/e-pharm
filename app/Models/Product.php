<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    protected $fillable = [
        'title',
        'description',
        'image',
        'old_price',
        'new_price',
        'category_id',
        'size',
        'active',

    ];
    public function category(){
        return $this->belongsTo('App\Models\Category' , 'category_id' , 'id');
    }
}
