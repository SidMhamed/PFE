<?php

namespace App\Http\Controllers;

use App\Models\glpi_computermodels;
use App\Models\glpi_computers;
use App\Models\glpi_computertypes;
use App\Models\glpi_fabricant;
use App\Models\glpi_location;
use App\Models\glpi_reseaux;
use App\Models\glpi_SourceMiseAjour;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    /**
     * Search
     * @param \Illuminate\http\Response
     */
    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = glpi_computers::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('nom', 'like', '%' . $query . '%')
                    ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                    ->OrWhere('locations_id', 'like', '%' . $query . '%')
                    ->OrWhere('computermodels_id', 'like', '%' . $query . '%')
                    ->OrWhere('numeroDeSerie', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
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

    // Generate PDF
    public function pdf()
    {
        $pdf = PDF::loadHTML($this->convert_computer_to_html());
        $pdf->stream();
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function convert_computer_to_html(){
        $data = glpi_computers::all();
        $output = '
        <h3 style="text-align:center;">Listes des Ordinateurs</h3>
        <table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
        <tr>
        <th style="border:1px solid;padding:5px">ID</th>
        <th style="border:1px solid;padding:5px">Nom</th>
        <th style="border:1px solid;padding:5px">Fabricant</th>
        <th style="border:1px solid;padding:5px">Numéro de série</th>
        <th style="border:1px solid;padding:5px">Type </th>
        <th style="border:1px solid;padding:5px">Modèle </th>
        <th style="border:1px solid;padding:5px">Lieu</th>
        <th style="border:1px solid;padding:5px">Dernière modification</th>
        <th style="border:1px solid;padding:5px">Date de Création</th>
    </tr>';
        foreach ($data as $row) {
            $output .= '
<tr>
 <td style="border:1px solid;padding:5px">' . $row->id . '</td>
 <td style="border:1px solid;padding:5px">' . $row->nom . '</td>
 <td style="border:1px solid;padding:5px">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
 <td style="border:1px solid;padding:5px">' . $row->numeroDeSerie . '</td>
 <td style="border:1px solid;padding:5px">' . glpi_computertypes::findOrFail($row->computertypes_id)->name . '</td>
 <td style="border:1px solid;padding:5px">' . glpi_computermodels::findOrFail($row->computermodels_id)->Nom . '</td>
 <td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
 <td style="border:1px solid;padding:5px">' . $row->updated_at . '</td>
 <td style="border:1px solid;padding:5px">' . $row->created_at. '</td>
</tr>
';
        }
        $output .= '</table>';
        return $output;
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
        $Locations = glpi_location::all();
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        return view('front.ComputerForm')->with([
            'title' => $title,
            'header' => $header,
            'Locations' => $Locations,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
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
        $Locations = glpi_location::all();
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        $Location = glpi_location::all();
        $Computer = glpi_computers::find($id);
        return view('front.edit.ComputerEdit')->with([
            'title' => $title,
            'header' => $header,
            'Locations' => $Locations,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
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
