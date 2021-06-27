@extends('layouts.app')
@section('content')
    <main id="page">
        <h4 class="alert-heading alert text-white home">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Document.index') }}">{{ $header }}</a>
        </h4>
        <div class="home">
            <div class="form-group col-md-12">
                <input type="text" id="search" class="form-control" placeholder="Rechercher des données">
            </div>
        </div>
        <form action="#" method="post" name="massformComputer" id="massformComputer" class="home my-3">
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="text-white">
                        <td class="" width="100%">
                            <h5 class="text-white float-left">Total : <span id="total_records"></span></h5>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{ route('Document.create') }}" class="btn btn-success px-2">
                                <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="center">
                <table class="tab_cadrehov table text-center" border="0">
                    <thead>
                        <tr class="bg-white">
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">Fichier</a></th>
                            <th><a href="#">Type </a></th>
                            <th><a href="#">Commentaires</a></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDocument">

                    </tbody>
                    <header>
                        <tr class="bg-white">
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">Fichier</a></th>
                            <th><a href="#">Type</a></th>
                            <th><a href="#">Commentaires</a></th>
                        </tr>
                    </header>
                </table>
            </div>
        </form>
        <script>
            $(document).ready(function() {

                fetch_customer_data();

                function fetch_customer_data(query = '') {
                    $.ajax({
                        url: "{{ url('/DocumentSearch') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#tbodyDocument').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }

                $(document).on('keyup', '#search', function() {
                    var query = $(this).val();
                    fetch_customer_data(query);
                });
            });

        </script>
    </main>
@endsection
