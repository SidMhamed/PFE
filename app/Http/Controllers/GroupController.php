<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_groups;

class GroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Groupes';
        $Groupes = glpi_groups::all();
        return view('front.groupe')->with([
            'title' => $title,
            'groups' => $Groupes,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Groupes --1';
        $header = 'Groupes';
        return view('front.groupeForm')->with([
            'title' => $title,
            'header' => $header
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        glpi_groups::create($request->all());
        return redirect()->route('Groups.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Groupes - $id";
        $header = "Groupes";
        $Groups = glpi_groups::find($id);
        return view('front.edit.GroupsEdit')->with([
        'title' => $title,
        'header' => $header,
        'Groups' => $Groups
        ]);
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
        $Groups = glpi_groups::find($id);
        $Groups->update($request->all());
        return redirect()->route('Groups.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Groups = glpi_groups::where('id',$id)->delete();
        return redirect()->route('Groups.index')->with(['success' => 'Élément Supprimer']);
      }
}
