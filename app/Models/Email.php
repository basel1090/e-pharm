<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table="subscribe";
    protected $fillable=[
        'email',
        ];
}
