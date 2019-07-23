<?php

namespace App\Http\Controllers;

use App\building;
use App\classroom;
use App\Http\Requests\ClassroomRequest;
use App\Imports\classroomImport;
use App\usage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::latest()->paginate(20);
        foreach ($classrooms as $classroom){
            $usages = DB::table('usages')->where('code' , $classroom->usage)->value('name');
            $buildings = DB::table('buildings')->where('code' , $classroom->building)->value('name');
            $classroom->usage = $usages;
            $classroom->building = $buildings;
        }
        return view('admin/classroom/all' , compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usages = usage::all();
        $buildings = building::all();
        return view('admin/classroom/create' , compact('usages','buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {

        classroom::create($request->all());
        return redirect(route('classroom.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new classroomImport, request()->file('import_file'));
        return redirect(route('classroom.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(classroom $classroom)
    {
        $usages = usage::all();
        $buildings = building::all();
        return view('admin/classroom/edit' , compact('classroom','usages', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, classroom $classroom)
    {
        $classroom->update($request->all());
        return redirect(route('classroom.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(classroom $classroom)
    {
        $classroom->delete();
        return redirect(route('classroom.index'));
    }
}
