<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_fabricant;
use App\Models\glpi_reseaux;
use App\Models\glpi_groups;
use App\Models\ImprimanteTypes;
use App\Models\ImprimanteModel;
use App\Models\glpi_Imprimante;
use App\Models\glpi_location;
use Illuminate\Support\Facades\App;

class ImprimanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $title = 'GLPI-Imprimantes';
            $header = 'Imprimantes';
            return view('front.Imprimante')->with([
                'title' => $title,
                'header' => $header
            ]);
    }
/**
 * Search
 *
 * @return \Illuminate\Http\Response
 */
public function search(Request $request){
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
           $data = glpi_Imprimante::where('id', 'like', '%' . $query . '%')
               ->OrWhere('name', 'like', '%' . $query . '%')
               ->OrWhere('manufacturers_id', 'like', '%' . $query . '%')
               ->OrWhere('locations_id', 'like', '%' . $query . '%')
               ->OrWhere('printertype_id', 'like', '%' . $query . '%')
               ->OrWhere('printermodels_id', 'like', '%' . $query . '%')
               ->OrWhere('updated_at', 'like', '%' . $query . '%')
               ->OrWhere('created_at', 'like', '%' . $query . '%')
               ->get();

       }
       else {
           $data = glpi_Imprimante::orderBy('created_at', 'DESC')
           ->get();
       }
       $total_row = $data->count();
       if ($total_row > 0) {
           foreach ($data as $row) {
               $output .= '
       <tr>
        <td valign="top"><a href="' . route('Imprimante.edit', $row->id) . '">' . $row->name . '</a></td>
        <td valign="top">' . glpi_fabricant::findOrFail($row->manufacturers_id)->Nom . '</td>
        <td valign="top">' . ImprimanteTypes::findOrFail($row->printertype_id)->name . '</td>
        <td valign="top">' . ImprimanteModel::findOrFail($row->printermodels_id)->name . '</td>
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
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($this->convert_Moniteur_to_html());
       $pdf->stream();
       // download PDF file with download method
       return $pdf->download('pdf_file.pdf');
   }
// Convert data to html
   public function convert_Moniteur_to_html()
   {
       $data = glpi_Imprimante::all();
       $output = '
<h3 style="text-align:center;">Listes des Imprimantes</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Fabricant</th>
<th style="border:1px solid;padding:5px">Type</th>
<th style="border:1px solid;padding:5px">Modèle</th>
<th style="border:1px solid;padding:5px">Lieu</th>
<th style="border:1px solid;padding:5px">Dernière modification</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</a></td>
<td style="border:1px solid;padding:5px">' . glpi_fabricant::findOrFail($row->manufacturers_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . ImprimanteTypes::findOrFail($row->printertype_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . ImprimanteModel::findOrFail($row->printermodels_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . $row->updated_at . '</td>
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
        $title = 'GLPI-Imprimantes --1';
        $header = 'Imprimante';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Reseaux = glpi_reseaux::all();
        $groups =glpi_groups::all();
        $Locations = glpi_location::all();
        $Types = ImprimanteTypes::all();
        $Modeles = ImprimanteModel::all();
        return view('front.ImprimanteForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Fabricants' => $Fabricants,
            'Reseaux' => $Reseaux,
            'Types' => $Types,
            'Modeles' => $Modeles,
            'Locations' => $Locations
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
        glpi_Imprimante::create($request->all());
        return redirect()->route('FormImprimante')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Imprimantes - $id";
        $header = 'Imprimantes';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Reseaux = glpi_reseaux::all();
        $groups = glpi_groups::all();
        $Locations = glpi_location::all();
        $Types = ImprimanteTypes::all();
        $Modeles = ImprimanteModel::all();
        $Imprimante = glpi_Imprimante::find($id);
        return view('front.edit.ImprimantEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'groups' => $groups,
            'Locations' => $Locations,
            'Fabricants' => $Fabricants,
            'Reseaux' => $Reseaux,
            'Types' => $Types,
            'Modeles' => $Modeles,
            'Imprimante' => $Imprimante
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
        $Imprimante = glpi_Imprimante::find($id);
        $Imprimante->update($request->all());
        return redirect()->route('Imprimante.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Computer =  glpi_Imprimante::where('id', $id)->delete();
        return redirect()->route('Imprimante.index')->with(['success' => 'Élément Supprimer']);
     }
}
