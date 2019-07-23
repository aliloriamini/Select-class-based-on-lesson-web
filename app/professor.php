<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $fillable = [
        'id',
        'personal_code',
        'name',
        'last_name',
        'max_time_work',
        'pr_day_repeat'
    ];
}
