<?php

namespace App\Http\Controllers;

use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_Peripherique;
use App\Models\ModelPeripherique;
use App\Models\TypesPeripherique;
use App\Models\User;
use Illuminate\Http\Request;

class PeripheriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Péripheriques';
        $header = 'Péripherique';
        return view('front.Peripherique')->with([
            'title' => $title,
            'header' => $header,
        ]);
    }

    /**
     * Search
     *
     * @return \Illuminate\Http\Response
     */
    
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = glpi_Peripherique::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('statut_id', 'like', '%' . $query . '%')
                    ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                    ->OrWhere('locations_id', 'like', '%' . $query . '%')
                    ->OrWhere('Peripheriquetypes_id', 'like', '%' . $query . '%')
                    ->OrWhere('Peripheriquemodels_id', 'like', '%' . $query . '%')
                    ->OrWhere('Usager', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_Peripherique::orderBy('created_at', 'DESC')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Peripherique.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->statut_id . '</td>
            <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
            <td valign="top">' . TypesPeripherique::findOrFail($row->Peripheriquetypes_id)->name . '</td>
            <td valign="top">' . ModelPeripherique::findOrFail($row->Peripheriquemodels_id)->name . '</td>
            <td valign="top">' . $row->updated_at . '</td>
            <td valign="top">' . $row->Usager . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="8" valign="top">Aucune donnée disponible</td>
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
            'Types' => $Types,
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
            'Peripherique' => $Peripherique,
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
        $Peripherique = glpi_Peripherique::where('id', $id)->delete();
        return redirect()->route('Peripherique.index')->with(['success' => 'Élément Supprimer']);
    }
}
