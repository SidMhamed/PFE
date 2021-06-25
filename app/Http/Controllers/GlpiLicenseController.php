<?php

namespace App\Http\Controllers;

use App\Models\glpi_License;
use App\Models\glpi_location;
use App\Models\glpi_type_License;
use App\Models\Logiciel;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GlpiLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-License';
        $header = 'License';
        return view('front.license')->with([
            'title' => $title,
            'header' => $header,
        ]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = glpi_License::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('softwares_id', 'like', '%' . $query . '%')
                    ->OrWhere('serial', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_License::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('License.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . Logiciel::findOrFail($row->softwares_id)->name . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
            <td valign="top">' . $row->serial . '</td>
            <td valign="top">' . glpi_type_License::findOrFail($row->softwarelicensetypes_id)->name . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="5" valign="top">Aucune donnée disponible</td>
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
       $data = glpi_License::all();
       $output = '
<h3 style="text-align:center;">Listes des License</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Logiciel</th>
<th style="border:1px solid;padding:5px">Lieu</th>
<th style="border:1px solid;padding:5px">Sérial</th>
<th style="border:1px solid;padding:5px">Type License</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</td>
<td style="border:1px solid;padding:5px">' . Logiciel::findOrFail($row->softwares_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
<td style="border:1px solid;padding:5px">' . $row->serial . '</td>
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
        $title = 'GLPI-Licenses --1';
        $header = 'Licenses';
        $types = glpi_type_License::all();
        $logiciels = Logiciel::all();
        $statuts = Statut::all();
        $location = glpi_location::all();
        $user = User::all();
        return view('front.licenseForm')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'logiciels' => $logiciels,
            'states' => $statuts,
            'locations' => $location,
            'users' => $user,

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
        glpi_License::create($request->all());
        return redirect()->route('License.index')->with(['success' => 'Élément ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\glpi_License  $glpi_License
     * @return \Illuminate\Http\Response
     */
    public function show(glpi_License $glpi_License)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\glpi_License  $glpi_License
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-License --$id";
        $header = 'License';
        $types = glpi_type_License::all();
        $logiciels = Logiciel::all();
        $statuts = Statut::all();
        $location = glpi_location::all();
        $user = User::all();

        $License = glpi_License::find($id);
        return view('front.edit.LicenseEdit')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'logiciels' => $logiciels,
            'statuts' => $statuts,
            'location' => $location,
            'Users' => $user,
            'License' => $License,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\glpi_License  $glpi_License
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $License = glpi_License::find($id);
        $License->update($request->all());
        return redirect()->route('License.index')->with(['success' => 'Élément modifié']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\glpi_License  $glpi_License
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $License = glpi_License::where('id', $id)->delete();
        return redirect()->route('License.index')->with(['success' => 'Élément Supprimer']);
    }
}
