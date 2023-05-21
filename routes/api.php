<?php

use App\Http\Controllers\StatistiqueController2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//routes statistique 1
Route::get('/statistiques/entrees/annee-en-cours', 'StatistiqueController1@nombreTotalEntreesAnneeEnCours');
Route::get('/statistiques/entrees/fluctuation', 'StatistiqueController1@pourcentageFluctuationEntrees');
Route::get('/statistiques/entrees/difference-absolue', 'StatistiqueController1@differenceAbsolueEntrees');

Route::get('/statistiques/sorties/annee-en-cours', 'StatistiqueController1@nombreTotalSortiesAnneeEnCours');
Route::get('/statistiques/sorties/fluctuation', 'StatistiqueController1@pourcentageFluctuationSorties');
Route::get('/statistiques/sorties/difference-absolue', 'StatistiqueController1@differenceAbsolueSorties');

Route::get('/statistiques/benefice/annee-en-cours', 'StatistiqueController1@beneficeTotalAnneeEnCours');
Route::get('/statistiques/benefice/fluctuation', 'StatistiqueController1@pourcentageFluctuationBenefice');
Route::get('/statistiques/benefice/difference-absolue', 'StatistiqueController1@differenceAbsolueBenefice');



//routes statistique 2
Route::get('/statistiques/prix-total-entree/mois', [StatistiqueController2::class, 'statistiquePrixTotalEntreeParMois']);
Route::get('/statistiques/prix-total-entree/jour', [StatistiqueController2::class, 'statistiquePrixTotalEntreeParJour']);
Route::get('/statistiques/prix-total-sortie/mois', [StatistiqueController2::class, 'statistiquePrixTotalSortieParMois']);
Route::get('/statistiques/prix-total-sortie/jour', [StatistiqueController2::class, 'statistiquePrixTotalSortieParJour']);


//routes statistique 3
