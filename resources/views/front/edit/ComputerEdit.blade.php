@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Computer.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Computer.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5 text-center">
                <h3>{{ $Computer->nom }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Computer.update', $Computer->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="model">Nom</label>
                            </td>
                            <td>
                                <input type="text" name="nom" id="Nom" value="{{ $Computer->nom ?? '' }}" class="form-control" required
                                    placeholder="" aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="Lieu">Lieu</label>
                            </td>
                            <td>
                                <select name="locations_id" id="Lieu" class="py-1 px-3">
                                    <option selected disabled value="">-----</option>
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Computer->Locations_id ?? $Location->id }}">{{ $Location->Nom }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="UsaNum">Usager numéro</label>
                            </td>
                            <td>
                                <input type="text" name="UsagerNumero" value="{{ $Computer->UsagerNumero ?? '' }}"
                                    id="UsaNum" class="form-control" required placeholder="" aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="Usager">Usager</label>
                            </td>
                            <td>
                                <input type="text" name="Usager" value="{{ $Computer->Usager ?? '' }}" id="Usager" class="form-control"
                                    required placeholder="" aria-describedby="helpId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="users_id">Utilisateur</label>
                            </td>
                            <td>
                                <select name="users_id" id="users_id" class="py-1 px-3" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="SMJ">Source mise à jour</label>
                            </td>
                            <td>
                                <select name="autoupdatesystems_id" id="SMJ" class="py-1 px-3" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($SourceMiseAjours as $SourceMiseAjour)
                                        <option value="{{ $SourceMiseAjour->id }}">{{ $SourceMiseAjour->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#exampleModal"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Statut">Statut</label>
                            </td>
                            <td>
                                <select name="states_id" id="Statut" class="py-1 px-3">
                                    <option value="" selected disabled>-----</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td>
                                <label for="Type">Type</label>
                            </td>
                            <td>
                                <select name="computertypes_id" id="Type" class="py-1 px-3" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Types as $Type)
                                        <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#TypeOrdinateurs"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Fab">Fabricant</label>
                            </td>
                            <td>
                                <select name="fabricant_id" id="Fab" class="py-1 px-3" required>
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Fabricants as $Fabricant)
                                        <option value="{{ $Fabricant->id }}">{{ $Fabricant->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#Fabricants"></i>
                            </td>
                            <td>
                                <label for="model">Modél</label>
                            </td>
                            <td>
                                <select name="computermodels_id" id="model" class="py-1 px-3" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Models as $Model)
                                        <option value="{{ $Model->id }}">{{ $Model->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#ModaleOrdinateurs"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="NumSerie">Numéro de Série</label>
                            </td>
                            <td>
                                <input type="text" name="numeroDeSerie" value="{{ $Computer->numeroDeSerie ?? '' }}"
                                    id="NumSerie" class="form-control" required>
                            </td>
                            <td>
                                <label for="NumDinventaire">Numéro de d'inventaire</label>
                            </td>
                            <td>
                                <input type="text" name="NumeroDinventaire"
                                    value="{{ $Computer->NumeroDinventaire ?? '' }}" id="NumDinventaire" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="reseau">Réseau</label>
                            </td>
                            <td>
                                <select name="networks_id" id="reseau" class="py-1 px-3" required>
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Reseaux as $Reseau)
                                        <option value="{{ $Reseau->id }}">{{ $Reseau->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                    data-target="#ModalReseaux" onclick="$('#Add_Reseau').dialog('open');"></i>
                            </td>
                            <td>
                                <label for="comment">Comment</label>
                            </td>
                            <td>
                                <textarea name="comment" id="comment" cols="40" rows="3" class="form-control" required>
                                    {{ $Computer->comment ?? '' }}
                                </textarea>
                            </td>
                        </tr>
                        <tr class="alert alert-dark">
                            <th colspan="2">
                                Créé le {{ $Computer->created_at }}
                            </th>
                            <th colspan="2">
                                Dernière mise à jour le{{ $Computer->updated_at }}
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
                                <form method="POST" action="{{ route('Computer.destroy', $Computer->id) }}">
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
    <div>
        {{-- Source de mise à jour --}}
        <div class="modal fade my-5 py-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Source de mise à jour</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'Ajouter.SourceMiseAJour', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('Nom', 'Nom') !!}
                            {!! Form::text('Nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('commentaires', 'Commentaires') !!}
                            {!! Form::textarea('commentaires', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '5', 'cols' => '5']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            Ajouter</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- model pour le types des Ordinateurs --}}
        <div class="modal fade my-5 py-5" id="TypeOrdinateurs" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Type d'ordinateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'Computer.type', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Nom') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('comment', 'Commentaires') !!}
                            {!! Form::text('comment', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            Ajouter</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{-- model pour le Fabricant des Ordinateurs --}}
        <div class="modal fade my-5 py-5" id="Fabricants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fabricant des Ordinateurs</h5>
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
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            Ajouter</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal pour ajouter un Modele --}}
    <div class="modal fade my-5 py-5" id="ModaleOrdinateurs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modéle des Ordinateurs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'Computer.Models', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Nom', 'Nom') !!}
                                {!! Form::text('Nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Numero_du_produit', 'Numero du produit') !!}
                                {!! Form::text('Numero_du_produit', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Poids', 'Poids') !!}
                                {!! Form::text('Poids', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Unites_requises', 'Unites requises') !!}
                                {!! Form::text('Unites_requises', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Profondeur', 'Profondeur') !!}
                                {!! Form::text('Profondeur', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                {!! Form::label('photoface', 'Photo face') !!}
                                {!! Form::file('photoface') !!}
                            </div>
                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                {!! Form::label('PhotoArriere', 'Photo arriere') !!}
                                {!! Form::file('PhotoArriere') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('ConnexionDalimentation', 'Connexion d\'alimentation') !!}
                                {!! Form::text('ConnexionDalimentation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('Puissance_consommee', 'Puissance consommée') !!}
                                {!! Form::text('Puissance_consommee', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('DemieLargeur', 'Demie Largeur') !!}
                                {!! Form::text('DemieLargeur', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('comment', 'Commentaires') !!}
                                {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'cols' => '3']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                        Ajouter</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    {{-- Modal pour ajouter un reseau --}}
    <div class="modal fade my-5 py-5" id="ModalReseaux" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nauveau Reseau</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'Ajouter.Reseau', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('nom', 'Nom') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('comment', 'Commentaires') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '5', 'cols' => '5']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                        Ajouter</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
