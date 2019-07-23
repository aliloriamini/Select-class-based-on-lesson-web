<?php

namespace App\Imports;

use App\days;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class daysImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new days([
            'name' =>$row['name'],
            'start_time'=>$row['start_time'],
            'end_time'=>$row['end_time'],
        ]);
    }
}
