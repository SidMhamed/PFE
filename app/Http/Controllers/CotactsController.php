<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_contacts;
use Illuminate\Support\Facades\App;

class CotactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $title = 'GLPI-Contact';
          $header = 'Contacts';
          return view('front.contact')->with([
              'title' => $title,
              'header' => $header,
          ]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query) {
                $data = glpi_contacts::where('id', 'like', '%'. $query . '%')
                        ->OrWhere('name', 'like', '%' . $query . '%')
                        ->OrWhere('phone', 'like', '%' . $query . '%')
                        ->OrWhere('phone2', 'like', '%' . $query . '%')
                        ->OrWhere('fax', 'like', '%' . $query . '%')
                        ->OrWhere('email', 'like', '%' . $query . '%')
                        ->OrWhere('updated_at', 'like', '%' . $query . '%')
                        ->get();
            }
            else {
                $data = glpi_contacts::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row){
                    $output .= '
        <tr>
         <td valign="top"><a href="'.route('Contacts.edit',$row->id).'">'. $row->name . '</a></td>
         <td valign="top">' . $row->phone . '</td>
         <td valign="top">' . $row->phone2 . '</td>
         <td valign="top">' . $row->fax . '</td>
         <td valign="top">' . $row->email . '</td>
         <td valign="top">' . $row->updated_at . '</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="6">Aucune donnée disponible</td>
       </tr>
       ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
            );

            return response()->json($data);

        }
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
        $data = glpi_contacts::all();
        $output = '
<h3 style="text-align:center;">Listes des Fournisseurs</h3>
<table  style="margin: 0px auto 5px auto; background: #FFF; z-index: 1;text-align: center;border-collapse:collapse;font-size: 11px;max-width:100%;width:100%;border-spacing:0;">
<tr>
<th style="border:1px solid;padding:5px">ID</th>
<th style="border:1px solid;padding:5px">Nom</th>
<th style="border:1px solid;padding:5px">Téléphone</th>
<th style="border:1px solid;padding:5px">Téléphone 2</th>
<th style="border:1px solid;padding:5px">Fax</th>
<th style="border:1px solid;padding:5px">Email</th>
<th style="border:1px solid;padding:5px">Dernière modification</th>
</tr>';
        foreach ($data as $row) {
            $output .= '
<tr>
<td style="border:1px solid;padding:5px">' . $row->id . '</td>
<td style="border:1px solid;padding:5px">'. $row->name . '</a></td>
<td style="border:1px solid;padding:5px">' . $row->phone . '</td>
<td style="border:1px solid;padding:5px">' . $row->phone2 . '</td>
<td style="border:1px solid;padding:5px">' . $row->fax . '</td>
<td style="border:1px solid;padding:5px">' . $row->email . '</td>
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
        $title = 'GLPI-cotacs --1';
        $header = 'Contacts';
        return view('front.contactForm')->with([
            'title' => $title,
            'header' => $header,
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
        glpi_contacts::create($request->all());
        return redirect()->route('Contacts.index')->with(['success' => 'Élément ajouté']);

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
        $title = "GLPI-Contacts --$id";
        $header = 'Contacts';
        $Contacts = glpi_contacts::find($id);
        return view('front.edit.ContactsEdit')->with([
            'title' => $title,
            'header' => $header,
            'Contacts' => $Contacts,
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
        $Contact = glpi_contacts::find($id);
        $Contact->update($request->all());
        return redirect()->route('Contacts.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Contact = glpi_contacts::where('id', $id)->delete();
        return redirect()->route('Contacts.index')->with(['success' => 'Élément Supprimer']);
    }
}
