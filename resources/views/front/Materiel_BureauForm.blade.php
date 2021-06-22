@extends('layouts.app')
@section('content')
<div class="container align-content-center border-0" role="alert">
    <h4 class="alert-heading alert text-white home my-2">
        <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
        <a class="text-white aa" href="{{ route('MaterielBureau.index') }}">{{ $header }}</a> >
        <a class="text-white aa" href="{{ route('MaterielBureau.create') }}"><i class="fa fa-plus-circle"></i></a>
    </h4>
    <div class="card border-0">
        <div class="card-header alert-heading border-success border-5">
            Nouvel élément - Mateiel Bureau
        </div>
            <div class="card-body">
                <form action="{{ route('MaterielBureau.store') }}" method="POST">
                    @csrf
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="name">Nom</label>
                            </td>
                            <td>
                                <input type="text" id="name" class="form-control" name="name" required>
                            </td>
                            <td>
                                <label for="fabricant_id">Fabricants</label>
                            </td>
                            <td>
                                <select name="fabricant_id" id="fabricant_id" class="py-1 px-2">
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
                                <label for="location_id">Lieu</label>
                            </td>
                            <td>
                                <select name="location_id" id="location_id" class="py-1 px-2">
                                    <option hidden value="" selected disabled>-----</option>
                                    @foreach ($Locations as $Location)
                                        <option value="{{ $Location->id }}">{{ $Location->Nom }}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>
                            </td>
                            <td rowspan="4">
                                <label for="comment">Comment</label>
                            </td>
                            <td rowspan="4">
                                <textarea name="comment" id="comment" cols="50" rows="6" class="form-control" required></textarea>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <label for="users_id">Utilisateur</label>
                            </td>
                            <td>
                                <select name="users_id" id="users_id" class="py-1 px-2">
                                    <option value="" selected disabled>-----</option>
                                    @foreach ($Users as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="matricule">Matricule</label>
                            </td>
                            <td>
                               <input name="matricule" type="text" id="matricule" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="color">Couleur</label>
                            </td>
                            <td>
                                <input name="color" type="text" id="color" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus-circle mx-1" title="Ajouter"></i>ajouter
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
