<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classroomFree extends Model
{
    protected $fillable = [
        'classroom_id',
        'day_id',
        'start_time_class',
        'end_time_class'
    ];
}
