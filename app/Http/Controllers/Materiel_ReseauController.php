<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_fabricant;
use App\Models\User;
use App\Models\glpi_reseaux;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_Materiel_ReseauxTypes;
use App\Models\glpi_Materiel_ReseauxModele;
use App\Models\glpi_Materiel_Reseaux;

class Materiel_ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search !== null){
            $search = $request->search;
            $Materiel_Reseaux = glpi_Materiel_Reseaux::orderBy('created_at', 'DESC')->where('id', 'like', '%'.$search.'%')
                                                    ->orWhere('nom','like','%'.$search.'%')->paginate(2); $title = 'GLPI-Matèriel-Reseaux';
            $header ='Matèriel-Reseaux';
            return view('front.Materiel-reseau')->with([
                'title' => $title,
                'Materiel_Reseaux' => $Materiel_Reseaux,
                'header' => $header
            ]);
        }
        else{
            $title = 'GLPI-Matèriel-Reseaux';
            $header ='Matèriel-Reseaux';
            $Materiel_Reseaux = glpi_Materiel_Reseaux::paginate(2);
            return view('front.Materiel-reseau')->with([
                'title' => $title,
                'Materiel_Reseaux' => $Materiel_Reseaux,
                'header' => $header
            ]);
            }
    }
/**
 * Search
 * 
 * @return \Illuminate\Http\Response
 */
function search(Request $request){
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
           $data = glpi_Materiel_Reseaux::where('id', 'like', '%' . $query . '%')
               ->OrWhere('nom', 'like', '%' . $query . '%')
               ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
               ->OrWhere('locations_id', 'like', '%' . $query . '%')
               ->OrWhere('MaterielReseauTypes_id', 'like', '%' . $query . '%')
               ->OrWhere('MaterielReseauModels_id', 'like', '%' . $query . '%')
               ->OrWhere('updated_at', 'like', '%' . $query . '%')
               ->OrWhere('created_at', 'like', '%' . $query . '%')
               ->get();

       }
       else {
           $data = glpi_Materiel_Reseaux::orderBy('created_at', 'DESC')
           ->get();
       }
       $total_row = $data->count();
       if ($total_row > 0) {
           foreach ($data as $row) {
               $output .= '
       <tr>
       <td valign="top"><a href="' . route('MaterielReseau.edit', $row->id) . '">' . $row->nom . '</a></td>
       <td>'. $row->states_id .'</td>
       <td>'.glpi_fabricant::findOrFail($row->fabricant_id)->Nom.'</td>
       <td>'.glpi_location::findOrFail($row->locations_id)->Nom .'</td>
       <td>'.glpi_Materiel_ReseauxTypes::findOrFail($row->MaterielReseauTypes_id)->name .'</td>
       <td>'.glpi_Materiel_ReseauxModele::findOrFail($row->MaterielReseauModels_id)->Nom.'</td>
       <td></td>
       <td>'.$row->updated_at.'</td>
       </tr>
       ';
           }
       } else {
           $output = '
      <tr>
       <td align="center" colspan="7" valign="top">Aucune donnée disponible</td>
      </tr>
      ';
       }
       $data = array(
           'table_data' => $output,
           'total_data' => $total_row,
       );
   }
       return response()->json($data);
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Matèriel-Reseaux --1';
        $header ='Matèriel-Reseaux';
        $Fabricants = glpi_fabricant::all();
        $Users = User::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Type = glpi_Materiel_ReseauxTypes::all();
        $Model = glpi_Materiel_ReseauxModele::all();
     return view('front.Materiel-reseauForm')->with([
        'title' => $title,
        'header' => $header,
        'Fabricants' => $Fabricants,
        'Users' => $Users,
        'Reseaux'=> $Reseaux,
        'groups' => $groups,
        'Types' => $Type,
        'Modeles' => $Model,
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
        glpi_Materiel_Reseaux::create($request->all());
        return redirect()->route('MaterielReseau.create')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Matèriel-Reseaux - $id";
        $header ='Matèriel-Reseaux';
        $Fabricants = glpi_fabricant::all();
        $Users = User::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Type = glpi_Materiel_ReseauxTypes::all();
        $Model = glpi_Materiel_ReseauxModele::all();
        $Locations = glpi_location::all();
        $Materiel_Reseaux = glpi_Materiel_Reseaux::find($id);
        return view('front.edit.MaterielReseauEdit')->with([
            'title' => $title,
            'header' => $header,
            'Fabricants' => $Fabricants,
            'Users' => $Users,
            'Reseaux'=> $Reseaux,
            'groups' => $groups,
            'Types' => $Type,
            'Modeles' => $Model,
            'Locations' => $Locations,
            'MaterielReseau' => $Materiel_Reseaux
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
        $Materiel_Reseaux = glpi_Materiel_Reseaux::find($id);
        $Materiel_Reseaux->update($request->all());
        return redirect()->route('MaterielReseau.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Materiel_Reseaux =  glpi_Materiel_Reseaux::where('id', $id)->delete();
        return redirect()->route('MaterielReseau.index')->with(['success' => 'Élément Supprimer']);
    }
}
