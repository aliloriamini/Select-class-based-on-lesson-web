<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class_number'=> 'required',
            'usage'=> 'required',
            'building'=> 'required',
            'floor'=> 'required',
            'chair_number'=> 'required',
            'work_table_number'=> 'required',
            'projector'=> 'required',
            'smart_board'=> 'required',
            'tv'=> 'required',
            'wallboard_writing_board'=> 'required',
            'showcase'=> 'required',
            'moving_board'=> 'required',
            'sound_system'=> 'required',
            'visual_system'=> 'required',
            'gas_cooler'=> 'required',
            'ninety_network'=> 'required',
            'wireless_signal_cover' => 'required'
        ];
    }
}
