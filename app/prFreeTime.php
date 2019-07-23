<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prFreeTime extends Model
{
    protected $fillable=[
        'pr_name',
        'start_time_pr',
        'end_time_pr',
        'day_name'
    ];
}
