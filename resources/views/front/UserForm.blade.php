@extends('layouts.app')
@section('content')
<div class="container align-content-center border-0" role="alert">
                     <h4 class="alert-heading alert text-white">
              <a class="text-white aa" href="{{route('home')}}">Accueil</a> >
              <a class="text-white aa" href="{{route('users.index')}}">{{$header}}</a> >
              <a class="text-white aa" href="{{route('users.create')}}"><i class="fa fa-plus-circle"></i></a>
            </h4>
        <div class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                   Nouvel élément - Utilisateur
            </div>
            <div class="card-body">
                 <form action="{{route('users.store')}}" method="POST">
                 @csrf
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td><label for="name">Identifiant</label></td>
                            <td><input type="text" name="name" id="name" class=""></td>
                            <td rowspan="4"></td>
                            <td rowspan="4"></td>
                        </tr>
                        <tr>
                            <td><label for="fieldlist">Nom de Famille</label></td>
                            <td><input type="text" id="fieldlist" name="fieldlist" class=""> </td>
                        </tr>
                        <tr>
                            <td><label for="last_login">Prénom</label></td>
                            <td><input type="text" name="Plast_login" id="last_login"></td>
                        </tr>
                        <tr>
                           <td><label for="password">Mot de Passe</label></td>
                           <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td><label for="Cpassword">Confirmation de Mot de Passe</label></td>
                            <td><input type="password" name="password" id="Cpassword"></td>
                            <td><label for="groups">groups</label></td>
                            <td>
                                <select name="groups_id" id="groups_id" class="py-1 px-3">
                                    <option value="">-----</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="active">Actif</label></td>
                            <td>
                            <select name="is_active" id="is_active" class="py-1 px-3">
                             <option value="1">Oui</option>
                             <option value="0">Non</option>
                            </select>
                            </td>
                            <td><label for="email">Adresses de messagerie</label></td>
                            <td><input type="email" name="email" id="email"></td>
                        </tr>
                        <tr>
                            <td><label for="dateD">Valide depuis</label></td>
                            <td><input type="date" name="dateD" id="dateD" class="form-control"></td>
                            <td><label for="dateF">Valide jusqu'à</label></td>
                            <td><input type="date" name="dateF" id="dateF" class="form-control"></td>
                        </tr>
                        <tr>
                          <td><label for="phone">Téléphone</label></td>
                          <td colspan="3"><input type="tel" name="phone" id="phone"></td>
                        </tr>
                        <tr>
                           <td><label for="mobile">Téléphone mobile</label></td>
                           <td><input type="tel" name="mobile"></td>
                           <td><label for="usercategories_id">Catégorie</label></td>
                           <td>
                                <select name="usercategories_id" id="usercategories_id" class="py-1 px-3">
                                    <option value="" selected>-----</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                         <td><label for="phone2">Téléphone 2</label></td>
                         <td><input type="tel" name="phone2" id="phone2"></td>
                         <td rowspan="3"><label for="comment">Commentaires</label></td>
                         <td rowspan="3">{!! Form::textarea('comment','', ['rows' => '4','col' => '40']) !!}</td>
                        </tr>
                        <tr>
                        <td><label for="matricule">Matricule</label></td>
                        <td><input type="text" id="matricule" name="matricule"></td>
                        </tr>
                        <tr>
                         <td><label for="usertitles_id">Titre</label></td>
                         <td>
                             <select name="usertitles_id" id="Categorie" class="py-1 px-3">
                                    <option value="">-----</option>
                            </select>
                         </td>
                        </tr>
                        <tr>
                        <td><label for="">Location</label></td>
                        <td>
                        <select name="recursif" id="recursif" class="py-1 px-3">
                                    <option value="">-----</option>
                                    @foreach($Locations as $Location)
                                    <option value="{{$Location->id}}">{{$Location->Nom}}</option>
                                    @endforeach
                            </select>
                        </td>
                         <td><label for="recursif">Récursif</label></td>
                         <td>
                            <select name="recursif" id="recursif" class="py-1 px-3">
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                            </select>
                         </td>
                        </tr>
                        <tr>
                        <td><label for="profiles_id">profile</label></td>
                        <td>
                               <select name="profil" id="profil" class="py-1 px-3">
                                    <option value="">----</option>
                                </select>
                        </td>
                        <td><label for="entities_id">Entité</label></td>
                        <td>
                            <select name="entities_id" id="entities_id" class="py-1 px-3">
                                    <option value="">----</option>
                                </select>
                        </td>
                        </tr>
                        <tr>
                           <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>ajouter</button>
                           </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
