<?php

namespace App\Http\Controllers;

use App\Models\glpi_fabricant;
use App\Models\glpi_location;
use App\Models\glpi_MaterielBureau;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MaterielBureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Materiel Bureau';
        $header = 'Materiel Bureau';
        return view('front.Materiel-bureau')->with([
            'title' => $title,
            'header' => $header
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
                $data = glpi_MaterielBureau::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('color', 'like', '%' . $query . '%')
                    ->OrWhere('matricule', 'like', '%' . $query . '%')
                    ->OrWhere('location_id', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_MaterielBureau::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('MaterielBureau.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->color . '</td>
            <td valign="top">' . $row->matricule . '</td>
            <td valign="top">' . glpi_fabricant::findOrFail($row->fabricant_id)->Nom  . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->location_id)->Nom . '</td>
            <td valign="top">' . $row->updated_at . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="7" valign="top">Aucune donn??e disponible</td>
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
       $data = glpi_MaterielBureau::all();
       $output = '
<h3 style="text-align:center;">Listes des Mat??riel Bureau</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Couleur</th>
<th style="border:1px solid;padding:5px">Matricule</th>
<th style="border:1px solid;padding:5px">Fabricants</th>
<th style="border:1px solid;padding:5px">Lieu</th>
<th style="border:1px solid;padding:5px">Derni??re modification</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</a></td>
<td style="border:1px solid;padding:5px">' . $row->color . '</td>
<td style="border:1px solid;padding:5px">' . $row->matricule . '</td>
<td style="border:1px solid;padding:5px">' . glpi_fabricant::findOrFail($row->fabricant_id)->name  . '</td>
<td style="border:1px solid;padding:5px">' . glpi_location::findOrFail($row->location_id)->Nom . '</td>
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
        $title = 'GLPI-Materiel-Bureaux --1';
        $header = 'Materiel-Bureaux';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Locations = glpi_location::all();
        return view('front.Materiel_BureauForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'Locations' => $Locations,
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
        glpi_MaterielBureau::create($request->all());
        return redirect()->route('MaterielBureau.index')->with(['success' => '??l??ment ajout??']);
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
        $title = "GLPI-Materiel-Bureaux --$id";
        $header = 'Materiel-Bureaux';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $Locations = glpi_location::all();
        $MaterielBureau = glpi_MaterielBureau::find($id);
        return view('front.edit.MaterielBureauEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'Locations' => $Locations,
            'MaterielBureau' => $MaterielBureau
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
        $MaterielBureau = glpi_MaterielBureau::find($id);
        $MaterielBureau->update($request->all());
        return redirect()->route('MaterielBureau.index')->with(['success' => '??l??ment modifi??']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $MaterielBureau = glpi_MaterielBureau::where('id', $id)->delete();
        return redirect()->route('MaterielBureau.index')->with(['success' => '??l??ment Supprimer']);
    }
}
