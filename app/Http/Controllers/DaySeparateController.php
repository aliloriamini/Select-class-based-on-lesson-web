<?php

namespace App\Http\Controllers;

use App\days;
use App\daySeparate;
use App\Http\Requests\DaySeparateRequest;
use App\Imports\daySeparateImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DaySeparateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daySeparates = DaySeparate::latest()->paginate(20);
        foreach ($daySeparates as $daySeparate){
            $days = DB::table('days')->where('id' , $daySeparate->name)->value('name');
            $daySeparate->name = $days;
        }
        return view('admin/daySeparate/all' , compact('daySeparates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = days::all();
        return view('admin/daySeparate/create',compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DaySeparateRequest $request)
    {
        daySeparate::create($request->all());
        return redirect(route('daySeparate.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new daySeparateImport, request()->file('import_file'));
        return redirect(route('daySeparate.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\daySeparate  $daySeparate
     * @return \Illuminate\Http\Response
     */
    public function show(daySeparate $daySeparate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\daySeparate  $daySeparate
     * @return \Illuminate\Http\Response
     */
    public function edit(daySeparate $daySeparate)
    {
        $days = days::all();
        return view('admin/daySeparate/edit' , compact('daySeparate','days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\daySeparate  $daySeparate
     * @return \Illuminate\Http\Response
     */
    public function update(DaySeparateRequest $request, daySeparate $daySeparate)
    {
        $daySeparate->update($request->all());
        return redirect(route('daySeparate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\daySeparate  $daySeparate
     * @return \Illuminate\Http\Response
     */
    public function destroy(daySeparate $daySeparate)
    {
        $daySeparate->delete();
        return redirect(route('daySeparate.index'));
    }
}
