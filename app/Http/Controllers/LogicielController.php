<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logiciel;
use App\Models\User;
use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\LogicielCategories;
class LogicielController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Logiciels';
        $logiciels = Logiciel::all();
        return view('front.logiciels')->with([
            'title' => $title,
            'logiciels' => $logiciels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Logiciels --1';
        $header = 'Logiciel';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups =glpi_groups::all();
        $LogicielCategories = LogicielCategories::all();
        return view('front.logicielsForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'LogicielCategories' => $LogicielCategories
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
        Logiciel::create([
            'name' => $request -> name,
            'comment' => $request -> comment,
            'locations_id' => $request -> locations_id,
            'users_id' => $request -> users_id,
            'groups_id' => $request -> groups_id,
            'users_id_tech' => $request -> users_id_tech,
            // 'groups_id_tech' => $request -> groups_id_tech,
            // 'is_update' => $request -> is_update,
            'logiciels_id' => $request -> logiciels_id,
            'fabricant_id' => $request -> fabricant_id,
            // 'is_deleted' => $request -> is_deleted,
            // 'is_template' => $request -> is_template,
            // 'template_name' => $request -> template_name,
            'ticket_tco' => $request -> ticket_tco,
            // 'is_helpdesk_visible' => $request -> is_helpdesk_visible,
            'LogicielCategories_id' => $request -> LogicielCategories_id,
            // 'is_valid' => $request -> is_valid,
        ]);
        return redirect()->route('FormAjouterLogiciels')->with(['success' => 'Élément ajouté']);
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
