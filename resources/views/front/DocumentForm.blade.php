@extends('layouts.app')
@section('content')
    <div class="container align-content-center alert border-0" role="alert">
        <h4 class="alert-heading alert text-white">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Document.index') }}">{{ $header }}</a> >
            <a class="text-white aa" href="{{ route('Document.create') }}"><i class="fa fa-plus-circle"></i></a>
        </h4>
        <div class="card">
            <div class="card-header alert-heading  border-success border-5">
                Nouvel élément - Document
            </div>
            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'Document.store', 'class' => 'form-horizontal']) !!}
                <table class="tab_cadre_fixe">
                    <tbody>
                        <tr>
                            <td>
                                {!! Form::label('name', 'Nom') !!}
                            </td>
                            <td>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>
                                Rubrique
                            </td>
                            <td>
                                <select name="documentcategories_id" id="documentcategories_id" class="py-1 px-3">
                                    <option value="" selected>-----</option>
                                    @foreach ($documentCategories as $documentCategorie)
                                        <option value="{{ $documentCategorie->id }}">{{ $documentCategorie->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>
                                <label for=""> Lien web</label>
                            </td>
                            <td>
                                <input type="text" name="" id="" class="form-control">
                            </td>
                            <td rowspan="3">
                                {!! Form::label('comment', 'Commentaires') !!}

                            </td>
                            <td rowspan="3">
                                {!! Form::textarea('comment', '', ['rows' => '3', 'col' => '40', 'class' => 'form-control', 'required' => 'required']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mime">Type MIME</label>
                            </td>
                            <td>
                                <input type="text" name="mime" id="mime" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mime">Refusé pour l'import</label>
                            </td>
                            <td>
                                <select name="is_usergroup" id="Série" class="py-1 px-3">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Sélectionner un fichier installé par FTP</label>
                            </td>
                            <td>
                                <label>Aucun fichier disponible</label>
                            </td>
                            <td>
                                <label>Fichier (200 Mio maximum)</label>
                            </td>
                            <td>
                                <div class="fileupload draghoverable"><b>Fichier(s) (200 Mio maximum)&nbsp;<a href="#"
                                            onclick="$('#documenttypelist').dialog('open'); return false;"
                                            class="fa fa-info pointer" title="Aide"><span
                                                class="sr-only">Aide&gt;</span></a>
                                        {{-- <script type="text/javascript">
                                    $(function() {
                                    $('#documenttypelist').dialog({
                                        modal: true,
                                        autoOpen: false,
                                        height: 500,
                                        width: 1050,
                                        draggable: true,
                                        resizeable: true,
                                        open: function(ev, ui){
                                        $('#Iframedocumenttypelist').attr('src','/glpi/front/documenttype.list.php?_in_modal=1').removeClass('hidden');},title: "Types de documents"});
                                    });
                                    </script> --}}
                                    </b>
                                    <div id="fileupload_info" class="fileupload_info">
                                    </div>
                                    <div id="dropdoc1283380328">
                                        <span class="b">Glissez et déposez votre fichier ici, ou</span>
                                        <br>
                                        <input id="fileupload1283380328" type="file" name="filename[]"
                                            data-url="/glpi/ajax/fileupload.php" data-form-data="{&quot;name&quot;: &quot;filename&quot;,
                                                                                &quot;showfilesize&quot;: &quot;1&quot;}">
                                        <div id="progress1283380328" style="display:none">
                                            <div class="uploadbar" style="width: 0%;">
                                            </div>
                                        </div>
                                        {{-- </div>
    <script type="text/javascript">
                            //<![CDATA[


                                    $(function() {
                                    var fileindex1283380328 = 0;
                                    $('#fileupload1283380328').fileupload({
                                        dataType: 'json',
                                        pasteZone: false,
                                        dropZone:  $('#dropdoc1283380328'),
                                        acceptFileTypes: undefined,
                                        progressall: function(event, data) {
                                            var progress = parseInt(data.loaded / data.total * 100, 10);
                                            $('#progress1283380328')
                                                .show()
                                            .filter('.uploadbar')
                                                .css({
                                                width: progress + '%'
                                                })
                                                .text(progress + '%')
                                                .show();
                                        },
                                        done: function (event, data) {
                                            var filedata = data;
                                            // Load image tag, and display image uploaded
                                            $.ajax({
                                                type: 'POST',
                                                url: '/glpi/ajax/getFileTag.php',
                                                data: {
                                                data: data.result.filename
                                                },
                                                dataType: 'JSON',
                                                success: function(tag) {
                                                $.each(filedata.result.filename, function(index, file) {
                                                    if (file.error === undefined) {
                                                        //create a virtual editor to manage filelist, see displayUploadedFile()
                                                        var editor = {
                                                            targetElm: $('#fileupload1283380328')
                                                        };
                                                        displayUploadedFile(file, tag[index], editor, 'filename');

                                                        $('#progress1283380328 .uploadbar')
                                                            .text('Téléchargement réussi')
                                                            .css('width', '100%')
                                                            .delay(2000)
                                                            .fadeOut('slow');
                                                    } else {
                                                        $('#progress1283380328 .uploadbar')
                                                            .text(file.error)
                                                            .css('width', '100%');
                                                    }
                                                });
                                                }
                                            });
                                        }
                                    });
                                    });

                            //]]>
                            </script> --}}
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
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
