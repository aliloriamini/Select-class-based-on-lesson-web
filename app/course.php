<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'name',
        'college_name',
        'group_name',
        'course_type',
        'section',
        'term',
        'stu_number',
        'theoretical',
        'artificial',
        'coefficient_thr',
        'coefficient_art',
        'hour_thr',
        'hour_art',
        'course_day',
        'day_rep'
    ];
}
