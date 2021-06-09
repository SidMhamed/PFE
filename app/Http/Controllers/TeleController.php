<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\glpi_Telephone;
use App\Models\TelephoneTypes;
use App\Models\TelephoneModeles;
use App\Models\glpi_location;
class TeleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search !== null){
            $title = 'Téléphones';
            $header = 'Téléphone';
            $search = $request->search;
            $Telephones = glpi_Telephone::orderBy('created_at', 'DESC')->where('id', 'like', '%'.$search.'%')
                                        ->orWhere('name','like','%'.$search.'%')->paginate(2);
            return view('front.Telephone')->with([
            'title' => $title,
            'Telephones' => $Telephones,
            'header' => $header
            ]);
        }else{
            $title = 'Téléphones';
            $header = 'Téléphone';
            $Telephones = glpi_Telephone::paginate(2);
            return view('front.Telephone')->with([
                'title' => $title,
                'Telephones' => $Telephones,
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
        glpi_Telephone::create($request->all());
        return redirect()->route('Telephone.create')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Téléphones - $id";
        $header = 'Téléphone';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Types =TelephoneTypes::all();
        $Models = TelephoneModeles::all();
        $Locations = glpi_location::all();
        $Telephone = glpi_Telephone::find($id);
        return view('front.edit.TelephoneEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'groups' => $groups,
            'Types' => $Types,
            'Models' => $Models,
            'Locations' => $Locations,
            'Telephone' => $Telephone
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
        $Telephone = glpi_Telephone::find($id);
        $Telephone->update($request->all());
        return redirect()->route('Telephone.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Computer =  glpi_Telephone::where('id', $id)->delete();
        return redirect()->route('Telephone.index')->with(['success' => 'Élément Supprimer']);
    }
}
