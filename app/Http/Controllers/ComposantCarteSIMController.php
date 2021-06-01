<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComposatsCarteSIM;
class ComposantCarteSIMController extends Controller
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
        ComposatsCarteSIM::create([
            'name' => $request -> name,
            'comment' => $request -> comment,
            'entities_id' => $request -> entities_id,
            'is_recursive' => $request -> is_recursive,
            'fabricant_id' => $request -> fabricant_id,
            'voltage' => $request -> voltage,
            'devicesimcardtypes_id' => $request -> devicesimcardtypes_id,
            'allow_voip' => $request -> allow_voip,
        ]);
        return redirect()->route('FormAjouterCarteSIM')->with(['success' => 'Élément ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
