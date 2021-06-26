<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeleController;
use App\Http\Controllers\Materiel_ReseauController;
use App\Http\Controllers\MoniteurController;
use App\Http\Controllers\TypeMoniteurController;
use App\Http\Controllers\ModelsMoniteurController;
use App\Http\Controllers\PeripheriqueController;
use App\Http\Controllers\ModelPeripheriqueController;
use App\Http\Controllers\TypePeripheriqueController;
use App\Http\Controllers\ImprimanteController;
use App\Http\Controllers\ComputerTypeCotroller;
use App\Http\Controllers\ComputerFabricantController;
use App\Http\Controllers\ComputerModelController;
use App\Http\Controllers\ReseauController;
use App\Http\Controllers\SourceMiseAjourController;
use App\Http\Controllers\MaterielReseauTypes;
use App\Http\Controllers\MaterielReseauModele;
use App\Http\Controllers\ImprimanteTypesController;
use App\Http\Controllers\ImprimanteModeleController;
use App\Http\Controllers\TypesTelephoneController;
use App\Http\Controllers\ModelesTelephoneController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\LogicielCategoriesController;
use App\Http\Controllers\CarteSIMController;
use App\Http\Controller\TypeCarteSIMController;
use App\Http\Controllers\ComposantCarteSIMController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DomainesController;
use App\Http\Controllers\SuppliertypesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CotactsController;
use App\Http\Controllers\GlpiLineController;
use App\Http\Controllers\MaterielBureauController;
use App\Http\Controllers\GlpiLicenseController;

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
Route::get('/showTelephone', [TeleController::class, 'index'])->name('Telephone');
Route::get('/FormAjouterTelephone', [TeleController::class, 'create'])->name('FormTelephone');
Route::post('/AjouterTelephone', [TeleController::class, 'store'])->name('AjouterTelephone');
Route::post('/AjouterTypeTelephone', [TypesTelephoneController::class, 'store'])->name('AjouterTypeTelephone');
Route::post('/AjouterModeleTelephone', [ModelesTelephoneController::class, 'store'])->name('AjouterModelsTelephone');
Route::get('/Imprimante',[ImprimanteController::class, 'index'])->name('Imprimante');
Route::get('/FormAjouterMoniteur', [MoniteurController::class, 'create'])->name('FormAjouterMoniteur');
Route::post('/AjouterMoniteur', [MoniteurController::class, 'store'])->name('AjouterMoniteur');
Route::post('/AjouterTypeMoniteur', [TypeMoniteurController::class, 'store'])->name('AjouterTypeMoniteur');
Route::post('/AjouterModelsMoniteur',[ModelsMoniteurController::class, 'store'])->name('AjouteModelsMoniteur');
Route::post('/Ajoutercomputer', [ComputerController::class, 'store'])->name('addComputer');
Route::get('/computer.form', [ComputerController::class, 'create'])->name('Computer.form');
Route::post('/AjouterTypeOrdinatuer', [ComputerTypeCotroller::class, 'store'])->name('Computer.type');
Route::post('/AjouterFabricant', [ComputerFabricantController::class, 'store'])->name('Computer.Fabricant');
Route::post('/AjouterModels', [ComputerModelController::class, 'store'])->name('Computer.Models');
Route::post('/AjouterReseau', [ReseauController::class, 'store'])->name('Ajouter.Reseau');
Route::post('/AjouterSourceDeMiseAjour', [SourceMiseAjourController::class, 'store'])->name('Ajouter.SourceMiseAJour');
Route::get('/AjouterMaterielReseau', [Materiel_ReseauController::class, 'create'])->name('FormMaterielReseau');
Route::post('/AjouteModelsMaterielReseau', [MaterielReseauModele::class, 'store'])->name('AjouterModelsMateriel-Reseau');
Route::post('/AjouteTypesMaterielReseau', [MaterielReseauTypes::class, 'store'])->name('AjouterTypesMateriel-Reseau');
Route::post('/AjouterMaterielReseau', [Materiel_ReseauController::class, 'store'])->name('AjouterMateriel-Reseau');
Route::get('/FormAjouterImprimante', [ImprimanteController::class, 'create'])->name('FormImprimante');
Route::post('/AjouterTypeImprimante', [ImprimanteTypesController::class, 'store'])->name('Imprimante.Types');
Route::post('/AjouterModelImprimante', [ImprimanteModeleController::class, 'store'])->name('Imprimante.Model');
Route::post('/AjouterImprimante', [ImprimanteController::class, 'store'])->name('Imprimante.Ajouter');
Route::get('/Peripherique',[PeripheriqueController::class, 'index'])->name('Peripherique');
Route::get('/FormAjouterPeripherique', [PeripheriqueController::class, 'create'])->name('FormAjouterPeripherique');
Route::post('/AjouterPeripherique', [PeripheriqueController::class, 'store'])->name('AjouterPeripherique');
Route::post('/AjouterTypePeripherique', [TypePeripheriqueController::class, 'store'])->name('AjouterTypePeripherique');
Route::post('/AjouterModelsPeripherique', [ModelPeripheriqueController::class, 'store'])->name('AjouterModelsPeripherique');
Route::get('/Logiciels', [LogicielController::class, 'index'])->name('Logiciels');
Route::get('/FormAjouterLogiciels', [LogicielController::class, 'create'])->name('FormAjouterLogiciels');
Route::post('/AjouterLogiciels', [LogicielController::class, 'store'])->name('AjouterLogiciels');
Route::post('/AjouterTypeLogiciels', [LogicielCategoriesController::class, 'store'])->name('AjouterTypeLogiciels');


