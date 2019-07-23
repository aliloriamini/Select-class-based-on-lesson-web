<?php

namespace App\Http\Controllers;

use App\classroom;
use App\classroomFree;
use App\days;
use App\Http\Requests\ClassroomFreeRequest;
use App\Imports\classroomFreeImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomFreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroomFrees = ClassroomFree::latest()->paginate(20);
        foreach ($classroomFrees as $classroomFree){
            $classroom = DB::table('classrooms')->where('id' , $classroomFree->classroom_id)->value('class_number');
            $days = DB::table('days')->where('id' , $classroomFree->day_id)->value('name');
            $classroomFree->classroom_id = $classroom;
            $classroomFree->day_id = $days;
        }
        return view('admin/classroomFree/all' , compact('classroomFrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = days::all();
        $classrooms = classroom::all();
        return view('admin/classroomFree/create',compact('days' , 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomFreeRequest $request)
    {
        classroomFree::create($request->all());
        return redirect(route('classroomFree.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new classroomFreeImport, request()->file('import_file'));
        return redirect(route('classroomFree.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\classroomFree  $classroomFree
     * @return \Illuminate\Http\Response
     */
    public function show(classroomFree $classroomFree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classroomFree  $classroomFree
     * @return \Illuminate\Http\Response
     */
    public function edit(classroomFree $classroomFree)
    {
        $days = days::all();
        $classrooms = classroom::all();
        return view('admin/classroomFree/edit' , compact('classroomFree','days' , 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classroomFree  $classroomFree
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomFreeRequest $request, classroomFree $classroomFree)
    {
        $classroomFree->update($request->all());
        return redirect(route('classroomFree.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classroomFree  $classroomFree
     * @return \Illuminate\Http\Response
     */
    public function destroy(classroomFree $classroomFree)
    {
        $classroomFree->delete();
        return redirect(route('classroomFree.index'));
    }
}
