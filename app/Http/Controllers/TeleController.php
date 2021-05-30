<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\glpi_Telephone;
use App\Models\TelephoneTypes;
use App\Models\TelephoneModeles;
class TeleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Téléphones';
        $Telephones = glpi_Telephone::all();
        return view('front.Telephone')->with([
            'title' => $title,
            'Telephones' => $Telephones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Téléphones --1';
        $header = 'Téléphone';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Types =TelephoneTypes::all();
        $Models = TelephoneModeles::all();
        return view('front.TelephoneForm')->with([
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
        glpi_Telephone::create([
        'name'=>$request->name,
        'statut_id'=>$request->statut_id,
        'locations_id'=>$request->locations_id,
        'telephonetypes_id'=>$request->telephonetypes_id,
        'users_id_tech'=>$request->users_id_tech,
        'fabricant_id'=>$request->fabricant_id,
        'groups_tech'=>$request->groups_tech,
        'telephonemodels_id'=>$request->telephonemodels_id,
        'groups_id'=>$request->groups_id,
        'UsagerNumero'=>$request->UsagerNumero,
        'Usager'=>$request->Usager,
        'NumeroDeSerie'=>$request->NumeroDeSerie,
        'Utilisateur'=>$request->Utilisateur,
        'users_id'=>$request->users_id,
        'TypeDeGestion'=>$request->TypeDeGestion,
        'Marque'=>$request->Marque,
        'Alimantation_id'=>$request->Alimantation_id,
        'Nombrelignes'=>$request->Nombrelignes,
        'Casque'=>$request->Casque,
        'Hautparleur'=>$request->Hautparleur,
        ]);
        return redirect()->route('FormTelephone')->with(['success' => 'Élément ajouté']);
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
