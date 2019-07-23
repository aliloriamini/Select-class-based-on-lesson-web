<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekly_Schedule_Maker extends Model
{
    protected $fillable = [
        'name',
        'course_id',
        'professor_id',
        'start_time',
        'end_time',
        'classroom_id',
        'day'
    ];
}
