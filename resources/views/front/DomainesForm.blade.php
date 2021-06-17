@extends('layouts.app')
@section('content')
    <div class="container align-content-center border-0">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Domaines.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Domaines.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div id="card" class="card border-0">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Domaines
            </div>
            <div class="card-body">
                <form action="{{ route('Domaines.store') }}" method="POST">
                    @csrf
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="Nom">Nom</label>
                            </td>
                            <td>
                                <input type="text" name="name" id="Nom" class="form-control" required placeholder="">
                            </td>
                            <td>
                                <label for="others">Auters</label>
                            </td>
                            <td>
                                <input type="text" name="others" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_creation">Date de creation</label>
                            </td>
                            <td>
                                <input type="date" name="date_creation" id="date_creation" class="form-control" required placeholder="">
                            </td>
                            <td>
                                <label for="domaintypes_id">Type</label>
                            </td>
                            <td>
                                <select name="domaintypes_id" id="domaintypes_id" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Types as $Type)
                                    <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"data-toggle="modal"
                                data-target="#TypeDomaines"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_expiration">
                                    Date d'expiration
                                </label>
                            </td>
                            <td>
                                <input type="date" name="date_expiration" id="date_expiration"  class="form-control">
                            </td>
                            <td>
                                <label for="tech">
                                    Technicien responsable
                                </label>
                            </td>
                            <td>
                                <input type="text" id="tech" name="tech" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="comment">Commentaires</label>
                            </td>
                            <td>
                                <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
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
    <div>
        {{-- model pour le types des Domaines --}}
        <div class="modal fade my-5 py-5" id="TypeDomaines" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Type Domaines</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'DomainesType.store', 'class' => 'form-horizontal']) !!}
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
