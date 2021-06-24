<?php

namespace App\Http\Controllers;

use App\Models\Domaines;
use App\Models\DomainesType;
use Illuminate\Http\Request;

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
