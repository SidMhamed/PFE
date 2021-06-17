@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Lines.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Lines.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - line
            </div>
            <div class="card-body">
                <form action="{{ route('Lines.store') }}" method="POST">
                    @csrf
                        <table class="tab_cadre_fixe">
                            <tr class="">
                                <td>
                                    <label for="name">
                                        Nom
                                    </label>
                                </td>
                                <td>
                                    <input name="name" type="text" id="name" class="form-control">
                                </td>
                                <td>
                                    <label for="states_id">
                                    Statut
                                    </label>
                                </td>
                                <td>
                                    <select name="states_id" id="states_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($status as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#TypeFournisseur"></i>
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="location_id">
                                    Lieu
                                    </label>
                                </td>
                                <td>
                                <select name="location_id" id="location_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->Nom }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#TypeFournisseur"></i>
                                </td>
                                <td>
                                    <label for="linetypes_id">
                                    Type de ligne                                    </label>
                                </td>
                                <td >
                                <select name="linetypes_id" id="linetypes_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#TypeFournisseur"></i>
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="caller_num">
                                    Numéro de l'appelant
                                    </label>
                                </td>
                                <td><input name="caller_num" id="caller_num" type="text" class="form-control"></td>
                                <td>
                                    <label for="caller_name">
                                    Nom de l'appelant
                                    </label>
                                </td>
                                <td><input name="caller_name" id="caller_name" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="users_id">
                                    Utilisateur
                                    </label>
                                </td>
                                <td>
                                <select name="users_id" id="users_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#TypeFournisseur"></i>
                                </td>
                                <td rowspan="2">
                                    <label for="comment">
                                    Commentaires
                                    </label>
                                </td>
                                <td rowspan="2">
                                   <textarea name="comment" id="" cols="45" rows="10"></textarea>
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label for="lineoperators_id">
                                    Opérateur téléphonique
                                    </label>
                                </td>
                                <td class="">
                                <select name="lineoperators_id" id="lineoperators_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($lineoperators as $lineoperator)
                                            <option value="{{ $lineoperator->id }}">{{ $lineoperator->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#"></i>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-center">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1"
                                            title="Ajouter"></i>ajouter</button>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
        </div>
        @endsection
