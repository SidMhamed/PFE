<?php

namespace App\Http\Controllers;

use App\Models\glpi_groups;
use App\Models\glpi_location;
use App\Models\glpi_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'GLPI-Utilisateurs';
        $header = 'Utilisateurs';
        return view('front.User')->with([
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
                $data = User::where('id', 'like', '%' . $query . '%')
                    ->OrWhere('name', 'like', '%' . $query . '%')
                    ->OrWhere('last_login', 'like', '%' . $query . '%')
                    ->OrWhere('email', 'like', '%' . $query . '%')
                    ->OrWhere('locations_id', 'like', '%' . $query . '%')
                    ->OrWhere('updated_at', 'like', '%' . $query . '%')
                    ->OrWhere('created_at', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = User::orderBy('created_at', 'DESC')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
           <tr>
            <td valign="top"><a href="' . route('users.edit', $row->id) . '">' . $row->name . '</a></td>
            <td valign="top">' . $row->last_login . '</td>
            <td valign="top">' . $row->email . '</td>
            <td valign="top">' . $row->phone . '</td>
            <td valign="top">' . glpi_location::findOrFail($row->locations_id)->Nom . '</td>
            <td valign="top"></td>
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
        $title = 'GLPI-Utilisateurs - 1';
        $header = 'Utilisateurs';
        $Locations = glpi_location::all();
        $Profiles = glpi_profile::all();
        return view('front.UserForm')->with([
            'title' => $title,
            'header' => $header,
            'Locations' => $Locations,
            'Profiles' => $Profiles,
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
        User::create([
            'name' => $request->name,
            'fieldlist' => $request->fieldlist,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'mobile' => $request->mobile,
            'locations_id' => $request->locations_id,
            'profiles_id' => $request->profiles_id,
            'language' => $request->language,
            'use_mode' => $request->use_mode,
            'list_limit' => $request->list_limit,
            'is_active' => $request->is_active,
            'auths_id' => $request->auths_id,
            'authtype' => $request->authtype,
            'last_login' => $request->last_login,
            'date_sync' => $request->date_sync,
            'is_deleted' => $request->is_deleted,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('users.index')->with(['success' => 'Élément ajouté']);
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
        $title = "GLPI-Utilisateurs - $id";
        $header = "Utilisateurs";
        $User = User::find($id);
        $Locations = glpi_location::all();
        $Profiles = glpi_profile::all();
        return view('front.edit.UserEdit')->with([
            'title' => $title,
            'header' => $header,
            'User' => $User,
            'Profiles' => $Profiles,
            'Locations' => $Locations,
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
        $User = User::find($id);
        $User->update([
            'name' => $request->name,
            'fieldlist' => $request->fieldlist,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'mobile' => $request->mobile,
            'locations_id' => $request->locations_id,
            'profiles_id' => $request->profiles_id,
            'language' => $request->language,
            'use_mode' => $request->use_mode,
            'list_limit' => $request->list_limit,
            'is_active' => $request->is_active,
            'auths_id' => $request->auths_id,
            'authtype' => $request->authtype,
            'last_login' => $request->last_login,
            'date_sync' => $request->date_sync,
            'is_deleted' => $request->is_deleted,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with(['success' => 'Élément modifié']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::where('id', $id)->delete();
        return redirect()->route('users.index')->with(['success' => 'Élément Supprimer']);
    }
}
