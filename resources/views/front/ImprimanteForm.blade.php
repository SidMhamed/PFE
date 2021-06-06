@extends('layouts.app')
@section('content')
        <div class="container align-content-center border-0">
            <h4 class="alert-heading alert text-white">
                <a class="text-white aa" href="{{route('home')}}">Accueil</a> >
                <a class="text-white aa" href="{{route('Imprimante.index')}}">{{$header}}</a> >
                <a class="text-white aa" href="{{route('Imprimante.create')}}"><i class="fa fa-plus-circle"></i></a>
            </h4>
            <div class="card">
                    <div class="card-header alert-heading border-success border-5">
                            Nouvel élément - Imprimante
                    </div>
                <div class="card-body">
                    <form action="{{route('Imprimante.Ajouter')}}" method="POST">
                    @csrf
                        <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                            <label for="model">Nom</label>

                            </td>
                            <td>
                                <input type="text" name="name" id="Nom" class="" required placeholder="" aria-describedby="helpId">
                            </td>
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
                                    <label for="GpTech">Groupe technique</label>
                            </td>
                            <td>
                                    <select name="gruops_tech" id="GpTech" class="">
                                        <option value="" selected disabled>-----</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
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
                            <label for="Usager">Usager</label>
                            </td>
                            <td>
                                    <input type="text" name="Usager" id="Usager" class="" required placeholder="" aria-describedby="helpId">
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
                        </tr>
                        <tr>
                            <td>
                                     <label for="Mémoire">Mémoire (Mio)</label>
                            </td>
                            <td>
                                     <input type="text" name="memory_size" class="" id="Mémoire">
                            </td>
                            <td>
                                         <label for="CompteurPageInitial">Compteur de page initial</label>
                            </td>
                            <td>
                                    <input type="text" name="init_pages_couter" class="" id="Mémoire">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                     <label for="CompteurPageActuel">Compteur de page actuel</label>
                            </td>
                            <td>
                                    <input type="text" name="last_pages_counter" class="" id="Mémoire">
                            </td>
                            <td>
                                    <label for="Statut">Statut</label>
                            </td>
                            <td>
                                <select name="states" id="Statut" class="">
                                    <option value="" selected disabled>-----</option>
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label for="Fab">Fabricant</label>
                            </td>
                            <td>
                                    <select name="manufacturers_id" id="Fab" class="" required>
                                        <option hidden value="" selected disabled>-----</option>
                                        @foreach ($Fabricants as $Fabricant)
                                            <option value="{{$Fabricant->id}}">{{$Fabricant->Nom}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#Fabricants"></i>
                            </td>
                            <td>
                                     <label for="Type">Type</label>
                            </td>
                            <td>
                                <select name="printertype_id" id="Type" class="" required>
                                        <option value="" selected disabled>-----</option>
                                    @foreach ($Types as $Type)
                                        <option value="{{$Type->id}}">{{$Type->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#TypeOrdinateurs"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                             <label for="model">Modél</label>
                            </td>
                            <td>
                                <select name="printermodels_id" id="model" class="" required>
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Modeles as $Modele)
                                        <option value="{{$Modele->id}}">{{$Modele->name}}</option>
                                    @endforeach
                                </select>
                             <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#ModaleOrdinateurs"></i>
                            </td>
                            <td>
                                <label for="NumSerie">Numéro de Série</label>
                            </td>
                            <td>
                                <input type="text" name="serial" id="NumSerie" class="" required>
                            </td>
                        </tr>
                        <tr>
                             <td>
                                <label for="NumDinventaire">Numéro de d'inventaire</label>
                             </td>
                             <td>
                                <input type="text" name="otherserial" id="NumDinventaire" class="" required>
                             </td>
                            <td>
                            <label for="reseau">Réseau</label>
                            </td>
                            <td>
                                    <select name="networks_id" id="reseau" class="" required>
                                            <option hidden value="" selected disabled>-----</option>
                                        @foreach ($Reseaux as $Reseau)
                                            <option value="{{$Reseau->id}}">{{$Reseau->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal" data-target="#ModalReseaux" onclick="$('#Add_Reseau').dialog('open');"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                    <label>Ports</label>
                            </td>
                            <td>
                                <table>
                                       <tr>
                                           <td>
                                            <label for="Série">Série</label>
                                           </td>
                                           <td>
                                            <select name="have_serial" id="Série" class="">
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                            </select>
                                           </td>
                                           <td>
                                            <label for="Ethernet">Ethernet</label>
                                           </td>
                                           <td>
                                             <select name="have_usb" id="Ethernet" class="">
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                            </select>
                                           </td>
                                       </tr>
                                        <tr>
                                           <td>
                                               <label for="Wifi">Wifi</label>
                                           </td>
                                           <td>
                                            <select name="have_wifi" id="Wifi" class="">
                                                       <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                            </select>
                                           </td>
                                           <td>
                                            <label for="Parallèle">Parallèle</label>
                                           </td>
                                           <td>
                                              <select name="have_parallel" id="Parallèle" class="">
                                                       <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                                </select>
                                           </td>
                                       </tr>
                                       <tr>
                                           <td>
                                            <label for="USB">USB</label>
                                           </td>
                                           <td colspan="3">
                                            <select name="have_ethernet" id="USB" class="">
                                                   <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                            </select>
                                           </td>
                                       </tr>
                                </table>
                            </td>
                               <td>
                                    <label for="comment">Comment</label>
                            </td>
                            <td>
                                    <textarea name="comment" id="comment" cols="30" rows="8" class=""></textarea>
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
<div>
 {{-- model pour le types des Imprinate--}}
    <div class="modal fade" id="TypeOrdinateurs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Type d'imprimante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            {!! Form::open(['method' => 'POST','route' => 'Imprimante.Types', 'class' => 'form-horizontal']) !!}
      <div class="modal-body">
        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
            {!! Form::label('Comment', 'Commentaires') !!}
            {!! Form::textarea('Comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'cols' => '3']) !!}
        </div>
        </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
Ajouter</button>
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
        <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
Ajouter</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Nouvel élément - Modèle d'Imprimante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'Imprimante.Model', 'class' => 'form-horizontal']) !!}
      <div class="modal-body">
                <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                {!! Form::label('product_Numbre', 'Numero du produit') !!}
                {!! Form::text('product_Numbre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                {!! Form::label('Comment', 'Commentaires') !!}
                {!! Form::textarea('Comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'cols' => '3']) !!}
                </div>
    </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
Ajouter</button>
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
        <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
Ajouter</button>
      </div>
                    {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
@endsection
