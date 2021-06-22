@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Fournisseur.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Fournisseur.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Fournisseur
            </div>
            <div class="card-body">
                <form action="{{ route('Fournisseur.store') }}" method="POST">
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
                                    <label for="suppliertypes_id">
                                        Type de tiers
                                    </label>
                                </td>
                                <td>
                                    <select name="suppliertypes_id" id="suppliertypes_id" class="py-1 px-3">
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
                                    <label for="fax">
                                        Fax
                                    </label>
                                </td>
                                <td><input name="fax" id="fax" type="text" class="form-control"></td>
                                <td>
                                    <label for="is_active">
                                        Active
                                    </label>
                                </td>
                                <td>
                                    <select name="is_active" id="is_active" class="py-1 px-3">
                                        <option value="1">oui</option>
                                        <option value="0">non</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="website">
                                        Site Web
                                    </label>
                                </td>
                                <td>
                                    <input name="website" id="website" type="text" class="form-control">
                                </td>
                                <td>
                                    <label for="email">
                                        Email
                                    </label>
                                </td>
                                <td>
                                    <input name="email" id="email" type="email" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="country">
                                        Courriel
                                    </label>
                                </td>
                                <td>
                                    <input name="country" id="country" type="text" class="form-control">
                                </td>
                                <td class="">
                                    <label for="address">
                                        Adresse
                                    </label>
                                </td>
                                <td class="">
                                    <input name="address" id="address" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="postcode">
                                        Code postal
                                    </label>
                                </td>
                                <td>
                                    <input name="postcode" id="postcode" type="text" class="form-control">
                                </td>
                                <td>
                                    <label for="country">
                                        Ville
                                    </label>
                                </td>
                                <td>
                                    <input name="country" id="country" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="phonenumber">
                                        Téléphone
                                    </label>
                                </td>
                                <td>
                                    <input name="phonenumber" id="phonenumber" type="textfield" class="form-control">
                                </td>
                                <td rowspan="2">
                                    <label for="comment">
                                        Commentaires
                                    </label>
                                </td>
                                <td rowspan="2" class="">
                                    <textarea name="comment" id="comment" cols="50" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="state">
                                        Pays
                                    </label>
                                </td>
                                <td>
                                    <input name="state" id="state" type="text" class="form-control">
                                </td>
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
        {{-- model pour le types des Ordinateurs --}}
     <div class="modal fade my-5 py-5" id="TypeFournisseur" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Type de Fournisseur</h5>
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
 </div>
    </div>

@endsection
