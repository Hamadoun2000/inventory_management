<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatistiqueController1 extends Controller
{
    public function nombreTotalEntreesAnneeEnCours()
    {
        $anneeEnCours = Carbon::now()->year;
        $nombreEntrees = Entree::whereYear('date_entree', $anneeEnCours)->count();

        return response()->json($nombreEntrees);
    }

    public function pourcentageFluctuationEntrees()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $nombreEntreesAnneeEnCours = Entree::whereYear('date_entree', $anneeEnCours)->count();
        $nombreEntreesAnneePrecedente = Entree::whereYear('date_entree', $anneePrecedente)->count();

        $pourcentageFluctuation = 0;
        if ($nombreEntreesAnneePrecedente != 0) {
            $pourcentageFluctuation = (($nombreEntreesAnneeEnCours - $nombreEntreesAnneePrecedente) / $nombreEntreesAnneePrecedente) * 100;
        }

        return response()->json($pourcentageFluctuation);
    }

    public function differenceAbsolueEntrees()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $nombreEntreesAnneeEnCours = Entree::whereYear('date_entree', $anneeEnCours)->count();
        $nombreEntreesAnneePrecedente = Entree::whereYear('date_entree', $anneePrecedente)->count();

        $differenceAbsolue = abs($nombreEntreesAnneeEnCours - $nombreEntreesAnneePrecedente);

        return response()->json($differenceAbsolue);
    }

    public function nombreTotalSortiesAnneeEnCours()
    {
        $anneeEnCours = Carbon::now()->year;
        $nombreSorties = Sortie::whereYear('date_sortie', $anneeEnCours)->count();

        return response()->json($nombreSorties);
    }

    public function pourcentageFluctuationSorties()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $nombreSortiesAnneeEnCours = Sortie::whereYear('date_sortie', $anneeEnCours)->count();
        $nombreSortiesAnneePrecedente = Sortie::whereYear('date_sortie', $anneePrecedente)->count();

        $pourcentageFluctuation = 0;
        if ($nombreSortiesAnneePrecedente != 0) {
            $pourcentageFluctuation = (($nombreSortiesAnneeEnCours - $nombreSortiesAnneePrecedente) / $nombreSortiesAnneePrecedente) * 100;
        }

        return response()->json($pourcentageFluctuation);
    }

    public function differenceAbsolueSorties()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $nombreSortiesAnneeEnCours = Sortie::whereYear('date_sortie', $anneeEnCours)->count();
        $nombreSortiesAnneePrecedente = Sortie::whereYear('date_sortie', $anneePrecedente)->count();

        $differenceAbsolue = abs($nombreSortiesAnneeEnCours - $nombreSortiesAnneePrecedente);

        return response()->json($differenceAbsolue);
    }

    public function beneficeTotalAnneeEnCours()
    {
        $anneeEnCours = Carbon::now()->year;

        $entrees = Entree::whereYear('date_entree', $anneeEnCours)->get();
        $sorties = Sortie::whereYear('date_sortie', $anneeEnCours)->get();

        $totalEntrees = $entrees->sum(function ($entree) {
            return $entree->quantite_entree * $entree->prix_unitaire_entree;
        });

        $totalSorties = $sorties->sum(function ($sortie) {
            return $sortie->quantite_sortie * $sortie->prix_unitaire_sortie;
        });

        $beneficeTotal = $totalEntrees - $totalSorties;

        return response()->json($beneficeTotal);
    }

    public function pourcentageFluctuationBenefice()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $beneficeAnneeEnCours = $this->beneficeTotalAnneeEnCours()->getContent();

        $entreesAnneePrecedente = Entree::whereYear('date_entree', $anneePrecedente)->get();
        $sortiesAnneePrecedente = Sortie::whereYear('date_sortie', $anneePrecedente)->get();

        $totalEntreesAnneePrecedente = $entreesAnneePrecedente->sum(function ($entree) {
            return $entree->quantite_entree * $entree->prix_unitaire_entree;
        });

        $totalSortiesAnneePrecedente = $sortiesAnneePrecedente->sum(function ($sortie) {
            return $sortie->quantite_sortie * $sortie->prix_unitaire_sortie;
        });

        $beneficeAnneePrecedente = $totalEntreesAnneePrecedente - $totalSortiesAnneePrecedente;

        $pourcentageFluctuation = 0;
        if ($beneficeAnneePrecedente != 0) {
            $pourcentageFluctuation = (($beneficeAnneeEnCours - $beneficeAnneePrecedente) / $beneficeAnneePrecedente) * 100;
        }

        return response()->json($pourcentageFluctuation);
    }

    public function differenceAbsolueBenefice()
    {
        $anneeEnCours = Carbon::now()->year;
        $anneePrecedente = $anneeEnCours - 1;

        $beneficeAnneeEnCours = $this->beneficeTotalAnneeEnCours()->getContent();

        $entreesAnneePrecedente = Entree::whereYear('date_entree', $anneePrecedente)->get();
        $sortiesAnneePrecedente = Sortie::whereYear('date_sortie', $anneePrecedente)->get();

        $totalEntreesAnneePrecedente = $entreesAnneePrecedente->sum(function ($entree) {
            return $entree->quantite_entree * $entree->prix_unitaire_entree;
        });

        $totalSortiesAnneePrecedente = $sortiesAnneePrecedente->sum(function ($sortie) {
            return $sortie->quantite_sortie * $sortie->prix_unitaire_sortie;
        });

        $beneficeAnneePrecedente = $totalEntreesAnneePrecedente - $totalSortiesAnneePrecedente;

        $differenceAbsolue = abs($beneficeAnneeEnCours - $beneficeAnneePrecedente);

        return response()->json($differenceAbsolue);
    }
}
