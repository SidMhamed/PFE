<?php

namespace App\Http\Controllers;

use App\Models\DomainesType;
use Illuminate\Http\Request;

class DomainesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DomainesType::create($request->all());
        return redirect()->route('Domaines.create')->with(['success' => 'Élément ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DomainesType  $domainesType
     * @return \Illuminate\Http\Response
     */
    public function show(DomainesType $domainesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DomainesType  $domainesType
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainesType $domainesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DomainesType  $domainesType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainesType $domainesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DomainesType  $domainesType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainesType $domainesType)
    {
        //
    }
}
