@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('License.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('License.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - License
            </div>
            <div class="card-body">
                <form action="{{ route('License.store') }}" method="POST">
                    @csrf
                        <table class="tab_cadre_fixe">
                            <tr class="">
                                <td>
                                    <label for="softwares_id">
                                    Logiciel
                                    </label>
                                </td>
                                <td>
                                <select name="softwares_id" id="softwares_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($logiciels as $logiciel)
                                            <option value="{{ $logiciel->id }}">{{ $logiciel->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#logiciellicense"></i>
                                </td>
                                <td colspan="2">

                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="name">
                                    Nom
                                    </label>
                                </td>
                                <td>
                                    <input name="name" id="name" type="textfield" class="form-control">
                                </td>
                                <td>
                                <label for="statut_id">	Statut</label>

                                </td>
                                <td>
                                <select name="statut_id" id="statut_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#stateLogiciel"></i>
                                </td>
                            <tr class="">
                                <td>
                                    <label for="locations_id">
                                        Lieu
                                    </label>
                                </td>
                                <td><select name="locations_id" id="locations_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->Nom }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#lieulogiciel"></i>
                                </td>
                                <td>
                                <label for="softwarelicensetypes_id">Type</label>



                                </td>
                                <td><select name="softwarelicensetypes_id" id="softwarelicensetypes_id" class="py-1 px-3">
                                        <option value="">----</option>
                                        @foreach ($Types as $Type)
                                            <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
                                        data-target="#typelogiciel"></i>
                                </td>
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
                                        data-target="#utilisateurlogiciel"></i>
                                </td>
                                <td>
                                    <label for="serial">
                                    Numéro de série
                                    </label>
                                </td>
                                <td>
                                    <input name="serial" id="email" type="serial" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    <label for="comment">
                                        Commentaires
                                    </label>
                                </td>
                                <td rowspan="2" class="">
                                    <textarea name="comment" id="comment" cols="45" rows="5"></textarea>
                                </td>
                                <td>
                                    <label for="number">
                                    Nombre
                                    </label>
                                </td>
                                <td>
                                <select name="number" id="number" class="py-1 px-3">
                                        <option value=""></option>

                                            <option value="">1</option>

                                    </select>
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="expire">
                                    Expiration
                                    </label>
                                </td>
                                <td>
                                    <input name="expire" id="expire" type="datetime" class="form-control">
                                </td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center my-2">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1"
                                            title="Ajouter"></i>ajouter</button>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
        {{-- model pour logiciel du license --}}
     {{-- <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">license du logiciel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {!! Form::open(['method' => 'POST', 'route' => 'licenseLogiciel.store', 'class' => 'form-horizontal']) !!}
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
 </div> --}}
 {{-- model pour le status du license --}}
     {{-- <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">statut du license</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {!! Form::open(['method' => 'POST', 'route' => 'stateLicense.store', 'class' => 'form-horizontal']) !!}
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
 </div> --}}
 {{-- model pour le  lieu du license --}}
     {{-- <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Lieu du License</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {!! Form::open(['method' => 'POST', 'route' => 'lieuLicense.store', 'class' => 'form-horizontal']) !!}
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
 {{-- model pour le types des License --}}
     <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Type de License</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {!! Form::open(['method' => 'POST', 'route' => 'TypeFournisseur.store', 'class' => 'form-horizontal']) !!}
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
 </div> --}}
 {{-- model pour le utilisateur du license --}}
     {{-- <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">utilisateur du license</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {!! Form::open(['method' => 'POST', 'route' => 'TypeFournisseur.store', 'class' => 'form-horizontal']) !!}
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
 </div> --}}
 @endsection
