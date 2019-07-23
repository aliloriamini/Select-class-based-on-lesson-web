<?php

namespace App\Imports;

use App\professor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class professorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new professor([
            'personal_code' => $row['personal_code'],
            'name' => $row['name'],
            'last_name' => $row['last_name'],
            'max_time_work' => $row['max_time_work'],
            'pr_day_repeat' => $row['pr_day_repeat'],
        ]);
    }
}
