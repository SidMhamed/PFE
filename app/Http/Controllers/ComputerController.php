<?php

namespace App\Http\Controllers;

use App\Models\glpi_computermodels;
use App\Models\glpi_computers;
use App\Models\glpi_computertypes;
use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_reseaux;
use App\Models\glpi_SourceMiseAjour;
use App\Models\User;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Ordinateurs';
        $header = 'Ordinateurs';
        return view('front.computer')->with([
            'title' => $title,
            'header' => $header,
        ]);
    }
    function action(Request $request){
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
            $data = glpi_computers::where('id', 'like', '%' . $query . '%')
                ->OrWhere('nom', 'like', '%' . $query . '%')
                ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                ->OrWhere('locations_id', 'like', '%' . $query . '%')
                ->OrWhere('computermodels_id', 'like', '%' . $query . '%')
                ->OrWhere('numeroDeSerie', 'like', '%' . $query . '%')
                ->OrWhere('updated_at', 'like', '%' . $query . '%')
                ->OrWhere('created_at', 'like', '%' . $query . '%')
                ->get();

        }
        else {
            $data = glpi_computers::orderBy('created_at', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if ($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
        <tr>
         <td valign="top"><a href="' . route('Computer.edit', $row->id) . '">' . $row->nom . '</a></td>
         <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
         <td valign="top">' . $row->numeroDeSerie . '</td>
         <td valign="top">' . glpi_computertypes::findOrFail($row->computertypes_id)->name . '</td>
         <td valign="top">' . glpi_computermodels::findOrFail($row->computermodels_id)->Nom . '</td>
         <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
         <td valign="top">' . $row->updated_at . '</td>
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
        $title = 'GLPI-Ordinateurs --1';
        $header = 'Ordinateurs';
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        $groups = glpi_groups::all();
        return view('front.ComputerForm')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
            'groups' => $groups,
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
        glpi_computers::create($request->all());
        return redirect()->route('Computer.form')->with(['success' => 'Élément ajouté']);
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
     * @param
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-Ordinateurs --$id";
        $header = 'Ordinateur';
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        $groups = glpi_groups::all();
        $Location = glpi_location::all();
        $Computer = glpi_computers::find($id);
        return view('front.edit.ComputerEdit')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
            'groups' => $groups,
            'Locations' => $Location,
            'Computer' => $Computer,
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
        $Computer = glpi_computers::find($id);
        $Computer->update($request->all());
        return redirect()->route('front.computer')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Computer = glpi_computers::where('id', $id)->delete();
        return redirect()->route('front.computer')->with(['success' => 'Élément Supprimer']);
    }
}
