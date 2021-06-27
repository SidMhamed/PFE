@extends('layouts.app')
@section('content')
    <div class="container align-content-center alert border-0" role="alert">
        <h4 class="alert-heading alert text-white home my-2">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Document.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Document.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div class="card">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Document
            </div>
            <div class="card-body">
               <form action="{{ route('Document.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td>
                                {!! Form::label('name', 'Nom') !!}
                            </td>
                            <td>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <input type="text" hidden name="users_id" value="{{ Auth::user()->id }}">
                            <td>
                            <label for="documenttypes_id">Types</label>
                            </td>
                            <td>
                                <select name="documenttypes_id" id="documenttypes_id" class="py-1 px-3">
                                    <option value="" selected>-----</option>
                                    @foreach ($documenttypes as $documenttype)
                                        <option value="{{ $documenttype->id }}">{{ $documenttype->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('Comment', 'Commentaires') !!}
                            </td>
                            <td>
                                {!! Form::textarea('Comment', '', ['rows' => '4', 'col' => '40', 'class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                            <td>
                                <label>Fichier (200 Mio maximum)</label>
                            </td>
                            <td>
                                <div class="fileupload draghoverable">
                                    <b>
                                    Fichier(s) (200 Mio maximum)&nbsp;
                                    <a href="#" onclick="$('#documenttypelist').dialog('open'); return false;" class="fa fa-info pointer" title="Aide">
                                        <span class="sr-only">Aide&gt;</span>
                                            </a>
                                    </b>
                                    <div id="fileupload_info" class="fileupload_info">
                                    </div>
                                    <div id="dropdoc1283380328">
                                        <span class="b">Glissez et déposez votre fichier ici, ou</span>
                                        <br>
                                        <input id="fileupload1283380328" type="file" name="filename"
                                            data-form-data="{&quot;name&quot;: &quot;filename&quot;, &quot;showfilesize&quot;: &quot;1&quot;}">
                                        <div id="progress1283380328" style="display:none">
                                            <div class="uploadbar" style="width: 0%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection
