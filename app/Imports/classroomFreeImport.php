<?php

namespace App\Imports;

use App\classroomFree;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class classroomFreeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new classroomFree([
            'classroom_id' => $row['classroom_id'],
            'day_id'=> $row['day_id'],
            'start_time_class'=> $row['start_time'],
            'end_time_class'=> $row['end_time'],
        ]);
    }
}
