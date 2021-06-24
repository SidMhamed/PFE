<?php

namespace App\Http\Controllers;

use App\Models\ComposatsCarteSIM;
use App\Models\glpi_fabricant;
use App\Models\glpi_line;
use App\Models\glpi_location;
use App\Models\ItemsCarteSIM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CarteSIMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Carte SIM';
        $header = 'Catre SIM';
        return view('front.CarteSIM')->with([
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
                $data = ItemsCarteSIM::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('serial', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = ItemsCarteSIM::orderBy('created_at', 'DESC')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('CarteSIM.edit', $row->id) . '">' . $row->id . '</a></td>
            <td valign="top">' . $row->serial . '</td>
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
       $data = ItemsCarteSIM::all();
       $output = '
<h3 style="text-align:center;">Listes des Carte SIM</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Sérial</th>
<th style="border:1px solid;padding:5px">Dernière modification</th>
<th style="border:1px solid;padding:5px">Date de Création</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</a></td>
<td style="border:1px solid;padding:5px">' . $row->serial . '</td>
<td style="border:1px solid;padding:5px">' . $row->updated_at . '</td>
<td style="border:1px solid;padding:5px">' . $row->created_at . '</td>
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
        $title = 'GLPI-Cartes SIM';
        $header = 'Catre SIM';
        $user = User::all();
        $Lignes = glpi_line::all();
        $Locations = glpi_location::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        return view('front.CarteSIMForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Lignes' => $Lignes,
            'Locations' => $Locations,
            'Fabricants' => $Fabricants,
            'Composants' => $Composants,
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
        ItemsCarteSIM::create($request->all());
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Cartes SIM - $id";
        $header = 'Catre SIM';
        $user = User::all();
        $Lignes = glpi_line::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        $Locations = glpi_location::all();
        $CarteSIM = ItemsCarteSIM::find($id);
        return view('front.edit.CarteSIMEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Lignes' => $Lignes,
            'Fabricants' => $Fabricants,
            'Composants' => $Composants,
            'locations' => $Locations,
            'CarteSIM' => $CarteSIM,
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
        $CarteSIM = ItemsCarteSIM::find($id);
        $CarteSIM->update($request->all());
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CarteSIM = ItemsCarteSIM::where('id', $id)->delete();
        return redirect()->route('CarteSIM.index')->with(['success' => 'Élément Supprimer']);
    }
}
