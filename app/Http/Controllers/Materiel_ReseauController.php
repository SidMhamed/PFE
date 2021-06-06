<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_fabricant;
use App\Models\User;
use App\Models\glpi_reseaux;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_Materiel_ReseauxTypes;
use App\Models\glpi_Materiel_ReseauxModele;
use App\Models\glpi_Materiel_Reseaux;

class Materiel_ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $title = 'GLPI-Matèriel-Reseaux';
      $header ='Matèriel-Reseaux';
      $Materiel_Reseaux = glpi_Materiel_Reseaux::all();
      return view('front.Materiel-reseau')->with([
          'title' => $title,
          'Materiel_Reseaux' => $Materiel_Reseaux,
          'header' => $header
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Matèriel-Reseaux --1';
        $header ='Matèriel-Reseaux';
        $Fabricants = glpi_fabricant::all();
        $Users = User::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Type = glpi_Materiel_ReseauxTypes::all();
        $Model = glpi_Materiel_ReseauxModele::all();
     return view('front.Materiel-reseauForm')->with([
        'title' => $title,
        'header' => $header,
        'Fabricants' => $Fabricants,
        'Users' => $Users,
        'Reseaux'=> $Reseaux,
        'groups' => $groups,
        'Types' => $Type,
        'Modeles' => $Model,
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
        glpi_Materiel_Reseaux::create($request->all());
        return redirect()->route('MaterielReseau.create')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Matèriel-Reseaux - $id";
        $header ='Matèriel-Reseaux';
        $Fabricants = glpi_fabricant::all();
        $Users = User::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Type = glpi_Materiel_ReseauxTypes::all();
        $Model = glpi_Materiel_ReseauxModele::all();
        $Locations = glpi_location::all();
        $Materiel_Reseaux = glpi_Materiel_Reseaux::find($id);
        return view('front.edit.MaterielReseauEdit')->with([
            'title' => $title,
            'header' => $header,
            'Fabricants' => $Fabricants,
            'Users' => $Users,
            'Reseaux'=> $Reseaux,
            'groups' => $groups,
            'Types' => $Type,
            'Modeles' => $Model,
            'Locations' => $Locations,
            'MaterielReseau' => $Materiel_Reseaux
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
        $Materiel_Reseaux = glpi_Materiel_Reseaux::find($id);
        $Materiel_Reseaux->update($request->all());
        return redirect()->route('MaterielReseau.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Materiel_Reseaux =  glpi_Materiel_Reseaux::where('id', $id)->delete();
        return redirect()->route('MaterielReseau.index')->with(['success' => 'Élément Supprimer']);
    }
}
