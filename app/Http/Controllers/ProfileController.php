<?php

namespace App\Http\Controllers;

use App\Models\glpi_profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'GLPI-Profils';
        $header = 'Profil';
        return view('front.profiles')->with([
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
                $data = glpi_profile::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('is_default', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = glpi_profile::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('Telephone.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->id . '</td>
            <td valign="top">' . $row->is_default . '</td>
            <td valign="top">' . $row->updated_at . '</td>
           </tr>
           ';
                }
            } else {
                $output = '
          <tr>
           <td align="center" colspan="7" valign="top">Aucune donnée disponible</td>
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
        $title = 'GLPI-Profils';
        $header = 'Profil';
        return view('front.profileForm')->with([
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
        glpi_profile::create($request->all());
        return redirect()->route('profile.index')->with(['success' => 'Élément modifié']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
