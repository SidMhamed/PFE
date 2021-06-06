<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
   <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css.map') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/alerts.css')}}">

</head>
<body>
    <div id="header">
        <header id="header_top" class="navbar navbar-expand-md navbar-light shadow-sm">
            {{-- <div class="container"> --}}
            <div id="c_logo">
                    <a href="{{ route('home') }}" accesskey="1" title="Accueil">
                        <img src="/images/1585060262_ISCAE.jpg" class="">
                    </a>
                </div>
                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <form role="search" method="POST">
                                    <span id="champRecherche">
                                        <input size="15" aria-labelledby="globalsearchglass" type="search" placeholder="Rechercher" aria-label="Search">
                                        <button name="globalsearchglass" type="submit">
                                            <i class="fa fa-search"></i>
                                            <span class="sr-only">Rechercher</span>
                                        </button>
                                    </span>
                                </form>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{Auth::user()->name}}
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit()                                                                                          ,n;">
                                    <i class="fa fa-sign-out-alt"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                </ul>
        </header>

        <nav id="c_menu" class="nav navbar-expand-md shadow-none p-1">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center px-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-split text-white text-center" href="#" id="Assistance" role="button" data-bs-toggle="dropdown" ria-haspopup="true"  aria-expanded="false" v-pre>
                                Parc
                            </a>
                        <ul class="dropdown-menu" aria-labelledby="Assistance">
                            <li>

                                <div class="row" style="width: 500px;">
                                    <ul class="list-unstyled col-md-6">
                                        <li>
                                        <a href="{{ route('Computer.index') }}" class="dropdown-item"  accesskey='o'>
                                        <i class='fa-fw fas fa-laptop'></i>
                                        <u>O</u>rdinateurs
                                        </a></li>

                                        <li>
                                        <a href="{{ route('Moniteur.index') }}" class="dropdown-item">
                                        <i class='fa-fw fas fa-desktop'></i>
                                        Moniteurs
                                        </a>
                                        </li>

                                        <li>
                                            <a href="{{route('Logiciels')}}"  accesskey='s' class=" dropdown-item">
                                            <i class='fa-fw fas fa-cube'></i>
                                            Logiciel<u>s</u>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('Materiel_Reseau') }}" class="dropdown-item">
                                            <i class='fa-fw fas fa-network-wired'></i>
                                            Matériels réseau
                                            </a>
                                        </li>

                                       <li>
                                            <a href="{{ route('Peripherique.index') }}" class="dropdown-item">
                                            <i class='fa-fw fab fa-usb'></i>
                                            Périphériques
                                            </a>
                                       </li>
                                       <li>
                                            <a href="{{ route('Imprimante.index') }}" class="dropdown-item">
                                            <i class='fa-fw fas fa-print'></i>
                                            Imprimantes
                                            </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-fill-drip'></i>
                                        Cartouches
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-box-open'></i>
                                        Consommables
                                        </a>
                                    </li>
                                </ul>
                                <ul class="list-unstyled col-md-6">
                                    <li>
                                        <a href="{{ route('Telephone.index') }}" class="dropdown-item">
                                        <i class='fa-fw fas fa-phone'></i>
                                        Téléphones
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-server'></i>
                                        Baies
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-th'></i>
                                        Châssis
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-plug'></i>
                                        PDU
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-th-list'></i>
                                        Équipements passifs
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('CarteSIM.index')}}" class="dropdown-item">
                                        <i class='fa-fw fas fa-sim-card'></i>
                                        Cartes SIM
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-item">
                                        <i class='fa-fw fas fa-list'></i>
                                        Global
                                        </a>
                                    </li>
                                </ul>
                    </div>
                            </li>
                       </ul>
                </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle-split text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" ria-haspopup="true"  aria-expanded="false" v-pre>
                                        Assistance
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li>
                                            <div class="row" style="width: 500px;">
                                                <ul class="list-unstyled col-md-6">
                                                                <li>
                                                                    <a href="#" class="dropdown-item"  accesskey='o'>
                                                                        <i class='fa-fw fas fa-exclamation-circle'></i>
                                                                        <u>T</u>ickets
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-plus'></i>
                                                                        Créer un ticket
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#"  accesskey='s' class=" dropdown-item">
                                                                        <i class='fa-fw fas fa-exclamation-triangle'></i>
                                                                        Problèmes
                                                                    </a>
                                                                 </li>

                                                                 <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-clipboard-check'></i>
                                                                        Changements
                                                                    </a>
                                                                </li>
                                                     </ul>
                                                     <ul class="list-unstyled col-md-6">
                                                         <li>
                                                            <a href="#" class="dropdown-item">
                                                                <i class='fa-fw far fa-calendar-alt'></i>
                                                                <u>P</u>lanning
                                                            </a>
                                                          </li>
                                                          <li>
                                                            <a href="#" class="dropdown-item">
                                                                <i class='fa-fw fas fa-chart-bar'></i>
                                                                St<u>a</u>tistiques
                                                            </a>
                                                          </li>
                                                          <li>
                                                                <a href="#" class="dropdown-item">
                                                                    <i class='fa-fw fas fa-stopwatch'></i>
                                                                    Tickets récurre<u>n</u>ts
                                                                </a>
                                                            </li>

                                                     </ul>
                                        </div>
                                        </li>
                                    </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle-split text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" ria-haspopup="true"  aria-expanded="false" v-pre>
                                    Gestion
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li>
                                        <div class="row" style="width: 500px;">
                                            <ul class="list-unstyled col-md-6">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-key'></i>
                                                                        Lice<u>n</u>ces
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-calculator'></i>
                                                                        Budgets
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-dolly'></i>
                                                                        Fournisseurs
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-user-tie'></i>
                                                                        Contacts
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-file-signature'></i>
                                                                        Contrats
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw far fa-file'></i>
                                                                        <u>D</u>ocuments
                                                                    </a>
                                                                </li>
                                                 </ul>
                                                 <ul class="list-unstyled col-md-6">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-phone'></i>
                                                                        Lignes
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-certificate'></i>
                                                                        Certificats
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-warehouse'></i>
                                                                        Data centers
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-project-diagram'></i>
                                                                        Clusters
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-globe-americas'></i>
                                                                        Domai<u>n</u>es
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class='fa-fw fas fa-cubes'></i>
                                                                        Applicatifs
                                                                    </a>
                                                                </li>
                                             </ul>
                                    </div>
                                    </li>
                                </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-split text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" ria-haspopup="true"  aria-expanded="false" v-pre>
                                Outils
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <div class="row" style="width: 500px;">
                                        <ul class="list-unstyled col-md-6">
                                                    <li>
                                                        <a href="#" class="dropdown-item">
                                                            <i class='fa-fw fas fa-columns'></i>
                                                            Projets
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item">
                                                            <i class='fa-fw far fa-sticky-note'></i>
                                                            Notes
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  class="dropdown-item">
                                                        <i class='fa-fw fas fa-rss'></i>
                                                        Flux RSS
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  accesskey='b' class="dropdown-item">
                                                        <i class='fa-fw fas fa-question'></i>
                                                        <u>B</u>ase de connaissances
                                                        </a>
                                                    </li>
                                             </ul>
                                             <ul class="list-unstyled col-md-6">
                                                    <li>
                                                        <a href="#" class="dropdown-item">
                                                        <i class='fa-fw fas fa-calendar-check'></i>
                                                        Réservations
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  accesskey='e' class="dropdown-item">
                                                        <i class='fa-fw fas fa-file-medical-alt'></i>
                                                        Rapports
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item">
                                                        <i class='fa-fw far fa-bookmark'></i>
                                                        Recherches sauvegardées
                                                        </a>
                                                    </li>
                                         </ul>
                                </div>
                                </li>
                            </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle-split text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" ria-haspopup="true"  aria-expanded="false" v-pre>
                            Administration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <div class="row" style="width: 500px;">
                                    <ul class="list-unstyled col-md-4">
                                        <li>
                                            <a href="{{route('users.index')}}"  accesskey='u' class="dropdown-item">
                                               <i class='fa-fw fas fa-user'></i>
                                               <u>U</u>tilisateurs
                                            </a>
                                         </li>
                                         <li>
                                            <a href="{{route('Groupes')}}"  accesskey='g' class="dropdown-item">
                                               <i class='fa-fw fas fa-users'></i>
                                               <u>G</u>roupes
                                            </a>
                                         </li>

                                         <li>
                                            <a href="#" class="dropdown-item">
                                               <i class='fa-fw fas fa-layer-group'></i>
                                               E<u>n</u>tités
                                            </a>
                                         </li>
                                         <li>
                                            <a href="#" class="dropdown-item">
                                               <i class='fa-fw fas fa-book'></i>
                                               Règles
                                            </a>
                                         </li>
                                         </ul>
                                         <ul class="list-unstyled col-md-8">
                                             <li>
                                                <a href="#" class="dropdown-item">
                                                   <i class='fa-fw fas fa-book'></i>
                                                   Dictionnaires
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="dropdown-item">
                                                   <i class='fa-fw fas fa-user-check'></i>
                                                   Profils
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="dropdown-item">
                                                   <i class='fa-fw far fa-list-alt'></i>
                                                   File d'attente des notifications
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="dropdown-item">
                                                   <i class='fa-fw fas fa-scroll'></i>
                                                   Journaux
                                                </a>
                                             </li>
                                     </ul>
                            </div>
                            </li>
                        </ul>
                </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <div id="c_ssmenu2">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" title="Accueil">Accueil</a>
                </li>
            </ul>
        </div> --}}
    </div>
        <main class="py-5 my-5">
            @yield('content')
            @include('includes.messages')
        </main>
</body>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{asset('js/alerts.js')}}"></script>
  <script src="{{ asset('js/animation.min.js') }}"></script>
  <script src="{{ asset('js/app.js.map') }}"></script>
  <script src="{{ asset('/jquery-3.6.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</html>
