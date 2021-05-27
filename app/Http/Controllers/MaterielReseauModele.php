<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_Materiel_ReseauxModele;
class MaterielReseauModele extends Controller
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
        glpi_Materiel_ReseauxModele::create([
            'Nom' =>$request -> Nom,
            'Numero_du_produit'=>$request->Numero_du_produit,
            'Poids'=>$request->Poids,
            'Unites_requises'=>$request->Unites_requises,
            'Profondeur'=>$request->Profondeur,
            'ConnexionDalimentation'=>$request->ConnexionDalimentation,
            'Puissance_consommee'=>$request->Puissance_consommee,
            'DemieLargeur'=>$request->DemieLargeur,
            'photoface'=>$request->photoface,
            'PhotoArriere'=>$request->PhotoArriere,
            'comment'=>$request->comment,
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
