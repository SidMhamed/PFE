<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComposatsCarteSIM;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\ItemsCarteSIM;
use App\Models\glpi_location;
class CarteSIMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Carte SIM';
        $header = 'Catre SIM';
        $cartes = ItemsCarteSIM::all();
        return view('front.CarteSIM')->with([
            'title' => $title,
            'cartes' => $cartes,
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
        $title = 'GLPI-Cartes SIM';
        $header = 'Catre SIM';
        $user = User::all();
        $groups =glpi_groups::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        return view('front.CarteSIMForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Groups' => $groups,
            'Fabricants' => $Fabricants,
            'Composants' => $Composants
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
        ItemsCarteSIM::create($request->all());
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Cartes SIM - $id";
        $header = 'Catre SIM';
        $user = User::all();
        $groups =glpi_groups::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        $Locations = glpi_location::all();
        $CarteSIM = ItemsCarteSIM::find($id);
        return view('front.edit.CarteSIMEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Groups' => $groups,
            'Fabricants' => $Fabricants,
            'Composants' => $Composants,
            'locations' => $Locations,
            'CarteSIM'=> $CarteSIM
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
        $CarteSIM = ItemsCarteSIM::find($id);
        $CarteSIM->update($request->all());
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CarteSIM = ItemsCarteSIM::where('id',$id)->delete();
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément Supprimer']);
    }
}
