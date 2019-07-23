<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class days extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time'
    ];
}
