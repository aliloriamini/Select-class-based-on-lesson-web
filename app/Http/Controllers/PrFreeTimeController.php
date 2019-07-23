<?php

namespace App\Http\Controllers;

use App\days;
use App\Http\Requests\PrFreeTimeRequest;
use App\Imports\prFreeTimeImport;
use App\prFreeTime;
use App\professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PrFreeTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prFreeTimes = PrFreeTime::latest()->paginate(20);
        foreach ($prFreeTimes as $prFreeTime){
            $professor = DB::table('professors')->where('id' , $prFreeTime->pr_name)->value('name');
            $days = DB::table('days')->where('id' , $prFreeTime->day_name)->value('name');
            $prFreeTime->pr_name = $professor;
            $prFreeTime->day_name = $days;
        }
        return view('admin/prFreeTime/all' , compact('prFreeTimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = days::all();
        $professors = professor::all();
        return view('admin/prFreeTime/create',compact('days' , 'professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrFreeTimeRequest $request)
    {
        prFreeTime::create($request->all());
        return redirect(route('prFreeTime.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new prFreeTimeImport, request()->file('import_file'));
        return redirect(route('prFreeTime.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\prFreeTime  $prFreeTime
     * @return \Illuminate\Http\Response
     */
    public function show(prFreeTime $prFreeTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prFreeTime  $prFreeTime
     * @return \Illuminate\Http\Response
     */
    public function edit(prFreeTime $prFreeTime)
    {
        $days = days::all();
        $professors = professor::all();
        return view('admin/prFreeTime/edit' , compact('prFreeTime','days' , 'professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prFreeTime  $prFreeTime
     * @return \Illuminate\Http\Response
     */
    public function update(PrFreeTimeRequest $request, prFreeTime $prFreeTime)
    {
        $prFreeTime->update($request->all());
        return redirect(route('prFreeTime.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prFreeTime  $prFreeTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(prFreeTime $prFreeTime)
    {
        $prFreeTime->delete();
        return redirect(route('prFreeTime.index'));
    }
}
