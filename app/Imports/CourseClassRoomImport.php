<?php

namespace App\Imports;

use App\CourseClassRoom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseClassRoomImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CourseClassRoom([
            'course' => $row['course'],
            'usage' =>$row['usage'],
            'chair_number' => $row['chair_number'],
            'work_table_number' => $row['work_table_number'],
            'projector' => $row['projector'],
            'smart_board' => $row['smart_board'],
            'tv' => $row['tv'],
            'wallboard_writing_board' => $row['wallboard_writing_board'],
            'showcase' => $row['showcase'],
            'moving_board' => $row['showcase'],
            'sound_system' => $row['sound_system'],
            'visual_system' => $row['visual_system'],
            'gas_cooler' => $row['gas_cooler'],
            'ninety_network' => $row['ninety_network'],
            'wireless_signal_cover' => $row['wireless_signal_cover'],
        ]);
    }
}
