<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $fillable = [
        'title',
        'image',
        'published'
    ];
    public function product(){
        return $this->hasMany('App\Models\Product');
    }

}
