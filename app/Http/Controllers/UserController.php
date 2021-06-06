<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\glpi_location;
use App\Models\glpi_groups;
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
        $User = User::all();
        return view('front.User')->with([
            'title' => $title,
            'User' => $User
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
        User::create($request->all());
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
        $User->update($request->all());
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
