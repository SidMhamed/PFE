@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0" role="alert">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Logiciel.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Logiciel.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div class="card border-0">
            <div class="card-header alert-heading border-success border-5">
                Nouvel élément - Logiciel
            </div>
            <div class="card-body">
                <form action="{{ route('Logiciel.store') }}" method="POST">
                    @csrf
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="name">Nom</label>
                            </td>
                            <td>
                                <input type="text" id="name" class="" name="name" required>
                            </td>
                            <td>
                                <label for="fabricant_id">Éditeur</label>
                            </td>
                            <td>
                                <select name="fabricant_id" id="fabricant_id" class="">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Fabricants as $Fabricant)
                                        <option value="{{ $Fabricant->id }}">{{ $Fabricant->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#Fabricants"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Lieu">Lieu</label>
                            </td>
                            <td>
                                <select name="locations_id" id="Lieu" class="">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Location->id }}">{{ $Location->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="Type">Catégorie</label>
                            </td>
                            <td>
                                <select name="LogicielCategories_id" id="Type" class="">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($LogicielCategories as $LogicielCategorie)
                                        <option value="{{ $LogicielCategorie->id }}">{{ $LogicielCategorie->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#CategorieLogiciel"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="RespTech">Technicien chargé du logiciel</label>
                            </td>
                            <td>
                                <select name="users_id_tech" id="RespTech" class="" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="ticket_tco">Associable à un ticket</label>
                            </td>
                            <td>
                                <select name="ticket_tco" id="ticket_tco" class="" required>
                                    <option value="0">Oui</option>
                                    <option value="1">Non</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#Fabricants"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="GpTech">Groupe chargé du logiciel</label>
                            </td>
                            <td>
                                <select name="gruops_tech" id="GpTech" class="">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Location->id }}">{{ $Location->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td rowspan="4">
                                <label for="comment">Comment</label>
                            </td>
                            <td rowspan="4">
                                <textarea name="comment" id="comment" cols="50" rows="6" class="" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="users_id">Utilisateur</label>
                            </td>
                            <td>
                                <select name="users_id" id="users_id" class="" required>
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="group">Group</label>
                            </td>
                            <td>
                                <select name="groups_id" id="group" class="">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="MiseAjour">Mise à jour</label>
                            </td>
                            <td>
                                <select name="is_update" id="MiseAjour" class="">
                                    <option value="0">Oui</option>
                                    <option value="1">Non</option>
                                </select> de
                                <select name="MiseAjour" id="MiseAjour" class="">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($SourceMiseAjours as $SourceMiseAjour)
                                        <option value="{{ $SourceMiseAjour->id }}">{{ $SourceMiseAjour->Nom }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>ajouter
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    {{-- model pour le types des Logiciels --}}
    <div class="modal fade" id="CategorieLogiciel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Catégorie de logiciels</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'AjouterTypeLogiciels', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('comment', 'Commentaires') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'cols' => '3']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                        Ajouter</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- model pour les Fabricants --}}
    <div class="modal fade my-5" id="Fabricants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Fabricant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'Computer.Fabricant', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('Nom', 'Nom') !!}
                        {!! Form::text('Nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('commentaires', 'Commentaires') !!}
                        {!! Form::textarea('commentaires', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'cols' => '3']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                        Ajouter</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
