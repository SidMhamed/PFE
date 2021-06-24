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
use Illuminate\Support\Facades\App;

class TeleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $title = 'Téléphones';
            $header = 'Téléphone';
            return view('front.Telephone')->with([
                'title' => $title,
                'header' => $header
            ]);
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
               $data = glpi_Telephone::where('id', 'like', '%' . $query . '%')
                   ->OrWhere('name', 'like', '%' . $query . '%')
                   ->OrWhere('statut_id', 'like', '%' . $query . '%')
                   ->OrWhere('fabricant_id', 'like', '%' . $query . '%')
                   ->OrWhere('locations_id', 'like', '%' . $query . '%')
                   ->OrWhere('telephonetypes_id', 'like', '%' . $query . '%')
                   ->OrWhere('telephonemodels_id', 'like', '%' . $query . '%')
                   ->OrWhere('updated_at', 'like', '%' . $query . '%')
                   ->OrWhere('created_at', 'like', '%' . $query . '%')
                   ->get();

           }
           else {
               $data = glpi_Telephone::orderBy('created_at', 'DESC')
               ->get();
           }
           $total_row = $data->count();
           if ($total_row > 0) {
               foreach ($data as $row) {
                   $output .= '
           <tr>
            <td valign="top"><a href="' . route('Telephone.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->statut_id . '</td>
            <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
            <td valign="top">' . TelephoneTypes::findOrFail($row->telephonetypes_id)->name . '</td>
            <td valign="top">' . TelephoneModeles::findOrFail($row->telephonemodels_id)->name . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
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
       $data = glpi_Telephone::all();
       $output = '
<h3 style="text-align:center;">Listes des Téléphones</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Statut</th>
<th style="border:1px solid;padding:5px">Fabricant</th>
<th style="border:1px solid;padding:5px">Type</th>
<th style="border:1px solid;padding:5px">Modèle</th>
<th style="border:1px solid;padding:5px">Lieu</th>
<th style="border:1px solid;padding:5px">Dernière modification</th>
<th style="border:1px solid;padding:5px">Usager</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</td>
<td style="border:1px solid;padding:5px">' . $row->statut_id . '</td>
<td style="border:1px solid;padding:5px">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . TelephoneTypes::findOrFail($row->telephonetypes_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . TelephoneModeles::findOrFail($row->telephonemodels_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
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
        $title = 'GLPI-Téléphones --1';
        $header = 'Téléphone';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Types =TelephoneTypes::all();
        $Models = TelephoneModeles::all();
        $Locations = glpi_location::all();
        return view('front.TelephoneForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'Types' => $Types,
            'Models' => $Models,
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
