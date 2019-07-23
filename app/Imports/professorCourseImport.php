<?php

namespace App\Imports;

use App\professorCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class professorCourseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new professorCourse([
            'course_id' =>$row['course_id'],
            'professor_id'=>$row['professor_id'],
            'course_type'=>$row['course_type'],
            'course_hour'=>$row['course_hour'],
        ]);
    }
}
