<?php

namespace App\Http\Controllers;

use App\Models\ComposatsCarteSIM;
use App\Models\glpi_fabricant;
use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\ItemsCarteSIM;
use App\Models\User;
use Illuminate\Http\Request;

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
        $groups = glpi_groups::all();
        $Locations = glpi_location::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        return view('front.CarteSIMForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Groups' => $groups,
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
        $groups = glpi_groups::all();
        $Fabricants = glpi_fabricant::all();
        $Composants = ComposatsCarteSIM::all();
        $Locations = glpi_location::all();
        $CarteSIM = ItemsCarteSIM::find($id);
        return view('front.edit.CarteSIMEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $user,
            'Groups' => $groups,
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
