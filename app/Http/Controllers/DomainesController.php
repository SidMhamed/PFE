<?php

namespace App\Http\Controllers;

use App\Models\Domaines;
use App\Models\DomainesType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DomainesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Domaine';
        $header = 'Domaine';
        return view('front.Domaines')->with([
            'title' => $title,
            'header' => $header,
        ]);
    }
    function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Domaines::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('tech', 'like', '%' . $query . '%')
                    ->OrWhere('date_creation', 'like', '%' . $query . '%')
                    ->OrWhere('date_expiration', 'like', '%' . $query . '%')
                    ->OrWhere('others', 'like', '%' . $query . '%')
                    ->OrWhere('domaintypes_id', '%' . $query . '%')
                    ->OrWhere('comment', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = Domaines::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Domaines.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->tech . '</td>
            <td valign="top">' . DomainesType::findOrFail($row->domaintypes_id)->name . '</td>
            <td valign="top">' . $row->date_expiration . '</td>
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
       $data = Domaines::all();
       $output = '
       <img src="/images/headeriscae.jpg" style="width:100%;height: 141px;">
<h3 style="text-align:center;">Listes des Domaines</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Responsable</th>
<th style="border:1px solid;padding:5px">Type</th>
<th style="border:1px solid;padding:5px">Date Expiration</th>
<th style="border:1px solid;padding:5px">Dernière modification</th>
</tr>';
       foreach ($data as $row) {
           $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</a></td>
<td style="border:1px solid;padding:5px">' . $row->tech . '</td>
<td style="border:1px solid;padding:5px">' . DomainesType::findOrFail($row->domaintypes_id)->name . '</td>
<td style="border:1px solid;padding:5px">' . $row->date_expiration . '</td>
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
        $title = 'GLPI-Domaines --1';
        $header = 'Domaines';
        $Type = DomainesType::all();
        return view('front.DomainesForm')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $Type,
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
        Domaines::create($request->all());
        return redirect()->route('Domaines.index')->with(['success' => 'Élément ajouté']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domaines  $domaines
     * @return \Illuminate\Http\Response
     */
    public function show(Domaines $domaines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domaines  $domaines
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-Ordinateurs --$id";
        $header = 'Ordinateur';
        $Type = DomainesType::all();
        $Domaines = Domaines::find($id);
        return view('front.edit.DomainesEdit')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $Type,
            'Domaines' => $Domaines,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domaines  $domaines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Domaines = Domaines::find($id);
        $Domaines->update($request->all());
        return redirect()->route('Domaines.index')->with(['success' => 'Élément modifié']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domaines  $domaines
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Domaines = Domaines::where('id', $id)->delete();
        return redirect()->route('Domaines.index')->with(['success' => 'Élément Supprimer']);
    }
}
