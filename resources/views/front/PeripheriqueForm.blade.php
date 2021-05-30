@extends('layouts.app')
@section('content')
<div class="container align-content-center border" role="alert">
              <h4 class="alert-heading alert">{{$header}}</h4>
        <div class="card border-0">
            <div class="card-header alert-heading border">
                   Nouvel élément - Téléphone
            </div>
            <div class="card-body">
                 <form action="{{route('AjouterPeripherique')}}" method="POST">
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
                                    <label for="Statut">Statut</label>
                            </td>
                            <td>
                                    <select name="states_id" id="Statut" class="">
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
                            <select name="locations_id" id="Lieu" class="">
                            <option hidden value="" selected disabled>-----</option>
                            <option value="1">iscae</option>
                            </select>
                            <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                        </td>
                        <td>
                                    <label for="Type">Type</label>
                        </td>
                        <td>
                                    <select name="Peripheriquetypes_id" id="Type" class="" >
                                            <option hidden value="" selected disabled>-----</option>
                                        @foreach ($Types as $Type)
                                            <option value="{{$Type->id}}">{{$Type->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#TypeTelephone"></i>
                        </td>
                       </tr>
                       <tr>
                        <td>
                                <label for="RespTech">Responsable technique</label>
                            </td>
                            <td>
                                    <select name="users_id_tech" id="RespTech" class="" required>
                                        <option hidden value="" selected disabled>-----</option>
                                        @foreach ($Users as $User)
                                            <option value="{{$User->id}}">{{$User->name}}</option>
                                        @endforeach
                                    </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        <td>
                            <label for="Fab">Fabricant</label>
                            </td>
                            <td>
                                    <select name="fabricant_id" id="Fab" class="" required>
                                        <option  value="" selected disabled>-----</option>
                                        @foreach ($Fabricants as $Fabricant)
                                            <option value="{{$Fabricant->id}}">{{$Fabricant->Nom}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#Fabricants"></i>
                            </td>
                       </tr>
                       <tr>
                        <td>
                                    <label for="GpTech">Groupe technique</label>
                            </td>
                            <td>
                                    <select name="gruops_tech" id="GpTech" class="">
                                        <option value="" selected disabled>-----</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                       <td>
                                    <label for="model">Modél</label>
                            </td>
                            <td>
                                    <select name="Peripheriquemodels_id" id="model" class="">
                                            <option value="" selected disabled>-----</option>
                                        @foreach ($Models as $Model)
                                            <option value="{{$Model->id}}">{{$Model->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#ModaleTelephone"></i>
                            </td>
                       </tr>
                       <tr>
                         <td>
                                <label for="UsaNum">Usager numéro</label>
                            </td>
                            <td>
                                    <input type="text" name="UsagerNumero" id="UsaNum" class="" required placeholder="" aria-describedby="helpId">
                            </td>
                        <td>
                                    <label for="NumSerie">Numéro de Série</label>
                            </td>
                            <td>
                                    <input type="text" name="numeroDeSerie" id="NumSerie" class="" required>
                            </td>
                       </tr>
                        <tr>
                       <td>
                            <label for="Usager">Usager</label>
                            </td>
                            <td>
                                    <input type="text" name="Usager" id="Usager" class="" required placeholder="" aria-describedby="helpId">
                            </td>
                         <td>
                                <label for="NumDinventaire">Numéro de d'inventaire</label>
                            </td>
                            <td>
                                <input type="text" name="NumeroDinventaire" id="NumDinventaire" class="" required>
                            </td>
                       </tr>
                     <tr>
                       <td>
                                <label for="user">Utilisateur</label>
                            </td>
                            <td>
                                    <select name="Utilisateur" id="user" class="" required>
                                        <option hidden value="" selected disabled>-----</option>
                                        @foreach ($Users as $User)
                                            <option value="{{$User->name}}">{{$User->name}}</option>
                                        @endforeach
                                    </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        <td>
                        <label for="TypeDeGestion">Type de Gestion</label>
                        </td>
                        <td>
                             <select name="TypeDeGestion" id="TypeDeGestion" class="">
                                        <option  value="0">Gestion unitaire</option>
                                        <option  value="1">Gestion globale</option>
                            </select>
                        </td>
                    </tr>
                     <tr>
                        <td>
                                    <label for="group">Group</label>
                            </td>
                            <td>
                                    <select name="groups_id" id="group" class="" >
                                        <option hidden value="" selected disabled>-----</option>
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                         <td rowspan="2">
                                    <label for="comment">Comment</label>
                         </td>
                         <td  rowspan="2">
                                    <textarea name="comment" id="comment" cols="35" rows="3" class="" required></textarea>
                         </td>
                     </tr>
                     <tr>
                        <td>
                          <label for="marque">Marque</label>
                        </td>
                        <td>
                        <input type="text" class="" name="Marque" id="marque">
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
    {{-- model pour le types des Telephone--}}
    <div class="modal fade" id="TypeTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Type de périphérique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            {!! Form::open(['method' => 'POST','route' => 'AjouterTypePeripherique', 'class' => 'form-horizontal']) !!}
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
 {{-- model pour le Modèle des Telephone--}}
    <div class="modal fade" id="ModaleTelephone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Modèle de périphérique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            {!! Form::open(['method' => 'POST','route' => 'AjouterModelsPeripherique', 'class' => 'form-horizontal']) !!}
      <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
                <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-success">
        <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
        Ajouter</button>
      </div>
            {!! Form::close() !!}
    </div>
  </div>
</div>
 {{-- model pour les Fabricants--}}
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
