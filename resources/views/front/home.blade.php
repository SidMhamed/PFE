@extends('layouts.app')

@section('content')
    <div class="container border my-3 home">
        <div class="row">
            <div class="col-md-12">
                <h4 class="alert-heading alert text-white">
                    <a class="text-white aa" href="{{ route('home') }}">{{ __('Accueil') }}</a>
                </h4>
            </div>
            <div class="col-md-8 offset-md-2">
                <h3 class="alert-heading text-white mx-2">{{ __('Tableau de bord') }}</h3>
                <div class="row">
                    <a href="{{ route('showComputer') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Ordina home">
                        <span class="text-left float-auto" title="{{ $countComputer }}"
                            style="font-size:2.2em;color:#8c2121">{{ $countComputer }}</span>
                        <i class="fa-fw fas fa-laptop float-right" title="Ordinateur"
                            style="font-size:2em;color:#8c2121"></i><br>
                        <h6 class="text-left" title="Ordinatuer" style="color:#8c2121">Ordinateurs</h6>
                    </a>
                    <a href="{{ route('Materiel_Reseau') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert materiel-r home">
                        <span class="text-left float-left" title="{{ $countMaterielReseaux }}" data-precision="0"
                            style="font-size:2.2em;">{{ $countMaterielReseaux }}</span>
                        <i class="fa-fw fas fa-network-wired float-right" title="Matériel réseau"
                            style="font-size:2em;color: #379fa6"></i><br><br>
                        <h6 class="text-left" title="Matériel réseau" style="color:#379fa6">Matériel réseaux</h6>
                    </a>
                    <a href="{{ route('Imprimante.index') }}" id="circle-b"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Impri home">
                        <span class="text-left float-left" title="{{ $countImprimante }}" data-precision="0"
                            style="font-size:2.2em;color:#b0c4e1">{{ $countImprimante }}</span>
                        <i class="fa-fw fas fa-print float-right" title="Imprimante"
                            style="font-size:2em;color:#b0c4e1"></i><br><br>
                        <h6 class="text-left" title="Imprimante" style="color:#b0c4e1">Imprimantes</h6>
                    </a>
                    <a href="{{ route('Telephone.index') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Tel home">
                        <span class="text-left float-left" title="{{ $Count_Tel }}" data-precision="0"
                            style="font-size:2.2em;color:#4c7da9">{{ $Count_Tel }}</span>
                        <i class="fa-fw fas fa-phone float-right" title="Téléphone"
                            style="font-size:2em;color:#4c7da9"></i><br><br>
                        <h6 class="text-left" title="Téléphone" style="color:#4c7da9">Téléphones</h6>
                    </a>
                    <a href="{{ route('Moniteur.index') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Moniteur home">
                        <span class="text-left float-left" title="{{ $Count_Moniteur }}" data-precision="0"
                            style="font-size:2.2em;color:#efbfc0">{{ $Count_Moniteur }}</span>
                        <i class="fa-fw fas fa-desktop float-right" title="Moniteur"
                            style="font-size:2em;color:#efbfc0"></i><br><br>
                        <h6 class="text-left" title="Moniteur" style="color:#efbfc0">Moniteurs</h6>
                    </a>
                    <a href="{{ route('Peripherique.index') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert usb home">
                        <span class="text-left float-left" title="{{ $Count_peripherique }}" data-precision="0"
                            style="font-size:2.2em">{{ $Count_peripherique }}</span>
                        <i class="fa-fw fab fa-usb float-right" title="Périphériques" style="font-size:2em;"></i><br><br>
                        <h6 class="text-left" title="Périphériques">Périphériques</h6>
                    </a>
                    <a href="{{ route('Logiciels') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Logiciel home">
                        <span class="text-left float-left" title="{{ $Logiciel }}" data-precision="0"
                            style="font-size:2.2em;">{{ $Logiciel }}</span>
                        <i class="fas fa-cube float-right" title="Logiciel" style="font-size:2em;"></i><br><br>
                        <h6 class="text-left" title="Logiciel">Logiciel</h6>
                    </a>
                    <a href="{{ route('CarteSIM.index') }}"
                        class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert carte home">
                        <span class="text-left float-left" title="{{ $CarteSim }}" data-precision="0"
                            style="font-size:2.2em;">{{ $CarteSim }} </span>
                        <i class="fas fa-sim-card float-right" title="Cartes SIM" style="font-size:2em;"></i><br><br>
                        <h6 class="text-left" title="Cartes SIM">Cartes SIM</h6>
                    </a>
                    <a href="#" class="col-md-3 py-0  px-0 mx-1 text-decoration-none alert Materiel_B home">
                        <span class="text-left float-left" title="{{ $MaterielBureaux }}" data-precision="0"
                            style="font-size:2.2em;">{{ $MaterielBureaux }}</span>
                        <i class="main-icon fas fa-th float-right" title="Matériel bureaux"
                            style="font-size:2em;"></i><br><br>
                        <h6 class="text-left" title="Matériel bureaux">Matériel bureaux</h6>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
