<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logiciel;
use App\Models\User;
use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\LogicielCategories;
use App\Models\glpi_SourceMiseAjour;
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
        $Locations = glpi_location::all();
        $LogicielCategories = LogicielCategories::all();
        return view('front.logicielsForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'Locations' => $Locations,
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
        Logiciel::create($request->all());
        return redirect()->route('Logiciel.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Logiciels - $id";
        $header = 'Logiciel';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups =glpi_groups::all();
        $locations = glpi_location::all();
        $LogicielCategories = LogicielCategories::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $logiciels = Logiciel::find($id);
        return view('front.edit.LogicielEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'Locations' => $locations,
            'LogicielCategories' => $LogicielCategories,
            'Logiciel' => $logiciels,
            'SourceMiseAjours' => $SourceMiseAjours
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
        $logiciel = Logiciel::find($id);
        $logiciel->update($request->all());
        return redirect()->route('Logiciel.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logiciel =  Logiciel::where('id', $id)->delete();
        return redirect()->route('Logiciel.index')->with(['success' => 'Élément Supprimer']);
    }
}
