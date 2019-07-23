<?php

namespace App\Http\Controllers;

use App\days;
use App\Http\Requests\DaysRequest;
use App\Imports\daysImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Days::latest()->paginate(20);
        return view('admin/days/all' , compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/days/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DaysRequest $request)
    {
        days::create($request->all());
        return redirect(route('days.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new daysImport, request()->file('import_file'));
        return redirect(route('days.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\days  $day
     * @return \Illuminate\Http\Response
     */
    public function edit(days $day)
    {
        return view('admin/days/edit' , compact('day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\days  $day
     * @return \Illuminate\Http\Response
     */
    public function update(DaysRequest $request, days $day)
    {
        $day->update($request->all());
        return redirect(route('days.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\days  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(days $day)
    {
        $day->delete();
        return redirect(route('days.index'));
    }
}
