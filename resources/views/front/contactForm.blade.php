@extends('layouts.app')
@section('content')
<div class="container align-content-center border-0">
    <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Contacts.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Contacts.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Contacts
            </div>
            <div class="card-body">
                <form action="{{ route('Contacts.store') }}" method="POST">
                    @csrf
                    <table class="tab_cadre_fixe">
                        <tr class="">
                            <td>
                                <label for="nom">
                                    Nom de famille
                                </label>
                            </td>
                            <td>
                                <input type="text" name="name" value class="form-control">
                            </td>
                            <td rowspan="4" class="">
                                <label for="comment">
                                    Commentaires
                                </label>
                            </td>
                            <td rowspan="4" class="">
                                <textarea name="comment" id="" cols="45" rows="7">
                                    </textarea>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="firstname">
                                    Prénom
                                </label>
                            </td>
                            <td>
                                <input name="firstname" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="phone">
                                    Téléphone
                                </label>
                            </td>
                            <td>
                                <input name="phone" type="text" class="form-control">
                            </td>
                        </tr>
                        <tr class="">
                            <td>Téléphone 2</td>
                            <td><input type="text" name="phone2" value class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="mobile"> Téléphone mobile </label> </td>
                            <td><input type="text" name="mobile" id="mobile" class="form-control"></td>
                            <td class="">Adresse</td>
                            <td class="">
                                <textarea name="adress" id="" cols="37" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="fax">
                                    Fax
                                </label>
                            </td>
                            <td>
                                <input type="text" name="fax" id="fax" value class="form-control">
                            </td>
                            <td>
                                <label id="postcode">
                                    Code postal
                                </label>
                            </td>
                            <td><input type="text" name="postcode" id="postcode" class="form-control"></td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="email">
                                    Courriel
                                </label>
                            </td>
                            <td><input type="text" name="email" id="email" class="form-control"></td>
                            <td>
                                <label for="state">
                                    État
                                </label>
                            </td>
                            <td>
                                <input type="text" name="state" class="form-control">
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="Type">
                                    Type
                                </label>
                            </td>
                            <td>
                                <select name="Type" id="Type" class="py-1 px-3">
                                    <option value="">----</option>
                                </select>
                            </td>
                            <td>
                                <label for="country">
                                    Pays
                                </label>
                            </td>
                            <td>
                                <input type="text" name="country" class="form-control">
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <label for="title">
                                    Titre
                                </label>
                            </td>
                            <td>
                                <select name="title" id="title" class="py-1 px-3">
                                    <option value="">----</option>
                                </select>
                            </td>
                            <td>
                                <label for="town">
                                    Ville
                                </label>
                            </td>
                            <td>
                                <input type="text" name="town" id="town" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1"
                                        title="Ajouter"></i>
                                        ajouter
                                    </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
