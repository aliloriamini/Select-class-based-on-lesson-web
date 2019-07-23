<?php

namespace App\Http\Controllers;

use App\course;
use App\Http\Requests\ProfessorCourseRequest;
use App\Imports\professorCourseImport;
use App\prFreeTime;
use App\professor;
use App\professorCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use function MongoDB\BSON\toJSON;

class ProfessorCourseController extends Controller
{
    public $test3 = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professorCourses = ProfessorCourse::latest()->paginate(20);
        foreach ($professorCourses as $professorCourse){
            $professor = DB::table('professors')->where('id' , $professorCourse->professor_id)->value('name');
            $course = DB::table('courses')->where('id' , $professorCourse->course_id)->value('name');
            $professorCourse->professor_id = $professor;
            $professorCourse->course_id = $course;
        }
        return view('admin/professorCourses/all' , compact('professorCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::all();
        $professors = professor::all();
        return view('admin/professorCourses/create' , compact('courses' ,'professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorCourseRequest $request)
    {
        $course = DB::table('courses')->where('id' , $request->course_id);
        $professor = DB::table('professors')->where('id' , $request->professor_id);
        $test = DB::select('SELECT sum(course_hour) AS course_hour FROM professor_courses WHERE course_id = ? &&(course_type = ? || course_type = ?) ',
            [$request->course_id,1,2]);
        $test1 = DB::select('SELECT sum(course_hour) AS course_hour FROM professor_courses WHERE course_id = ? &&(course_type = ? || course_type = ?) ',
            [$request->course_id,0,2]);
        $test2 = DB::select('SELECT sum(course_hour) AS course_hour FROM professor_courses WHERE professor_id = ? ', [$request->professor_id]);

        $course_day = $course->value('course_day');
        while ($course_day >= 1){
            $day = $course_day % 10;
            $course_day = $course_day / 10;
            $count = prFreeTime::where('day_name', $day)->count();
            if($count > 0) {$this->test3 = $this->test3*10 + $day;}
        }
        if($test[0]->course_hour >= ($request->course_hour + $course->value('hour_thr')) &&
            ($request->course_type == 1||$request->course_type == 2)){
                alert()->error('ساعات تیوری برای این درس محیا نمی باشد', 'محدودیت ساعات تیوری')->persistent('بستن');
//            $courses = course::all();
//            $professors = professor::all();
//            $professorCourse = $request;
//            return view('admin/professorCourses/edit' , compact('courses' ,'professors', 'professorCourse'));
            return redirect(route('professorCourse.create'));
        }
        else if($test1[0]->course_hour >= ($request->course_hour + $course->value('hour_art')) &&
            ($request->course_type == 0||$request->course_type == 2)){
                alert()->error('ساعات عملی برای این درس محیا نمی باشد', 'محدودیت ساعات عملی')->persistent('بستن');
                return redirect(route('professorCourse.create'));
            }
        else if($professor->value('max_time_work') <= ($request->course_hour + $test2[0]->course_hour)){
            alert()->error('ساعات این استاد پر می باشد', 'محدودیت ساعات استاد')->persistent('بستن');
            return redirect(route('professorCourse.create'));
        }
        else if($this->test3 == 0){
            alert()->error('ساعات این استاد متناسب با درس نمی باشد', 'محدودیت روز استاد با درس')->persistent('بستن');
            return redirect(route('professorCourse.create'));
        }
        else {
//            $request->$CourseProfessorSameTime =>
                $input = $request->all();
                $input["CourseProfessorSameTime"] = $this->test3;
            professorCourse::create($input);
            alert()->success('درس با موفقیت به استاد تخصیص یافت', 'ثبت با موفقیت')->persistent('بستن');
            return redirect(route('professorCourse.index'));
        }
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new professorCourseImport, request()->file('import_file'));
        return redirect(route('professorCourse.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\professorCourse  $professorCourse
     * @return \Illuminate\Http\Response
     */
    public function show(professorCourse $professorCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\professorCourse  $professorCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(professorCourse $professorCourse)
    {
        $courses = course::all();
        $professors = professor::all();
        return view('admin/professorCourses/edit' , compact('professorCourse','courses' , 'professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\professorCourse  $professorCourse
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorCourseRequest $request, professorCourse $professorCourse)
    {
        $professorCourse->update($request->all());
        return redirect(route('professorCourse.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\professorCourse  $professorCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(professorCourse $professorCourse)
    {
        $professorCourse->delete();
        return redirect(route('professorCourse.index'));
    }
}