Route::get('/CarteSIM', [CarteSIMController::class, 'index'])->name('CarteSIM');
Route::get('/FormAjouterCarteSIM', [CarteSIMController::class, 'create'])->name('FormAjouterCarteSIM');
Route::post('/AjouterComposantCarteSIM', [ComposantCarteSIMController::class, 'store'])->name('AjouterComposantCarteSIM');
Route::post('/AjouterTypeCarteSIM', [TypeCarteSIMController::class, 'store'])->name('AjouterTypeCarteSIM');
Route::post('/AjouterCarteSIM', [CarteSIMController::class, 'store'])->name('AjouterCarteSIM');


/**
 *
 * Resource
 */
Route::resource('/Computer','ComputerController');
Route::resource('/Moniteur','MoniteurController');
Route::resource('/Imprimante','ImprimanteController');
Route::resource('/Telephone', 'TeleController');
Route::resource('/MaterielReseau','Materiel_ReseauController');
Route::resource('/Peripherique','PeripheriqueController');
Route::resource('/Logiciel','LogicielController');
Route::resource('/CarteSIM','CarteSIMController');
Route::resource('/Reseau','ReseauController');
Route::resource('/users', 'UserController');
Route::resource('/profile', 'ProfileController');
Route::resource('/Document', 'DocumentController');
Route::resource('Fournisseur', 'SuppliersController');
Route::resource('/TypeFournisseur', 'SuppliertypesController');
Route::resource('/Domaines', 'DomainesController');
Route::resource('/DomainesType' ,'DomainesTypeController');
Route::resource('/Contacts', 'CotactsController');
Route::resource('/Lines', 'GlpiLineController');
Route::resource('/MaterielBureau','MaterielBureauController');
Route::resource('/License', 'GlpiLicenseController');
/**
 * Search
 */
Route::get('/ComputerSearch', [ComputerController::class, 'action']);
Route::get('/MaterielReseauSearch', [Materiel_ReseauController::class, 'search']);
Route::get('/ImprimanteSearch', [ImprimanteController::class, 'search']);
Route::get('/TelephoneSearch', [TeleController::class, 'search']);
Route::get('/PeripheriqueSearch',[PeripheriqueController::class, 'search']);
Route::get('/MoniteurSearch',[MoniteurController::class, 'search']);
Route::get('/LogicielsSearch', [LogicielController::class, 'search']);
Route::get('/CarteSIMSearch', [CarteSIMController::class, 'search']);
Route::get('/FournisseurSearch', [SuppliersController::class, 'search']);
Route::get('/DomaineSearch', [DomainesController::class,'search']);
Route::get('/ContactsSearch', [CotactsController::class,'search']);
Route::get('/LinesSearch', [GlpiLineController::class,'search']);
Route::get('/UsersSearch', [UserController::class, 'search']);
// Route::post('/searchUser', [UserController::class, 'index'])->name('SearchUser.index');
Route::get('/ProfilesSearch', [ProfileController::class, 'search']);
Route::get('/MaterielBureauSearch', [MaterielBureauController::class, 'search']);
Route::get('/LicensesSearch', [GlpiLicenseController::class, 'search']);


Route::get('/Rapport', function () {
return view('front.Rapport')->with([
'title' => 'GLPI-Rapports',
'header' => 'Rapports'
]);
});

/**
 *
 * Generat pdf
 */
Route::get('/Computer_Export_to_pdf','ComputerController@pdf')->name('Computer.pdf');
Route::get('/Moniteur_Export_to_pdf', 'MoniteurController@pdf')->name('Moniteur.pdf');
Route::get('/Materiel_Reseau_Export_to_pdf', 'Materiel_ReseauController@pdf')->name('MaterielReseau.pdf');
Route::get('/Materiel_Bureau_Export_to_pdf', 'MaterielBureauController@pdf')->name('MaterielBureau.pdf');
Route::get('/Imprimante_Export_to_pdf', 'ImprimanteController@pdf')->name('Imprimante.pdf');
Route::get('/Telephone_Export_to_pdf', 'TeleController@pdf')->name('Telephone.pdf');
Route::get('/Carte_Export_to_pdf', 'CarteSIMController@pdf')->name('CarteSIM.pdf');
Route::get('/Peripherique_Export_to_pdf', 'PeripheriqueController@pdf')->name('Peripherique.pdf');
Route::get('/Logiciel_Export_to_pdf', 'LogicielController@pdf')->name('Logiciel.pdf');
Route::get('/License_Export_to_pdf', 'GlpiLicenseController@pdf')->name('License.pdf');
Route::get('/Fournisseur_Export_to_pdf', 'SuppliersController@pdf')->name('Fournisseur.pdf');
Route::get('/Contacts_Export_to_pdf', 'CotactsController@pdf')->name('Contacts.pdf');
Route::get('Lignes_Export_to_pdf', 'GlpiLineController@pdf')->name('Lignes.pdf');
Route::get('/Domaines_Export_to_pdf', 'DomainesController@pdf')->name('Domaines.pdf');
