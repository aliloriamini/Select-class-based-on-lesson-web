<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'=> 'required',
            'college_name'=> 'required',
            'group_name'=> 'required',
            'course_type'=> 'required',
            'section'=> 'required',
            'term'=> 'required',
            'stu_number'=> 'required',
            'theoretical'=> 'required',
            'artificial'=> 'required',
            'coefficient_thr'=> 'required',
            'coefficient_art'=> 'required',
            'hour_thr'=> 'required',
            'hour_art'=> 'required',
            'course_day'=> 'required',
            'day_rep'=> 'required'
        ];
    }
}
