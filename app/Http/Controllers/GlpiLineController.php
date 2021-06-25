<?php

namespace App\Http\Controllers;

use App\Models\glpi_line;
use App\Models\glpi_lineoperators;
use App\Models\glpi_linetypes;
use App\Models\glpi_location;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GlpiLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "GLPI-Linges";
        $header = "lines";
        return view('front.line')->with([
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
                $data = glpi_line::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('comment', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_line::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Lines.edit', $row->id) . '">' . $row->id . '</a></td>
            <td valign="top">' . $row->name . '</td>
            <td valign="top">' . $row->updated_at . '</td>
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
        $data = glpi_line::all();
        $output = '
<h3 style="text-align:center;">Listes des Fournisseurs</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
    <th style="border:1px solid;padding:5px">ID</th>
    <th style="border:1px solid;padding:5px">Nom</th>
    <th style="border:1px solid;padding:5px">Dernière modification</th>
</tr>';
        foreach ($data as $row) {
            $output .= '
<tr>
    <td style="border:1px solid;padding:5px">' . $row->id . '</td>
    <td style="border:1px solid;padding:5px">' . $row->name . '</td>
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
        $title = "GLPI-Line";
        $header = "Lines";
        $user = User::all();
        $state = Statut::all();
        $locations = glpi_location::all();
        $lineoperators = glpi_lineoperators::all();
        $types = glpi_linetypes::all();
        return view('front.LineForm')->with([
            'title' => $title,
            'header' => $header,
            'users' => $user,
            'status' => $state,
            'locations' => $locations,
            'lineoperators' => $lineoperators,
            'types' => $types,
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
        glpi_line::create($request->all());
        return redirect()->route('Lines.index')->with(['success' => 'Élément ajouté']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\glpi_line  $glpi_line
     * @return \Illuminate\Http\Response
     */
    public function show(glpi_line $glpi_line)
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
        $title = "GLPI-Lines --$id";
        $header = "Lines";
        $user = User::all();
        $state = Statut::all();
        $location = glpi_location::all();
        $lineoperators = glpi_lineoperators::all();
        $linetype = glpi_linetypes::all();
        $Lignes = glpi_line::find($id);
        return view('front.edit.LinesEdit')->with([

            'title' => $title,
            'header' => $header,
            'users' => $user,
            'status' => $state,
            'locations' => $location,
            'lineoperators' => $lineoperators,
            'types' => $linetype,
            'Lignes' => $Lignes,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Lignes = glpi_line::find($id);
        $Lignes->update($request->all());
        return redirect()->route('Lines.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $line = glpi_line::where('id', $id)->delete();
        return redirect()->route('Lines.index')->with(['success' => 'Élément Supprimer']);
    }
}
