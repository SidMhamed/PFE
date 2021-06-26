@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0" role="alert">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Telephone.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Telephone.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div class="card border-0">
            <div class="card-header alert-heading  border-success border-5 text-center">
                <h3>{{ $Telephone->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Telephone.update', $Telephone->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="name">Nom</label>
                            </td>
                            <td>
                                <input type="text" id="name" value="{{ $Telephone->name ?? '' }}" class="form-control" name="name" required>
                            </td>
                            <td>
                                <label for="Statut">Statut</label>
                            </td>
                            <td>
                                <select name="states_id" id="Statut" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Lieu">Lieu</label>
                            </td>
                            <td>
                                <select name="locations_id" id="Lieu" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Location->id }}">{{ $Location->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="Type">Type</label>
                            </td>
                            <td>
                                <select name="telephonetypes_id" id="Type" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Types as $Type)
                                        <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#TypeTelephone"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Fab">Fabricant</label>
                            </td>
                            <td>
                                <select name="fabricant_id" id="Fab" class="py-1 px-2">
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
                                <label for="model">Modél</label>
                            </td>
                            <td>
                                <select name="telephonemodels_id" id="model" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Models as $Model)
                                        <option value="{{ $Model->id }}">{{ $Model->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#ModaleTelephone"></i>
                            </td>
                            <td>
                                <label for="marque">Marque</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{ $Telephone->Marque ?? '' }}" name="Marque" id="marque">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="UsaNum">Usager numéro</label>
                            </td>
                            <td>
                                <input type="text" name="UsagerNumero" value="{{ $Telephone->UsagerNumero ?? '' }}" id="UsaNum" class="form-control" required placeholder=""
                                    aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="NumSerie">Numéro de Série</label>
                            </td>
                            <td>
                                <input type="text" name="numeroDeSerie" value="{{ $Telephone->numeroDeSerie ?? '' }}" id="NumSerie" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Usager">Usager</label>
                            </td>
                            <td>
                                <input type="text" name="Usager" value="{{ $Telephone->Usager ?? '' }}" id="Usager" class="form-control" required placeholder=""
                                    aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="NumDinventaire">Numéro de d'inventaire</label>
                            </td>
                            <td>
                                <input type="text" name="NumeroDinventaire" value="{{ $Telephone->NumeroDinventaire ?? '' }}" id="NumDinventaire" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="users_id">Utilisateur</label>
                            </td>
                            <td>
                                <select name="users_id" id="users_id" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="TypeDeGestion">Type de Gestion</label>
                            </td>
                            <td>
                                <select name="TypeDeGestion" id="TypeDeGestion" class="py-1 px-2">
                                    <option value="0">Gestion unitaire</option>
                                    <option value="1">Gestion globale</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Alimentation">Alimentation</label>
                            </td>
                            <td>
                                <select name="Alimentation" id="Alimentation" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    {{-- @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach --}}
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td rowspan="3">
                                <label for="comment">Comment</label>
                            </td>
                            <td rowspan="3">
                                <textarea name="comment" id="comment" cols="30" rows="4" class="form-control" required>
                                    {{ $Telephone->comment ?? '' }}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="NombreLignes">Nombre de lignes</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="Nombrelignes" value="{{ $Telephone->Nombrelignes ?? '' }}" id="NombreLignes">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Options">Options</label>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>Casque</td>
                                        <td>
                                            <select name="Casque" id="Casque" class="py-1 px-2">
                                                <option value="0">Non</option>
                                                <option value="1">Oui</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Haut parleur</td>
                                        <td>
                                            <select name="Hautparleur" id="Hautparleur" class="py-1 px-2">
                                                <option value="0">Non</option>
                                                <option value="1">Oui</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="alert alert-dark">
                            <th colspan="2">
                                Créé le {{ $Telephone->created_at }}
                            </th>
                            <th colspan="2">
                                Dernière mise à jour le {{ $Telephone->updated_at }}
                            </th>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success px-2"> <i class='fas fa-save mx-1'></i>
                                    Sauvegarder</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <form method="POST" action="{{ route('Telephone.destroy', $Telephone->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Veuillez confirmer la suppression ?')"
                                        class="btn btn-danger px-3" title="Supprimer">
                                        <i class="fa fa-trash mx-1"></i>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- model pour le types des Telephone --}}
    <div class="modal fade" id="TypeTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Type de téléphone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'AjouterTypeTelephone', 'class' => 'form-horizontal']) !!}
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
    {{-- model pour le Modèle des Telephone --}}
    <div class="modal fade" id="ModaleTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Modèle de téléphone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'AjouterModelsTelephone', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('product_number', 'Numéro du produit') !!}
                        {!! Form::text('product_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
    <div class="modal fade" id="Fabricants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
