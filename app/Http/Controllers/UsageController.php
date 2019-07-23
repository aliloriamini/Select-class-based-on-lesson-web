<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsageRequest;
use App\Imports\usageImport;
use App\usage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usages = Usage::latest()->paginate(20);
        return view('admin/usage/all' , compact('usages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/usage/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsageRequest $request)
    {
        usage::create($request->all());
        return redirect(route('usage.index'));
    }

    public function import(Request  $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new usageImport, request()->file('import_file'));
        return redirect(route('usage.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function show(usage $usage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function edit(usage $usage)
    {
        return view('admin/usage/edit' , compact('usage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function update(UsageRequest $request, usage $usage)
    {
        $usage->update($request->all());
        return redirect(route('usage.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function destroy(usage $usage)
    {
        $usage->delete();
        return redirect(route('usage.index'));
    }
}
