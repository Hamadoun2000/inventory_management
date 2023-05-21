<?php
namespace App\Http\Controllers;

use App\Models\Entree;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    public function index()
    {
        $entrees = Entree::all();
        return response()->json($entrees);
    }

    public function show(Entree $entree)
    {
        return response()->json($entree);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_entree' => 'required|date',
            'quantite_entree' => 'required|numeric',
            'prix_unitaire_entree' => 'required|numeric',
            'produit_id' => 'required|exists:products,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id'
        ]);

        $entree = Entree::create([
            'date_entree' => $request->input(now()),
            'quantite_entree' => $request->input('quantite_entree'),
            'prix_unitaire_entree' => $request->input('prix_unitaire_entree'),
            'produit_id' => $request->input('produit_id'),
            'fournisseur_id' => $request->input('fournisseur_id')
        ]);

        return response()->json($entree, 201);
    }

    public function update(Request $request, Entree $entree)
    {
        $request->validate([
            'date_entree' => 'required|date',
            'quantite_entree' => 'required|numeric',
            'prix_unitaire_entree' => 'required|numeric',
            'produit_id' => 'required|exists:products,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id'
        ]);

        $entree->update([
            'date_entree' => $request->input('date_entree'),
            'quantite_entree' => $request->input('quantite_entree'),
            'prix_unitaire_entree' => $request->input('prix_unitaire_entree'),
            'produit_id' => $request->input('produit_id'),
            'fournisseur_id' => $request->input('fournisseur_id')
        ]);

        return response()->json($entree);
    }

    public function destroy(Entree $entree)
    {
        $entree->delete();
        return response()->json(null, 204);
    }
}
