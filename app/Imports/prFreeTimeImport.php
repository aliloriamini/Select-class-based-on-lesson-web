<?php

namespace App\Imports;

use App\prFreeTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class prFreeTimeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new prFreeTime([
            'pr_name' =>$row['pr_name'],
            'start_time_pr' =>$row['start_time'],
            'end_time_pr' =>$row['end_time'],
            'day_name' =>$row['day_name'],
        ]);
    }
}
