<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatistiqueController2 extends Controller
{
    public function statistiquePrixTotalEntreeParMois()
    {
        $anneeEnCours = Carbon::now()->format('Y');
        $statistiques = [];

        for ($mois = 1; $mois <= 12; $mois++) {
            $dateDebutMois = Carbon::createFromDate($anneeEnCours, $mois, 1);
            $dateFinMois = $dateDebutMois->copy()->endOfMonth();

            $entrees = Entree::whereBetween('date_entree', [$dateDebutMois, $dateFinMois])->get();

            $sommePrixTotalEntree = $entrees->sum(function ($entree) {
                return $entree->quantite_entree * $entree->prix_unitaire_entree;
            });

            $statistiques[] = $sommePrixTotalEntree;
        }

        return response()->json($statistiques);
    }

    public function statistiquePrixTotalEntreeParJour()
    {
        $dateDebutSemaine = Carbon::now()->startOfWeek();
        $dateFinSemaine = Carbon::now()->endOfWeek();
        $statistiques = [];

        for ($jour = 0; $jour < 7; $jour++) {
            $dateJour = $dateDebutSemaine->copy()->addDays($jour);

            $entrees = Entree::whereDate('date_entree', $dateJour)->get();

            $sommePrixTotalEntree = $entrees->sum(function ($entree) {
                return $entree->quantite_entree * $entree->prix_unitaire_entree;
            });

            $statistiques[] = $sommePrixTotalEntree;
        }

        return response()->json($statistiques);
    }

    public function statistiquePrixTotalSortieParMois()
    {
        $anneeEnCours = Carbon::now()->format('Y');
        $statistiques = [];

        for ($mois = 1; $mois <= 12; $mois++) {
            $dateDebutMois = Carbon::createFromDate($anneeEnCours, $mois, 1);
            $dateFinMois = $dateDebutMois->copy()->endOfMonth();

            $sorties = Sortie::whereBetween('date_sortie', [$dateDebutMois, $dateFinMois])->get();

            $sommePrixTotalSortie = $sorties->sum(function ($sortie) {
                return $sortie->quantite_sortie * $sortie->prix_unitaire_sortie;
            });

            $statistiques[] = $sommePrixTotalSortie;
        }

        return response()->json($statistiques);
    }

    public function statistiquePrixTotalSortieParJour()
    {
        $dateDebutSemaine = Carbon::now()->startOfWeek();
        $dateFinSemaine = Carbon::now()->endOfWeek();
        $statistiques = [];

        for ($jour = 0; $jour < 7; $jour++) {
            $dateJour = $dateDebutSemaine->copy()->addDays($jour);

            $sorties = Sortie::whereDate('date_sortie', $dateJour)->get();

            $sommePrixTotalSortie = $sorties->sum(function ($sortie) {
                return $sortie->quantite_sortie * $sortie->prix_unitaire_sortie;
            });

            $statistiques[] = $sommePrixTotalSortie;
        }

        return response()->json($statistiques);
    }
}
