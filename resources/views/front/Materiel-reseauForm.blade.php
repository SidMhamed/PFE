@extends('layouts.app')
@section('content')
        <div class="container align-content-center border">
              <h4 class="alert-heading alert">{{$header}}</h4>
            <div class="card">
                    <div class="card-header alert-heading">
                            Nouvel élément - Matèriel-Reseaux
                    </div>
                <div class="card-body">
                    <form action="{{route('AjouterMateriel-Reseau')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="model">Nom</label>
                                <input type="text" name="nom" id="Nom" class="form-control" required placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                                <label for="Lieu">Lieu</label><i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="locations_id" id="Lieu" class="form-control">
                                    <option hidden value="" selected disabled>-----</option>
                                    <option value="1">iscae</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="RespTech">Responsable technique</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="users_id_tech" id="RespTech" class="form-control" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{$User->id}}">{{$User->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="GpTech">Groupe technique</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="gruops_tech" id="GpTech" class="form-control">
                                    <option value=""></option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="UsaNum">Usager numéro</label>
                                <input type="text" name="UsagerNumero" id="UsaNum" class="form-control" required placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="Usager">Usager</label>
                                <input type="text" name="Usager" id="Usager" class="form-control" required placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="user">Utilisateur</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="Utilisateur" id="user" class="form-control" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{$User->name}}">{{$User->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="group">Group</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="groups_id" id="group" class="form-control" >
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="group">L'adresse MAC et l'adresse IP de l'équipement sont inclus dans un port réseau agrégé</label>
                            </div>
                            <div class="form-group">
                                    <label for="Mémoire">Mémoire (Mio)</label>
                                    <input type="text" name="Memoire" class="form-control" id="Mémoire">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Statut">Statut</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                <select name="states_id" id="Statut" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#TypeOrdinateurs">+</i>
                                <select name="MaterielReseauTypes_id" id="Type" class="form-control" required>
                                        <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Types as $Type)
                                        <option value="{{$Type->id}}">{{$Type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Fab">Fabricant</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#Fabricants">+</i>
                                <select name="fabricant_id" id="Fab" class="form-control" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Fabricants as $Fabricant)
                                        <option value="{{$Fabricant->id}}">{{$Fabricant->Nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="model">Modél</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#ModaleOrdinateurs">+</i>
                                <select name="MaterielReseauModels_id" id="model" class="form-control" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Modeles as $Modele)
                                        <option value="{{$Modele->id}}">{{$Modele->Nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="NumSerie">Numéro de Série</label>
                                <input type="text" name="numeroDeSerie" id="NumSerie" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="NumDinventaire">Numéro de d'inventaire</label>
                                <input type="text" name="NumeroDinventaire" id="NumDinventaire" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="reseau">Réseau</label>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#ModalReseaux" onclick="$('#Add_Reseau').dialog('open');">+</i>
                                <select name="networks_id" id="reseau" class="form-control" required>
                                        <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Reseaux as $Reseau)
                                        <option value="{{$Reseau->id}}">{{$Reseau->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" cols="30" rows="8" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center my-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">ajouter</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<div>
 {{-- model pour le types des Ordinateurs--}}
    <div class="modal fade" id="TypeOrdinateurs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Type de matériel réseau</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            {!! Form::open(['method' => 'POST','route' => 'AjouterTypesMateriel-Reseau', 'class' => 'form-horizontal']) !!}
      <div class="modal-body">
        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
            {!! Form::label('Comment', 'Commentaires') !!}
            {!! Form::text('Comment', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
            {!! Form::close() !!}
    </div>
  </div>
</div>

       {{-- model pour le Fabricant des Ordinateurs--}}
   <div class="modal fade" id="Fabricants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
            {!! Form::close() !!}
    </div>
  </div>
</div>
</div>

{{-- Modal pour ajouter un Modele --}}
<div class="modal fade" id="ModaleOrdinateurs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Modèle de matériel réseau</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'AjouterModelsMateriel-Reseau', 'class' => 'form-horizontal']) !!}
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
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
            {!! Form::close() !!}
    </div>
  </div>
</div>


   {{--  Modal pour ajouter un reseau --}}
<div class="modal fade" id="ModalReseaux" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Réseau</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    {!! Form::open(['method' => 'POST','route' => 'Ajouter.Reseau', 'class' => 'form-horizontal']) !!}
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
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
                    {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
@endsection
