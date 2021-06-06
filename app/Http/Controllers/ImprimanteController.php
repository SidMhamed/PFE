<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_fabricant;
use App\Models\glpi_reseaux;
use App\Models\glpi_groups;
use App\Models\ImprimanteTypes;
use App\Models\ImprimanteModel;
use App\Models\glpi_Imprimante;
use App\Models\glpi_location;
class ImprimanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Imprimantes';
        $header = 'Imprimantes';
        $Imprimantes = glpi_Imprimante::all();
        return view('front.Imprimante')->with([
            'title' => $title,
            'Imprimantes' => $Imprimantes,
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
        $title = 'GLPI-Imprimantes --1';
        $header = 'Imprimante';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Reseaux = glpi_reseaux::all();
        $groups =glpi_groups::all();
        $Types = ImprimanteTypes::all();
        $Modeles = ImprimanteModel::all();
        return view('front.ImprimanteForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'Reseaux' => $Reseaux,
            'Types' => $Types,
            'Modeles' => $Modeles
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
        glpi_Imprimante::create($request->all());
        return redirect()->route('FormImprimante')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Imprimantes - $id";
        $header = 'Imprimantes';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Locations = glpi_location::all();
        $Types = ImprimanteTypes::all();
        $Modeles = ImprimanteModel::all();
        $Imprimante = glpi_Imprimante::find($id);
        return view('front.edit.ImprimantEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Locations' => $Locations,
            'Fabricants' => $Fabricants,
            'Reseaux' => $Reseaux,
            'Types' => $Types,
            'Modeles' => $Modeles,
            'Imprimante' => $Imprimante
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
        $Imprimante = glpi_Imprimante::find($id);
        $Imprimante->update($request->all());
        return redirect()->route('Imprimante.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Computer =  glpi_Imprimante::where('id', $id)->delete();
        return redirect()->route('Imprimante.index')->with(['success' => 'Élément Supprimer']);
     }
}
