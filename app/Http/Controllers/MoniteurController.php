<?php

namespace App\Http\Controllers;

use App\Models\glpi_fabricant;
use App\Models\glpi_location;
use App\Models\glpi_Moniteur;
use App\Models\MoniteurModeles;
use App\Models\MoniteurTypes;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MoniteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Moniteurs';
        $header = 'Moniteur';
        return view('front.Moniteur')->with([
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
                $data = glpi_Moniteur::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('statut_id', 'like', '%' . $query . '%')
                    ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                    ->OrWhere('locations_id', 'like', '%' . $query . '%')
                    ->OrWhere('Moniteurtypes_id', 'like', '%' . $query . '%')
                    ->OrWhere('Moniteurmodels_id', 'like', '%' . $query . '%')
                    ->OrWhere('Usager', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_Moniteur::orderBy('created_at', 'DESC')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Moniteur.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->statut_id . '</td>
            <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
            <td valign="top">' . MoniteurTypes::findOrFail($row->Moniteurtypes_id)->name . '</td>
            <td valign="top">' . MoniteurModeles::findOrFail($row->Moniteurmodels_id)->Nom . '</td>
            <td valign="top">' . $row->updated_at . '</td>
            <td valign="top">' . $row->Usager . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="8" valign="top">Aucune donn??e disponible</td>
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
        $pdf = PDF::loadHTML($this->convert_Moniteur_to_html());
        $pdf->stream();
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
// Convert data to html
    public function convert_Moniteur_to_html()
    {
        $data = glpi_Moniteur::all();
        $output = '
    <h3 style="text-align:center;">Listes des Moniteurs</h3>
    <table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
    <tr>
    <th style="border:1px solid;padding:5px">ID</th>
    <th style="border:1px solid;padding:5px">Nom</th>
    <th style="border:1px solid;padding:5px">Statut</th>
    <th style="border:1px solid;padding:5px">Fabricant</th>
    <th style="border:1px solid;padding:5px">Lieu</th>
    <th style="border:1px solid;padding:5px">Type</th>
    <th style="border:1px solid;padding:5px">Mod??le</th>
    <th style="border:1px solid;padding:5px">Derni??re modification</th>
    <th style="border:1px solid;padding:5px">Usager</th>
</tr>';
        foreach ($data as $row) {
            $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</td>
<td style="border:1px solid;padding:5px">' . $row->statut_id . '</td>
<td style="border:1px solid;padding:5px">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . MoniteurTypes::findOrFail($row->Moniteurtypes_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . MoniteurModeles::findOrFail($row->Moniteurmodels_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . $row->updated_at . '</td>
<td style="border:1px solid;padding:5px">' . $row->Usager . '</td>
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
        $title = 'GLPI-Moniteurs --1';
        $header = 'Moniteur';
        $Users = User::all();
        $Locations = glpi_location::all();
        $Fabricants = glpi_fabricant::all();
        $Types = MoniteurTypes::all();
        $Models = MoniteurModeles::all();
        return view('front.MoniteurForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Locations' => $Locations,
            'Fabricants' => $Fabricants,
            'Types' => $Types,
            'Models' => $Models,
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
        glpi_Moniteur::create($request->all());
        return redirect()->route('FormAjouterMoniteur')->with(['success' => '??l??ment ajout??']);
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
        $title = "GLPI-Moniteurs --$id";
        $header = 'Moniteur';
        $Users = User::all();
        $Locations = glpi_location::all();
        $Fabricants = glpi_fabricant::all();
        $Types = MoniteurTypes::all();
        $Models = MoniteurModeles::all();
        $Locations = glpi_location::all();
        $Moniteurs = glpi_Moniteur::find($id);
        return view('front.edit.MoniteurEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Locations' => $Locations,
            'Fabricants' => $Fabricants,
            'Types' => $Types,
            'Models' => $Models,
            'Locations' => $Locations,
            'Moniteur' => $Moniteurs,
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
        $Moniteur = glpi_Moniteur::find($id);
        $Moniteur->update($request->all());
        return redirect()->route('Moniteur.index')->with(['success' => '??l??ment modifi??']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Moniteur = glpi_Moniteur::where('id', $id)->delete();
        return redirect()->route('Moniteur.index')->with(['success' => '??l??ment Supprimer']);

    }
}
