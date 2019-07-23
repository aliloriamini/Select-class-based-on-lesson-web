<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Imports\professorImport;
use App\professor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::latest()->paginate(20);
        return view('admin/professor/all' , compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/professor/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        professor::create($request->all());
        return redirect(route('professor.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new professorImport, request()->file('import_file'));
        return redirect(route('professor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(professor $professor)
    {
        return view('admin/professor/edit' , compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, professor $professor)
    {
        $professor->update($request->all());
        return redirect(route('professor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(professor $professor)
    {
        $professor->delete();
        return redirect(route('professor.index'));
    }
}
