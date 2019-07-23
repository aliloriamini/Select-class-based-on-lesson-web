<?php

namespace App\Imports;

use App\course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class courseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new course([
            'name' => $row['name'],
            'college_name'=> $row['college_name'],
            'group_name'=> $row['group_name'],
            'course_type'=> $row['course_type'],
            'section'=> $row['section'],
            'term'=> $row['term'],
            'stu_number'=> $row['stu_number'],
            'theoretical'=> $row['theoretical'],
            'artificial'=> $row['artificial'],
            'coefficient_thr'=> $row['coefficient_thr'],
            'coefficient_art'=> $row['coefficient_art'],
            'hour_thr'=> $row['hour_thr'],
            'hour_art'=> $row['hour_art'],
            'course_day'=> $row['course_day'],
            'day_rep'=> $row['day_rep'],
        ]);
    }
}
