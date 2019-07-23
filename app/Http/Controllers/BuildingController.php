<?php

namespace App\Http\Controllers;

use App\building;
use App\Imports\buildingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::latest()->paginate(20);
        return view('admin/building/all' , compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/building/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        building::create($request->all());
        return redirect(route('Building.index'));
    }
    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new buildingImport, request()->file('import_file'));
        return redirect(route('Building.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(building $Building)
    {
        return view('admin/building/edit' , compact('Building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, building $Building)
    {
        $Building->update($request->all());
        return redirect(route('Building.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(building $Building)
    {
        $Building->delete();
        return redirect(route('Building.index'));
    }
}
