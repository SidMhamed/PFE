<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ComputerController;
use App\Models\glpi_computers;
use App\Models\glpi_Imprimante;
use App\Models\glpi_Materiel_Reseaux;
use App\Models\glpi_Moniteur;
use App\Models\glpi_Telephone;
use App\Models\glpi_Peripherique;
use App\Models\glpi_MaterielBureau;
use App\Models\Logiciel;
use App\Models\ItemsCarteSIM;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Count_Computer = glpi_computers::count();
        $Count_MaterielReseaux = glpi_Materiel_Reseaux::count();
        $cout_Imprimante = glpi_Imprimante::count();
        $Count_Moniteur = glpi_Moniteur::count();
        $Count_Tel = glpi_Telephone::count();
        $Count_peripherique = glpi_Peripherique::count();
        $MaterielBureaux = glpi_MaterielBureau::count();
        $Logiciel = Logiciel::count();
        $CarteSim = ItemsCarteSIM::count();
        $title = 'Accueil';
        return view("front.home")->with([
            'countComputer'=> $Count_Computer,
            'countMaterielReseaux' => $Count_MaterielReseaux,
            'countImprimante' => $cout_Imprimante,
            'title' => $title,
            'Count_Moniteur' => $Count_Moniteur,
            'Count_Tel' => $Count_Tel,
            'Count_peripherique' => $Count_peripherique,
            'MaterielBureaux' => $MaterielBureaux,
            'Logiciel' => $Logiciel,
            'CarteSim' => $CarteSim
            ]);
    }
}
