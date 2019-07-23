<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    protected $fillable = [
        'class_number',
        'usage',
        'building',
        'floor',
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
