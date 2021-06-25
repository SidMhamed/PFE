@extends('layouts.app')
@section('content')
<main id="page">
    <div class="container my-2">
        <div class="col-md-8 offset-md-2">
            <h4 class="alert-heading alert text-white home">
                <a class="text-white aa" href="{{ route('home') }}">Accueil</a> >
                <a class="text-white aa" href="{{ url('/Rapport') }}">{{ $header }}</a>
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
                    <td colspan="3">
                       <h6>Parc</h6>
                    </td>
                </tr>
                <tr>
                    <td>Ordinateurs</td>
                    <td>{{ App\Models\glpi_computers::count() }}</td>
                    <td><a href="{{ route('Computer.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Moniteurs</td>
                    <td>{{ App\Models\glpi_Moniteur::count() }}</td>
                    <td><a href="{{ route('Moniteur.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Matèriel Réseaux</td>
                    <td>{{ App\Models\glpi_Materiel_reseaux::count() }}</td>
                    <td><a href="{{ route('MaterielReseau.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Matèriel Bureau</td>
                    <td>{{ App\Models\glpi_MaterielBureau::count() }}</td>
                    <td><a href="{{ route('MaterielBureau.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Imprimantes</td>
                    <td>{{ App\Models\glpi_Imprimante::count() }}</td>
                    <td><a href="{{ route('Imprimante.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Téléphones</td>
                    <td>{{ App\Models\glpi_Telephone::count() }}</td>
                    <td><a href="{{ route('Telephone.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Carte SIM</td>
                    <td>{{ App\Models\ItemsCarteSIM::count() }}</td>
                    <td><a href="{{ route('CarteSIM.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Périphériques</td>
                    <td>{{ App\Models\glpi_Peripherique::count() }}</td>
                    <td><a href="{{ route('Peripherique.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Logiciels</td>
                    <td>{{ App\Models\Logiciel::count() }}</td>
                    <td><a href="{{ route('Logiciel.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td colspan="3">
                       <h6>Gestion</h6>
                    </td>
                </tr>
                <tr>
                    <td>Lice<u>n</u>ces</td>
                    <td>{{ App\Models\glpi_License::count() }}</td>
                    <td><a href="{{ route('License.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Fournisseurs</td>
                    <td>{{ App\Models\glpi_suppliers::count() }}</td>
                    <td><a href="{{ route('Fournisseur.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Contacts</td>
                    <td>{{ App\Models\glpi_contacts::count() }}</td>
                    <td><a href="{{ route('Contacts.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td><u>D</u>ocuments</td>
                    <td>{{ App\Models\Document::count() }}</td>
                    <td><a href="#"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Lignes</td>
                    <td>{{ App\Models\glpi_line::count() }}</td>
                    <td><a href="{{ route('Lignes.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
                <tr>
                    <td>Domai<u>n</u>es</td>
                    <td>{{ App\Models\Domaines::count() }}</td>
                    <td><a href="{{ route('Domaines.pdf') }}"><i class="far fa-save"></i></a></td>
                </tr>
             </tbody>
         </table>
        </div>
    </div>
</main>
@endsection
