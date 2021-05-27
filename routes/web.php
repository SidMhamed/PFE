<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeleController;
use App\Http\Controllers\Materiel_ReseauController;
use App\Http\Controllers\MoniteurController;
use App\Http\Controllers\PeripheriqueController;
use App\Http\Controllers\ImprimanteController;
use App\Http\Controllers\ComputerTypeCotroller;
use App\Http\Controllers\ComputerFabricantController;
use App\Http\Controllers\ComputerModelController;
use App\Http\Controllers\ReseauController;
use App\Http\Controllers\SourceMiseAjourController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MaterielReseauTypes;
use App\Http\Controllers\MaterielReseauModele;
use App\Http\Controllers\ImprimanteTypesController;
use App\Http\Controllers\ImprimanteModeleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/computer',[ComputerController::class ,'index'])->name('front.computer');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/Ordinateus', [ComputerController::class, 'index'])->name('showComputer');
Route::get('/Materiel_Reseau',[Materiel_ReseauController::class, 'index'])->name('Materiel_Reseau');
Route::get('/showTelephone', [TeleController::class, 'showTelephone'])->name('Telephone');
Route::get('/Imprimante',[ImprimanteController::class, 'index'])->name('Imprimante');
Route::get('/Moniteur',[MoniteurController::class, 'index'])->name('Moniteur');
Route::get('/Peripherique',[PeripheriqueController::class, 'index'])->name('Peripherique');
Route::post('/Ajoutercomputer', [ComputerController::class, 'store'])->name('addComputer');
Route::get('/computer.form', [ComputerController::class, 'form'])->name('Computer.form');
Route::post('/AjouterTypeOrdinatuer', [ComputerTypeCotroller::class, 'store'])->name('Computer.type');
Route::post('/AjouterFabricant', [ComputerFabricantController::class, 'store'])->name('Computer.Fabricant');
Route::post('/AjouterModels', [ComputerModelController::class, 'store'])->name('Computer.Models');
Route::post('/AjouterReseau', [ReseauController::class, 'store'])->name('Ajouter.Reseau');
Route::post('/AjouterSourceDeMiseAjour', [SourceMiseAjourController::class, 'store'])->name('Ajouter.SourceMiseAJour');
Route::get('/Groupes', [GroupController::class, 'index'])->name('Groupes');
Route::get('/FormGroupes', [GroupController::class, 'form'])->name('Groupes.form');
Route::post('/AddGoupes', [GroupController::class, 'store'])->name('AddGroups');
Route::get('/AjouterMaterielReseau', [Materiel_ReseauController::class, 'create'])->name('FormMaterielReseau');
Route::post('/AjouteModelsMaterielReseau', [MaterielReseauModele::class, 'store'])->name('AjouterModelsMateriel-Reseau');
Route::post('/AjouteTypesMaterielReseau', [MaterielReseauTypes::class, 'store'])->name('AjouterTypesMateriel-Reseau');
Route::post('/AjouterMaterielReseau', [Materiel_ReseauController::class, 'store'])->name('AjouterMateriel-Reseau');
Route::get('/FormAjouterImprimante', [ImprimanteController::class, 'create'])->name('FormImprimante');
Route::post('/AjouterTypeImprimante', [ImprimanteTypesController::class, 'store'])->name('Imprimante.Types');
Route::post('/AjouterModelImprimante', [ImprimanteModeleController::class, 'store'])->name('Imprimante.Model');
Route::post('/AjouterImprimante', [ImprimanteController::class, 'store'])->name('Imprimante.Ajouter');
