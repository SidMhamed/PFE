@extends('layouts.app')
@section('content')
    <div class="container align-content-center alert border-0" role="alert">
        <h4 class="alert-heading alert text-white-2 home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('profile.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('profile.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div class="card">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Profil
            </div>
            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'profile.store', 'class' => 'form-horizontal']) !!}
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td>
                                {!! Form::label('name', 'Nom') !!}
                            </td>
                            <td>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                            <td rowspan="4">
                                {!! Form::label('comment', 'Commentaires') !!}

                            </td>
                            <td rowspan="4">
                                {!! Form::textarea('comment', '', ['rows' => '5', 'col' => '40', 'class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td><label for="is_default">Profil par défaut</label></td>
                            <td>
                                <select name="is_default" id="is_default" class="py-1 px-3">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="interface">interface du profil</label></td>
                            <td>
                                <select name="interface" id="interface" class="py-1 px-3">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Modification du mot de passe</label>
                            </td>
                            <td>
                                <select name="change_status" id="change_status" class="py-1 px-3">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                                    Ajouter
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
