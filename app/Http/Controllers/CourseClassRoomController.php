<?php

namespace App\Http\Controllers;

use App\course;
use App\CourseClassRoom;
use App\Imports\CourseClassRoomImport;
use App\usage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CourseClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CourseClassRooms = CourseClassRoom::latest()->paginate(20);
        foreach ($CourseClassRooms as $courseClassRoom){
            $usages = DB::table('usages')->where('code' , $courseClassRoom->usage)->value('name');
            $course = DB::table('courses')->where('id' , $courseClassRoom->course)->value('name');
            $courseClassRoom->usage = $usages;
            $courseClassRoom->course = $course;
        }
        return view('admin/courseClassRoom/all' , compact('CourseClassRooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usages = usage::all();
        $courses = course::all();
        return view('admin/courseClassRoom/create' , compact('usages','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        courseClassRoom::create($request->all());
        return redirect(route('CourseClassRoom.index'));
    }
    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new courseClassRoomImport, request()->file('import_file'));
        return redirect(route('CourseClassRoom.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseClassRoom  $courseClassRoom
     * @return \Illuminate\Http\Response
     */
    public function show(CourseClassRoom $courseClassRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseClassRoom  $courseClassRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseClassRoom $CourseClassRoom)
    {
        $usages = usage::all();
        $courses = course::all();
        return view('admin/courseClassRoom/edit' , compact('CourseClassRoom','usages', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseClassRoom  $courseClassRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseClassRoom $CourseClassRoom)
    {
        $CourseClassRoom->update($request->all());
        return redirect(route('CourseClassRoom.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseClassRoom  $courseClassRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseClassRoom $CourseClassRoom)
    {
        $CourseClassRoom->delete();
        return redirect(route('CourseClassRoom.index'));
    }
}
