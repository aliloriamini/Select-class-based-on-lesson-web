<?php

namespace App\Imports;

use App\daySeparate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class daySeparateImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new daySeparate([
            'name' =>$row['name'],
            'start_time'=>$row['start_time'],
            'end_time'=>$row['end_time'],
            'available'=>$row['available'],
        ]);
    }
}
