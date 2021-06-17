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
                <h3 class="text-center">{{ $Fournisseur->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Fournisseur.update', $Fournisseur->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                        <table class="tab_cadre_fixe">
                            <tr class="">
                                <td>
                                    <label for="name">
                                        Nom
                                    </label>
                                </td>
                                <td>
                                    <input name="name" type="text" value="{{ $Fournisseur->name ?? '' }}" id="name" class="form-control">
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
                                    <label for="phonenumber">
                                        Téléphone
                                    </label>
                                </td>
                                <td>
                                    <input name="phonenumber" value="{{ $Fournisseur->phonenumber ?? '' }}" id="phonenumber" type="textfield" class="form-control">
                                </td>
                                <td rowspan="8">
                                    <label for="comment">
                                        Commentaires
                                    </label>
                                </td>
                                <td rowspan="8" class="">
                                    <textarea name="comment" id="comment" value="{{ $Fournisseur->comment ?? '' }}" cols="45" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="fax">
                                        Fax
                                    </label>
                                </td>
                                <td><input name="fax" value="{{ $Fournisseur->fax ?? '' }}" id="fax" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="website">
                                        Site Web
                                    </label>
                                </td>
                                <td>
                                    <input name="website" value="{{ $Fournisseur->website ?? '' }}" id="website" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">
                                        Email
                                    </label>
                                </td>
                                <td>
                                    <input name="email" value="{{ $Fournisseur->email ?? '' }}" id="email" type="email" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="country">
                                        Courriel
                                    </label>
                                </td>
                                <td>
                                    <input name="country" value="{{ $Fournisseur->country ?? '' }}"  id="country" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <label for="adress">
                                        Adresse
                                    </label>
                                </td>
                                <td class="">
                                    <input name="adress" value="{{ $Fournisseur->adress ?? '' }}" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="postcode">
                                        Code postal
                                    </label>
                                </td>
                                <td>
                                    <input name="postcode" value="{{ $Fournisseur->postcode ?? '' }}" id="postcode" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="country">
                                        Ville
                                    </label>
                                </td>
                                <td>
                                    <input name="country" value="{{ $Fournisseur->country ?? '' }}" id="country" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <label for="state">
                                        Pays
                                    </label>
                                </td>
                                <td>
                                    <input name="state" id="state" type="text" value="{{ $Fournisseur->state ?? '' }}" class="form-control">
                                </td>
                                <td>
                                    <label for="is_active">
                                        Active
                                    </label>
                                </td>
                                <td>
                                    <select name="is_active" id="is_active" class="py-1 px-3">
                                        <option value="">oui</option>
                                        <option value="">nom</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <button type="submit" class="btn btn-success"> <i class='fas fa-save mx-1'></i>
                                        Sauvegarder</button>
                                </td>
                            </tr>
                        </table>
                </form>
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <form method="POST" action="{{ route('Fournisseur.destroy', $Fournisseur->id) }}">
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

@endsection