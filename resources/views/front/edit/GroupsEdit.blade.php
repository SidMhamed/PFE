@extends('layouts.app')
@section('content')
    <div class="container align-content-center alert border-0" role="alert">
        <h4 class="alert-heading alert text-white">Groupes</h4>
        <div class="card">
            <div class="card-header alert-heading  border-success border-5 text-center">
                <h3> {{ $Groups->name }} </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Groups.update', $Groups->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <table class="tab_cadre_fixe ">
                        <tbody>
                            <tr>
                                <td>
                                    {!! Form::label('name', 'Nom') !!}
                                </td>
                                <td>
                                    {!! Form::text('name', $Groups->name, ['class' => 'form-control', 'required' => 'required']) !!}
                                </td>
                                <td rowspan="4">
                                    {!! Form::label('comment', 'Commentaires') !!}

                                </td>
                                <td rowspan="4">
                                    {!! Form::textarea('comment', $Groups->comment, ['rows' => '5', 'col' => '40', 'class' => 'form-control', 'required' => 'required']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="subheader" colspan="2">Peut contenir</td>
                            </tr>
                            <tr>
                                <td>
                                    Éléments
                                </td>
                                <td>
                                    <select name="is_itemgroup" id="Série" class="py-1 px-3">
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Utilisateurs
                                </td>
                                <td>
                                    <select name="is_usergroup" id="Série" class="py-1 px-3">
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="alert alert-dark">
                                <th colspan="2">
                                    Créé le {{ $Groups->created_at }}
                                </th>
                                <th colspan="2">
                                    Dernière mise à jour le{{ $Groups->updated_at }}
                                </th>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <button type="submit" class="btn btn-success"> <i class='fas fa-save mx-1'></i>
                                        Sauvegarder</button>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td>
                                <form method="POST" action="{{ route('Groups.destroy', $Groups->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Veuillez confirmer la suppression ?')"
                                        class="btn btn-danger float-right" title="Supprimer">
                                        <i class="fa fa-trash mx-1"></i>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
