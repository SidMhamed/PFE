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
               <h3 class="text-center">{{ $Domaines->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Domaines.update',$Domaines->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe">
                        <tr>
                            <td>
                                <label for="Nom">Nom</label>
                            </td>
                            <td>
                                <input type="text" value="{{ $Domaines->name ?? '' }}" name="name" id="Nom" class="form-control" required placeholder="">
                            </td>
                            <td>
                                <label for="others">Auters</label>
                            </td>
                            <td>
                                <input type="text" name="others" value="{{ $Domaines->others ?? '' }}"  class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_creation">Date de creation</label>
                            </td>
                            <td>
                                <input type="date" name="date_creation" value="{{ $Domaines->date_creation ?? '' }}" id="date_creation" class="form-control" required placeholder="">
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
                                <i class="fa fa-plus-circle mx-1" title="Ajouter" data-toggle="modal"
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
                                <input type="date" name="date_expiration" value="{{ $Domaines->date_expiration ?? '' }}" id="date_expiration" class="form-control">
                            </td>
                            <td>
                                <label for="tech">
                                    Technicien responsable
                                </label>
                            </td>
                            <td>
                                <input type="text" id="tech" name="tech" value="{{ $Domaines->tech ?? '' }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="comment">Commentaires</label>
                            </td>
                            <td>
                                <textarea name="comment" id="comment" value="{{ $Domaines->comment ?? '' }}" cols="30" rows="4"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle mx-1"
                                        title="Ajouter"></i>Sauvegarder</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <form method="POST" action="{{ route('Domaines.destroy', $Domaines->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Veuillez confirmer la suppression ?')"
                                        class="btn btn-danger" title="Supprimer">
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
    </div>
@endsection
