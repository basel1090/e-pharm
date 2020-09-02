<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable=[

        'title',
        'image',
        'details',
        'comment',
        'published'

];
}
