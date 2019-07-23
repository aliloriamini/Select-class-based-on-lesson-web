<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClassRoom extends Model
{
    protected $fillable = [
        'usage',
        'course',
        'chair_number',
        'work_table_number',
        'projector',
        'smart_board',
        'tv',
        'wallboard_writing_board',
        'showcase',
        'moving_board',
        'sound_system',
        'visual_system',
        'gas_cooler',
        'ninety_network',
        'wireless_signal_cover'
    ];
}
