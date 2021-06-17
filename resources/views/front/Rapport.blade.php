@extends('layouts.app')
@section('content')
<main id="page">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <h4 class="alert-heading alert text-white home">
                <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
                <a class="text-white aa" href="{{ route('CarteSIM.index') }}">{{ $header }}</a>
            </h4>
         <table class="tab_cadrehov table text-center home">
             <thead>
                 <tr class="bg-success">
                    <td>Nom</td>
                    <td>Total</td>
                    <td>Export</td>
                 </tr>
             </thead>
             <tbody>
                <tr>
                    <td>Ordinateurs</td>
                    <td>{{ App\Models\glpi_computers::count() }}</td>
                    <td><i class="far fa-save"></i></td>
                </tr>
                <tr>
                    <td>Moniteurs</td>
                    <td>{{ App\Models\glpi_Materiel_reseaux::count() }}</td>
                    <td><i class="far fa-save"></i></td>
                </tr>
                <tr>
                    <td>Materiel Reseau</td>
                    <td>{{ App\Models\glpi_Moniteur::count() }}</td>
                    <td><i class="far fa-save"></i></td>
                </tr>
                <tr>
                    <td>Imprimantes</td>
                    <td>{{ App\Models\glpi_Imprimante::count() }}</td>
                    <td><i class="far fa-save"></i></td>
                </tr>
                <tr>
                    <td>Téléphones</td>
                    <td>{{ App\Models\glpi_Telephone::count() }}</td>
                    <td><i class="far fa-save"></i></td>
                </tr>
             </tbody>
         </table>
        </div>
    </div>
</main>
@endsection
