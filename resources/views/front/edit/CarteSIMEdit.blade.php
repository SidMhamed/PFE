@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0" role="alert">
        <h4 class="alert-heading alert text-white">{{ $header }}</h4>
        <div class="card border-0">
            <div class="card-header alert-heading  border-success border-5 text-center">
                <h3> {{ App\Models\ComposatsCarteSIM::findOrFail($CarteSIM->devicesimcards_id)->name }} </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('CarteSIM.update', $CarteSIM->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="Élément">Élément</label>
                            </td>
                            <td>
                                <label for="Élément">Pas d'élément associé</label>
                            </td>
                            <td>
                                <label for="devicesimcards_id">Composant</label>
                            </td>
                            <td>
                                <select name="devicesimcards_id" id="devicesimcards_id" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Composants as $Composant)
                                        <option value="{{ $Composant->id }}">{{ $Composant->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#composant"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="serial">Numéro de série</label>
                            </td>
                            <td>
                                <input type="text" name="serial" value="{{ $CarteSIM->serial ?? '' }}" id="serial">
                            </td>
                            <td>
                                <label for="otherserial">Numéro d'inventaire</label>
                            </td>
                            <td>
                                <input type="text" name="otherserial" value="{{ $CarteSIM->otherserial ?? '' }}"
                                    id="otherserial">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="locations_id">Lieu</label>
                            </td>
                            <td>
                                <select name="locations_id" id="locations_id" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="Statuts_id">Statut</label>
                            </td>
                            <td>
                                <select name="Statuts_id" id="Statuts_id" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    {{-- @foreach ($Statuts as $Statut)
                                            <option value="{{$Statut->id}}">{{$Statut->Nom}}</option>
                                        @endforeach --}}
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pin">Code PIN</label>
                            </td>
                            <td>
                                <input type="text" name="pin" value="{{ $CarteSIM->pin ?? '' }}" id="pin" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="pin2">Code PIN2</label>
                            </td>
                            <td>
                                <input type="text" name="pin2" value="{{ $CarteSIM->pin2 ?? '' }}" id="pin2" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="puk">Code PUK</label>
                            </td>
                            <td>
                                <input type="text" name="puk" value="{{ $CarteSIM->puk ?? '' }}" id="puk" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="puk2">Code PUK2</label>
                            </td>
                            <td>
                                <input type="text" name="puk2" value="{{ $CarteSIM->puk2 ?? '' }}" id="puk2" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Ligne">Ligne</label>
                            </td>
                            <td>
                                <select name="lines_id" id="lines_id" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    {{-- @foreach ($Locations as $Location)
                                            <option value="{{$Location->id}}">{{$Location->name}}</option>
                                        @endforeach --}}
                                </select>
                            </td>
                            <td>
                                <label for="msin">Mobile Subscriber Identification Number</label>
                                <i class="fas fa-info pointer" title="Le MSIN est Constitué des 8 ou 10 derniers Chiffres de l'IMSI"></i>
                            </td>
                            <td>
                                <input type="text" name="msin" value="{{ $CarteSIM->msin ?? '' }}" id="msin" class="form-control px-0" required>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="user">Utilisateur</label>
                            </td>
                            <td>
                                <select name="users_id" id="user" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="Groupe">Groupe</label>
                            </td>
                            <td>
                                <select name="Groups_id" id="Groupe" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr class="alert alert-dark">
                            <th colspan="2">
                                Créé le {{ $CarteSIM->created_at }}
                            </th>
                            <th colspan="2">
                                Dernière mise à jour le{{ $CarteSIM->updated_at }}
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="">
                                <button type="submit" class="btn btn-success float-left"> <i class='fas fa-save mx-1'></i>
                                    Sauvegarder</button>
                            </td>
                            <td colspan="2" class="">
                                <table class="tab_cadre_fixe">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form method="POST" action="{{ route('CarteSIM.destroy', $CarteSIM->id) }}">
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
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    {{-- model pour le types des Carte sim --}}
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
                {!! Form::open(['method' => 'POST', 'route' => 'AjouterTypeCarteSIM', 'class' => 'form-horizontal']) !!}
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
    <div class="modal fade" id="composant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border border-success">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Carte SIM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'AjouterComposantCarteSIM', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('Fabricant_id') ? ' has-error' : '' }}">
                        {!! Form::label('fabricant_id', 'Fabricant') !!}
                        <select name="fabricant_id" id="fabricant_id" class="form-control">
                            <option value="" selected disabled>Selectionnez le Fabricant</option>
                            @foreach ($Fabricants as $Fabricant)
                                <option value="{{ $Fabricant->id }}">{{ $Fabricant->Nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('devicesimcardtypes_id') ? ' has-error' : '' }}">
                        {!! Form::label('devicesimcardtypes_id', 'Type') !!}
                        <select name="devicesimcardtypes_id" id="devicesimcardtypes_id" class="form-control">
                            <option value="" selected disabled>Selectionnez le Type</option>
                            <option value="1">Full SIM</option>
                            <option value="2">Micro SIM</option>
                            <option value="3">Mini SIM</option>
                            <option value="4">Nano SIM</option>
                        </select>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                        {!! Form::label('voltage', 'Voltage') !!}
                                        {!! Form::text('voltage', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                </td>
                                <td class="text-center">
                                    mV
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group{{ $errors->has('VoIP') ? ' has-error' : '' }}">
                        {!! Form::label('allow_voip', 'Autoriser la VoIP') !!}
                        <select name="allow_voip" id="allow_voip" class="form-control">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('comment', 'Commentaires') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '2']) !!}
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
