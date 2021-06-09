<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_location;
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
    public function index(Request $request)
    {
        if($request->search !== null){
        $title = 'GLPI-Péripheriques';
        $header = 'Péripherique';
        $search = $request->search;
        $Peripherique = glpi_Peripherique::orderBy('created_at', 'DESC')->where('id','like','%'.$search.'%')
                                        ->OrWhere('name','like','%'.$search.'%')->paginate(2);
        return view('front.Peripherique')->with([
        'title' => $title,
        'Peripheriques' => $Peripherique,
        'header' => $header
        ]);
        }else{
            $title = 'GLPI-Péripheriques';
            $header = 'Péripherique';
            $Peripherique = glpi_Peripherique::paginate(2);
            // dd($Peripherique);
            return view('front.Peripherique')->with([
                'title' => $title,
                'Peripheriques' => $Peripherique,
                'header' => $header
            ]);
        }
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
        glpi_Peripherique::create($request->all());
        return redirect()->route('Peripherique.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Péripheriques - $id";
        $header = 'Péripherique';
        $User = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Models = ModelPeripherique::all();
        $Types = TypesPeripherique::all();
        $Locations = glpi_location::all();
        $Peripherique = glpi_Peripherique::find($id);
        return view('front.edit.PeripheriqueEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $User,
            'Fabricants' => $Fabricants,
            'groups' => $groups,
            'Models' => $Models,
            'Types' => $Types,
            'Locations' => $Locations,
            'Peripherique' => $Peripherique
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
        $Moniteur = glpi_Peripherique::find($id);
        $Moniteur->update($request->all());
        return redirect()->route('Peripherique.index')->with(['success' => 'Élément modifié']);
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Peripherique =  glpi_Peripherique::where('id', $id)->delete();
        return redirect()->route('Peripherique.index')->with(['success' => 'Élément Supprimer']);
    }
}
