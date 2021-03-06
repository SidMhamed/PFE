<?php

namespace App\Http\Controllers;

use App\Models\glpi_suppliers;
use App\Models\glpi_suppliertypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Fournissuers';
        $header = 'Fournisseurs';
        return view('front.fournisseur')->with([
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
                $data = glpi_suppliers::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('address', 'like', '%' . $query . '%')
                    ->OrWhere('email', 'like', '%' . $query . '%')
                    ->OrWhere('phonenumber', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_suppliers::orderBy('created_at', 'DESC')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Fournisseur.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->address . '</td>
            <td valign="top">' . $row->email . '</td>
            <td valign="top">' . $row->phonenumber . '</td>
            <td valign="top">' . glpi_suppliertypes::findOrFail($row->suppliertypes_id)->name . '</td>
            <td valign="top">' . $row->updated_at . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="6" valign="top">Aucune donn??e disponible</td>
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
        $data = glpi_suppliers::all();
        $output = '
<h3 style="text-align:center;">Listes des Fournisseurs</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Address</th>
<th style="border:1px solid;padding:5px">Email</th>
<th style="border:1px solid;padding:5px">T??l??phone</th>
<th style="border:1px solid;padding:5px">Type</th>
<th style="border:1px solid;padding:5px">Derni??re modification</th>
</tr>';
        foreach ($data as $row) {
            $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">' . $row->name . '</a></td>
<td style="border:1px solid;padding:5px">' . $row->address . '</td>
<td style="border:1px solid;padding:5px">' . $row->email . '</td>
<td style="border:1px solid;padding:5px">' . $row->phonenumber . '</td>
<td style="border:1px solid;padding:5px">' . glpi_suppliertypes::findOrFail($row->suppliertypes_id)->name . '</td>
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
        $title = 'GLPI-Fournisseurs--1';
        $header = 'Fournisseur';
        $type = glpi_suppliertypes::all();
        return view('front.fournisseurForm')->with([
            'title' => $title,
            'header' => $header,
            'types' => $type,

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
        glpi_suppliers::create($request->all());
        return redirect()->route('Fournisseur.index')->with(['success' => 'element ajoute']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\glpi_suppliers  $glpi_suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(glpi_suppliers $glpi_suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\glpi_suppliers  $glpi_suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-Fournisseurs--$id";
        $header = 'Fournisseur';
        $types = glpi_suppliertypes::all();
        $Fournisseur = glpi_suppliers::find($id);
        return view('front.edit.fournisseurEdit')->with([
            'title' => $title,
            'header' => $header,
            'types' => $types,
            'Fournisseur' => $Fournisseur,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Fourni = glpi_suppliers::find($id);
        $Fourni->update($request->all());
        return redirect()->route('Fournisseur.index')->with(['success' => '??l??ment modifi??']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\glpi_suppliers  $glpi_suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Moniteur = glpi_suppliers::where('id', $id)->delete();
        return redirect()->route('Fournisseur.index')->with(['success' => '??l??ment Supprimer']);

    }
}
