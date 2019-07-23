<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professorCourse extends Model
{
    protected $fillable = [
        'course_id',
        'professor_id',
        'course_type',
        'course_hour',
        'CourseProfessorSameTime'
    ];
}
