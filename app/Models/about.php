<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table="abouts";
    protected $fillable =[

       'image',
        'title',
        'description',
        'active',
    ];
}
