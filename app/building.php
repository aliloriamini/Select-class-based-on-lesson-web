<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];
}
