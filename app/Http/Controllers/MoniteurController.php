<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_Moniteur;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\MoniteurTypes;
use App\Models\MoniteurModeles;
class MoniteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Moniteurs';
        $Moniteurs = glpi_Moniteur::all();
        return view('front.Moniteur')->with([
            'title' => $title,
            'Moniteurs' => $Moniteurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Moniteurs --1';
        $header = 'Moniteur';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Types = MoniteurTypes::all();
        $Models = MoniteurModeles::all();
        return view('front.MoniteurForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'groups' => $groups,
            'Types' => $Types,
            'Models' => $Models
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
        glpi_Moniteur::create([
            'name' => $request -> name,
            'statut_id' => $request ->statut_id,
            'locations_id' => $request ->locations_id,
            'Moniteurtypes_id' => $request ->Moniteurtypes_id,
            'users_id_tech' => $request ->users_id_tech,
            'fabricant_id' => $request ->fabricant_id,
            'groups_tech' => $request ->groups_tech,
            'Moniteurmodels_id' => $request ->Moniteurmodels_id,
            'groups_id' => $request ->groups_id,
            'UsagerNumero' => $request ->UsagerNumero,
            'Usager' => $request ->Usager,
            'NumeroDeSerie' => $request ->NumeroDeSerie,
            'Utilisateur' => $request ->Utilisateur,
            'users_id' => $request ->users_id,
            'TypeDeGestion' => $request ->TypeDeGestion,
            'Taille' => $request ->Taille,
            'Microphone' => $request ->Microphone,
            'Sub_D' => $request ->Sub_D,
            'DVI' => $request ->DVI,
            'HDMI' => $request ->HDMI,
            'Enceints' => $request ->Enceints,
            'BNC' => $request ->BNC,
            'Pivot' => $request ->Pivot,
            'DisplayPort' => $request ->DisplayPort,
            'comment' => $request ->comment,
        ]);
        return redirect()->route('FormAjouterMoniteur')->with(['success' => 'Élément ajouté']);
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
