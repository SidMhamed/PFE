@extends('layouts.app')
@section('content')
    <main id="page">
        <h4 class="alert-heading alert text-white home">
            <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
            <a class="text-white aa" href="{{ route('Fournisseur.index') }}">{{ $header }}</a>
        </h4>
        <div class="home">
            <div class="form-group col-md-12">
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
            </div>
        </div>
        <form action="#" method="post" name="massformComputer" id="massformComputer" class="home my-3">
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        {{-- <td class="left" width="50%">
                            <select name="column_name" id="column_name" class="form-control selectpicker" multiple>
                                    <option value="0">Customer ID</option>
                                      <option value="1">Customer First Name</option>
                                      <option value="2">Customer Last Name</option>
                                      <option value="3">Customer Email</option>
                                      <option value="4">Customer Gender</option>
                                </select>
                        </td> --}}
                        <td class="text-center text-white" width="100%">
                            <h5 class="floal-left">Total : <span id="total_records"></span></h5>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{ route('Fournisseur.create') }}" class="btn btn-success px-2">
                                <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="center">
                <table class="tab_cadrehov table text-center">
                    <thead>
                        <tr class="">
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">Addresse</a></th>
                            <th><a href="#">Email</a></th>
                            <th><a href="#">Phone Number</a></th>
                            <th><a href="#">Type </a></th>
                            <th><a href="#">Dernière modification</a></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyFournisseur">

                    </tbody>
                    <thead>
                        <tr class="">
                            <th><a href="#">Nom</a></th>
                            <th><a href="#">Addresse</a></th>
                            <th><a href="#">Email</a></th>
                            <th><a href="#">Phone Number</a></th>
                            <th><a href="#">Type </a></th>
                            <th><a href="#">Dernière modification</a></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
        <script>
            $(document).ready(function() {

                fetch_customer_data();

                function fetch_customer_data(query = '') {
                    $.ajax({
                        url: "{{ url('/FournisseurSearch') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#tbodyFournisseur').html(data.table_data);
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
