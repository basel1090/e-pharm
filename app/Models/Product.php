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
}