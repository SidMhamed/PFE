@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0" role="alert">
        <h4 class="alert-heading alert text-white">{{ $header }}</h4>
        <div class="card border-0">
            <div class="card-header alert-heading  border-success border-5 text-center">
                <h3>{{ $User->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $User->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td><label for="name">Identifiant</label></td>
                            <td><input type="text" name="name" value="{{ $User->name ?? '' }}" id="name" class=""></td>
                            <td rowspan="4"></td>
                            <td rowspan="4"></td>
                        </tr>
                        <tr>
                            <td><label for="fieldlist">Nom de Famille</label></td>
                            <td><input type="text" id="fieldlist" name="fieldlist" value="{{ $User->fieldlist ?? '' }}"
                                    class=""> </td>
                        </tr>
                        <tr>
                            <td><label for="last_login">Prénom</label></td>
                            <td><input type="text" name="Plast_login" value="{{ $User->Plast_login ?? '' }}"
                                    id="last_login"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Mot de Passe</label></td>
                            <td><input type="password" name="password" id="password" value=""></td>
                        </tr>
                        <tr>
                            <td><label for="Cpassword">Confirmation de Mot de Passe</label></td>
                            <td><input type="password" name="password" id="Cpassword" value=""></td>
                            <td><label for="groups">groups</label></td>
                            <td>
                                <select name="groups_id" id="groups_id" class="py-1 px-3">
                                    <option value="">-----</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                            <td><input type="email" name="email" id="email" value="{{ $User->email ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td><label for="dateD">Valide depuis</label></td>
                            <td><input type="date" name="dateD" value="{{ $User->dateD ?? '' }}" id="dateD"
                                    class="form-control"></td>
                            <td><label for="dateF">Valide jusqu'à</label></td>
                            <td><input type="date" name="dateF" value="{{ $User->dateF ?? '' }}" id="dateF"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="phone">Téléphone</label></td>
                            <td colspan="3"><input type="tel" value="{{ $User->phone ?? '' }}" name="phone" id="phone">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mobile">Téléphone mobile</label></td>
                            <td><input type="tel" name="mobile" value="{{ $User->mobile ?? '' }}" id="mobile"></td>
                            <td><label for="usercategories_id">Catégorie</label></td>
                            <td>
                                <select name="usercategories_id" id="usercategories_id" class="py-1 px-3">
                                    <option value="" selected>-----</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="phone2">Téléphone 2</label></td>
                            <td><input type="tel" name="phone2" value="{{ $User->phone2 ?? '' }}" id="phone2"></td>
                            <td rowspan="3"><label for="comment">Commentaires</label></td>
                            <td rowspan="3">{!! Form::textarea('comment', $User->comment ?? '', ['rows' => '4', 'col' => '40']) !!}</td>
                        </tr>
                        <tr>
                            <td><label for="matricule">Matricule</label></td>
                            <td><input type="text" id="matricule" value="{{ $User->matricule ?? '' }}" name="matricule">
                            </td>
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
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Location->id }}">{{ $Location->Nom }}</option>
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
                        <tr class="alert alert-dark">
                            <th colspan="2">
                                Créé le {{ $User->created_at }}
                            </th>
                            <th colspan="2">
                                Dernière mise à jour le {{ $User->updated_at }}
                            </th>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success"> <i class='fas fa-save mx-1'></i>
                                    Sauvegarder</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td>
                                <form method="POST" action="{{ route('users.destroy', $User->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Veuillez confirmer la suppression ?')"
                                        class="btn btn-danger float-right" title="Supprimer">
                                        <i class="fa fa-trash mx-1"></i>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
@endsection
