<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComposatsCarteSIM;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\ItemsCarteSIM;
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
        return view('front.CarteSIM')->with([
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
        ItemsCarteSIM::create([
            'items_id' => $request ->  items_id,
            'itemstype' => $request ->  itemstype,
            'devicesimcards_id' => $request ->  devicesimcards_id,
            'is_deleted' => $request ->  is_deleted,
            'is_dynamic' => $request ->  is_dynamic,
            'entities_id' => $request ->  entities_id,
            'is_recursive' => $request ->  is_recursive,
            'serial' => $request ->  serial,
            'otherserial' => $request ->  otherserial,
            'states_id' => $request ->  states_id,
            'locations_id' => $request ->  locations_id,
            'lines_id' => $request ->  lines_id,
            'users_id' => $request ->  users_id,
            'groups_id' => $request ->  groups_id,
            'pin' => $request ->  pin,
            'pin2' => $request ->  pin2,
            'puk' => $request ->  puk,
            'puk2' => $request ->  puk2,
            'msin' => $request ->  msin,
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
