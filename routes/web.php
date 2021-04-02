<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;

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

Route::get('/',[MainController::class,'afficheAccueil'] )->name('accueil');

Route::get('procedure/{param}',[MainController::class,'afficheProc'] )->name('procedure');

Route::get('ajouter-produit',[MainController::class,'ajoutProduit'] )->name('a.produit');

Route::get('ajouter-produitencore',[MainController::class,'ajoutProduitEncore'] )->name('a.produitencore');

Route::get('liste-produit',[MainController::class,'getListe'] )->name('liste.produit');

Route::get('modif-produit/{param}',[MainController::class,'updateProduit'] )->name('modife.produit');


Route::get('supp-commande/{id}',[MainController::class,'supprimercommande'] )->name('supprimercommande');

Route::get('ajout-commande/{id}',[MainController::class,'ajouterCommande'] )->name('ajoutercommande');

Route::middleware(['auth', 'isAdmin'])->prefix("admin")->group(function(){
    
    Route::get('ajout-produit',[MainController::class,'ajouterProduit'] )->name('a.produit');
    Route::get('supp-produit/{id}',[MainController::class,'supProduit'] )->name('supp.produit');
    Route::get('edit-produit/{id}',[MainController::class,'editProduit'] )->name('produit.modifier');

});


Route::post('enr-produit',[MainController::class,'enregistrerProduit'] )->name('produit.enregistrer');


Route::put ('updat-produit/{id}',[MainController::class,'updatProduit'] )->name('produit.updat');


//ressources

//Route::get('edit-produit/{produit}',[ProduitController::class,'edit'] )->name('produit.modifier');

Route::resource('produits', ProduitController::class);

Route::get('export-excel', [MainController::class,'excelExport'])->name('excel.export');





// Authentification

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


///collection

Route::get('test-collections', [ProduitController::class,'index']);

