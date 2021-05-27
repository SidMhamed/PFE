<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_fabricant;
use App\Models\User;
use App\Models\glpi_reseaux;
use App\Models\glpi_groups;
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
      $Materiel_Reseaux = glpi_Materiel_Reseaux::all();
      return view('front.Materiel-reseau')->with([
          'title' => $title,
          'Materiel_Reseaux' => $Materiel_Reseaux
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
        glpi_Materiel_Reseaux::create([
            'nom'=>$request->nom,
            'locations_id' => $request->locations_id,
            'users_id_tech' => $request->users_id_tech,
            'UsagerNumero' => $request-> UsagerNumero,
            'Usager' => $request-> Usager,
            'Utilisateur' => $request-> Utilisateur,
            'groups_id' => $request-> groups_id,
            'users_id' => $request-> users_id,
            'states_id' => $request-> states_id,
            'MaterielReseauTypes_id' => $request-> MaterielReseauTypes_id,
            'fabricant_id' => $request-> fabricant_id,
            'MaterielReseauModels_id' => $request-> MaterielReseauModels_id,
            'numeroDeSerie' => $request-> numeroDeSerie,
            'NumeroDinventaire' => $request-> NumeroDinventaire,
            'networks_id' => $request-> networks_id,
            'comment' => $request-> comment,
            ]);
        return redirect()->route('FormMaterielReseau')->with(['success' => 'Élément ajouté']);
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
