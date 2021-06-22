<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/alerts.css') }}">
    <script src="{{ asset('jquery-3.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <!-- Fonts -->
    <link type="text/css" href="{{ asset('fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
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
                                <input size="15" aria-labelledby="globalsearchglass" type="search"
                                    placeholder="Rechercher" aria-label="Search">
                                <button name="globalsearchglass" type="submit">
                                    <i class="fa fa-search"></i>
                                    <span class="sr-only">Rechercher</span>
                                </button>
                            </span>
                        </form>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
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
                            <a class="nav-link dropdown-toggle-split text-white text-center" href="#" id="Parc"
                                role="button" data-bs-toggle="dropdown" ria-haspopup="true" aria-expanded="false" v-pre>
                                Parc
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="Parc">
                                <li>

                                    <div class="row" style="width: 450px;">
                                        <ul class="list-unstyled col-md-6">
                                            <li>
                                                <a href="{{ route('Computer.index') }}" class="dropdown-item"
                                                    accesskey='o'>
                                                    <i class='fa-fw fas fa-laptop'></i>
                                                    <u>O</u>rdinateurs
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('Moniteur.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-desktop'></i>
                                                    Moniteurs
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('Logiciels') }}" accesskey='s'
                                                    class=" dropdown-item">
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
                                                <a href="{{ route('MaterielBureau.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-th'></i>
                                                    Matériels Bureau
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled col-md-6">
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
                                                <a href="{{ route('Telephone.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-phone'></i>
                                                    Téléphones
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('CarteSIM.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-sim-card'></i>
                                                    Cartes SIM
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-split text-white" href="#"
                                id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                ria-haspopup="true" aria-expanded="false" v-pre>
                                Gestion
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <div class="row" style="width:450px;">
                                        <ul class="list-unstyled col-md-4">
                                            <li>
                                                <a href="{{ route('License.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-key'></i>
                                                    Lice<u>n</u>ces
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('Fournisseur.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-dolly'></i>
                                                    Fournisseurs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('Contacts.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-user-tie'></i>
                                                    Contacts
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled col-md-4">
                                            <li>
                                                <a href="{{ route('Document.index') }}" class="dropdown-item">
                                                    <i class='fa-fw far fa-file'></i>
                                                    <u>D</u>ocuments
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('Lines.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-phone'></i>
                                                    Lignes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('Domaines.index') }}" class="dropdown-item">
                                                    <i class='fa-fw fas fa-globe-americas'></i>
                                                    Domai<u>n</u>es
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-split text-white" href="#"
                                id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                ria-haspopup="true" aria-expanded="false" v-pre>
                                Outils
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <ul class="list-unstyled">
                                        {{-- <li>
                                            <a href="#" class="dropdown-item">
                                                <i class='fa-fw far fa-sticky-note'></i>
                                                Notes
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ url('/Rapport') }}" accesskey='e' class="dropdown-item">
                                                <i class='fa-fw fas fa-file-medical-alt'></i>
                                                Rapports
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-split text-white" href="#"
                                id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                ria-haspopup="true" aria-expanded="false" v-pre>
                                Administration
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li class="nav-item">
                                            <a href="{{ route('users.index') }}" accesskey='u' class="dropdown-item">
                                                <i class='fa-fw fas fa-user'></i>
                                                <u>U</u>tilisateurs
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile.index') }}" class="dropdown-item">
                                                <i class='fa-fw fas fa-user-check'></i>
                                                Profils
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a href="#" class="dropdown-item">
                                                <i class='fa-fw fas fa-layer-group'></i>
                                                E<u>n</u>tités
                                            </a>
                                        </li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="py-5 my-5">
        @yield('content')
    </main>
    @include('includes.messages')
</body>

</html>
