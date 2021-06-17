<?php

namespace App\Http\Controllers;

use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_SourceMiseAjour;
use App\Models\Logiciel;
use App\Models\LogicielCategories;
use App\Models\User;
use Illuminate\Http\Request;

class LogicielController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = 'GLPI-Logiciels';
        $header = 'Logiciel';
        return view('front.logiciels')->with([
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
                $data = Logiciel::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = Logiciel::orderBy('created_at', 'DESC')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Logiciel.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
            <td valign="top"></td>
            <td valign="top"></td>
            <td valign="top"></td>
            <td valign="top"></td>
            <td valign="top">' . $row->updated_at . '</td>
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
        $title = 'GLPI-Logiciels --1';
        $header = 'Logiciel';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Locations = glpi_location::all();
        $LogicielCategories = LogicielCategories::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        return view('front.logicielsForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'Locations' => $Locations,
            'LogicielCategories' => $LogicielCategories,
            'SourceMiseAjours' => $SourceMiseAjours,
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
        $groups = glpi_groups::all();
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
            'SourceMiseAjours' => $SourceMiseAjours,
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
        $logiciel = Logiciel::where('id', $id)->delete();
        return redirect()->route('Logiciel.index')->with(['success' => 'Élément Supprimer']);
    }
}
