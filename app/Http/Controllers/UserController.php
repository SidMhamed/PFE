<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_location;
use App\Models\glpi_groups;
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
        $User = User::all();
        return view('front.User')->with([
            'title' => $title,
            'User' => $User,
            'header' => $header
        ]);
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
        $groups = glpi_groups::all();
        return view('front.UserForm')->with([
            'title' => $title,
            'header' => $header,
            'Locations' => $Locations,
            'groups' => $groups
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
            'name' => $request -> name,
            'fieldlist' => $request ->fieldlist,
            'phone' => $request ->phone,
            'phone2' => $request ->phone2,
            'mobile' => $request ->mobile,
            'locations_id' => $request ->locations_id,
            'profiles_id' => $request ->profiles_id,
            'language' => $request ->language,
            'use_mode' => $request ->use_mode,
            'list_limit' => $request ->list_limit,
            'is_active' => $request ->is_active,
            'auths_id' => $request ->auths_id,
            'authtype' => $request ->authtype,
            'last_login' => $request ->last_login,
            'date_sync' => $request ->date_sync,
            'is_deleted' => $request ->is_deleted,
            'entities_id' => $request ->entities_id,
            'usertitles_id' => $request ->usertitles_id,
            'usercategories_id' => $request ->usercategories_id,
            'csv_delimiter' => $request ->csv_delimiter,
            'api_token' => $request ->api_token,
            'api_token_date' => $request ->api_token_date,
            'cookie_token' => $request ->cookie_token,
            'cookie_token_date' => $request ->cookie_token_date,
            'groups_id' => $request ->groups_id,
            'users_id_supervisor' => $request ->users_id_supervisor,
            'email' => $request -> email,
            'email_verified_at' => $request -> email_verified_at,
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
      $groups = glpi_groups::all();
      $Locations = glpi_location::all();
      return view('front.edit.UserEdit')->with([
        'title' => $title,
        'header' => $header,
        'User' => $User,
        'groups' => $groups,
        'Locations' => $Locations
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
            'name' => $request -> name,
            'fieldlist' => $request ->fieldlist,
            'phone' => $request ->phone,
            'phone2' => $request ->phone2,
            'mobile' => $request ->mobile,
            'locations_id' => $request ->locations_id,
            'profiles_id' => $request ->profiles_id,
            'language' => $request ->language,
            'use_mode' => $request ->use_mode,
            'list_limit' => $request ->list_limit,
            'is_active' => $request ->is_active,
            'auths_id' => $request ->auths_id,
            'authtype' => $request ->authtype,
            'last_login' => $request ->last_login,
            'date_sync' => $request ->date_sync,
            'is_deleted' => $request ->is_deleted,
            'entities_id' => $request ->entities_id,
            'usertitles_id' => $request ->usertitles_id,
            'usercategories_id' => $request ->usercategories_id,
            'csv_delimiter' => $request ->csv_delimiter,
            'api_token' => $request ->api_token,
            'api_token_date' => $request ->api_token_date,
            'cookie_token' => $request ->cookie_token,
            'cookie_token_date' => $request ->cookie_token_date,
            'groups_id' => $request ->groups_id,
            'users_id_supervisor' => $request ->users_id_supervisor,
            'email' => $request -> email,
            'email_verified_at' => $request -> email_verified_at,
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
        $User =  User::where('id', $id)->delete();
        return redirect()->route('users.index')->with(['success' => 'Élément Supprimer']);
   }
}
