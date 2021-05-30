<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\ModelPeripherique;
use App\Models\TypesPeripherique;
use App\Models\glpi_Peripherique;
class PeripheriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Péripheriques';
        return view('front.Peripherique')->with([
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Péripheriques --1';
        $header = 'Péripherique';
        $User = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Models = ModelPeripherique::all();
        $Types = TypesPeripherique::all();
        return view('front.PeripheriqueForm')->with([
        'title' => $title,
        'header' => $header,
        'Users' => $User,
        'Fabricants' => $Fabricants,
        'groups' => $groups,
        'Models' => $Models,
        'Types' => $Types
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
        glpi_Peripherique::create([
        'name' => $request -> name,
        'statut_id' => $request -> statut_id,
        'locations_id' => $request -> locations_id,
        'Peripheriquetypes_id' => $request -> Peripheriquetypes_id,
        'users_id_tech' => $request -> users_id_tech,
        'fabricant_id' => $request -> fabricant_id,
        'groups_tech' => $request -> groups_tech,
        'Peripheriquemodels_id' => $request -> Peripheriquemodels_id,
        'groups_id' => $request -> groups_id,
        'UsagerNumero' => $request -> UsagerNumero,
        'Usager' => $request -> Usager,
        'NumeroDeSerie' => $request -> NumeroDeSerie,
        'Utilisateur' => $request -> Utilisateur,
        'users_id' => $request -> users_id,
        'TypeDeGestion' => $request -> TypeDeGestion,
        'Marque' => $request -> Marque,
        'comment' => $request -> comment,
        ]);
        return redirect()->route('FormAjouterPeripherique')->with(['success' => 'Élément ajouté']);
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
