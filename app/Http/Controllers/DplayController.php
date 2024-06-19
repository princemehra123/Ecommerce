<?php

namespace App\Http\Controllers;

use App\Models\dplay;
use Illuminate\Http\Request;

class DplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dplay.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dplay  $dplay
     * @return \Illuminate\Http\Response
     */
    public function show(dplay $dplay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dplay  $dplay
     * @return \Illuminate\Http\Response
     */
    public function edit(dplay $dplay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dplay  $dplay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dplay $dplay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dplay  $dplay
     * @return \Illuminate\Http\Response
     */
    public function destroy(dplay $dplay)
    {
        //
    }
}
