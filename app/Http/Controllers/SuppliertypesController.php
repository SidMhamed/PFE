<?php

namespace App\Http\Controllers;

use App\Models\glpi_suppliertypes;
use Illuminate\Http\Request;

class SuppliertypesController extends Controller
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
        glpi_suppliertypes::create($request->all());
        return redirect()->route('Fournisseur.create')->with(['success' => 'element ajoute']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\glpi_suppliertypes  $glpi_suppliertypes
     * @return \Illuminate\Http\Response
     */
    public function show(glpi_suppliertypes $glpi_suppliertypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\glpi_suppliertypes  $glpi_suppliertypes
     * @return \Illuminate\Http\Response
     */
    public function edit(glpi_suppliertypes $glpi_suppliertypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\glpi_suppliertypes  $glpi_suppliertypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, glpi_suppliertypes $glpi_suppliertypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\glpi_suppliertypes  $glpi_suppliertypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(glpi_suppliertypes $glpi_suppliertypes)
    {
        //
    }
}
