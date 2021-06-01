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
        $Imprimantes = glpi_Imprimante::all();
        return view('front.Imprimante')->with([
            'title' => $title,
            'Imprimantes' => $Imprimantes
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
        glpi_Imprimante::create([
            'name' => $request -> name,
            // 'contact' => $request -> contact,
            // 'contact_num' => $request -> contact_num,
            'users_id_tech' => $request ->users_id_tech,
            'groups_id_tech' => $request ->groups_id_tech,
            'serial' => $request ->serial,
            'otherserial' => $request ->otherserial,
            'have_serial' => $request ->have_serial,
            'have_parallel' => $request ->have_parallel,
            'have_usb' => $request ->have_usb,
            'have_wifi' => $request ->have_wifi,
            'have_ethernet' => $request ->have_ethernet,
            'comment' => $request ->comment,
            'memory_size' => $request ->memory_size,
            'locations_id' => $request ->locations_id,
            'networks_id' => $request ->networks_id,
            'printertype_id' => $request ->printertype_id,
            'printermodels_id' => $request ->printermodels_id,
            'manufacturers_id' => $request ->manufacturers_id,
            // 'is_global' => $request ->is_global,
            // 'is_deleted' => $request ->is_deleted,
            // 'is_template' => $request ->is_template,
            // 'template_name' => $request ->template_name,
            'init_pages_couter' => $request ->init_pages_couter,
            'last_pages_counter' => $request ->last_pages_counter,
            'users_id' => $request ->users_id,
            'groups_id' => $request ->groups_id,
            'states' => $request ->states,
            'ticket_tco' => $request ->ticket_tco,
            'is_dynamic' => $request ->is_dynamic,
        ]);
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
