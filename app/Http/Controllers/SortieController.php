<?php

namespace App\Http\Controllers;

use App\Models\Sortie;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function index()
    {
        $sorties = Sortie::all();
        return response()->json($sorties);
    }

    public function show(Sortie $sortie)
    {
        return response()->json($sortie);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_sortie' => 'required|date',
            'quantite_sortie' => 'required|numeric',
            'prix_unitaire_sortie' => 'required|numeric',
            'produit_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id'
        ]);

        $sortie = Sortie::create([
            'date_sortie' => $request->input(now()),
            'quantite_sortie' => $request->input('quantite_sortie'),
            'prix_unitaire_sortie' => $request->input('prix_unitaire_sortie'),
            'produit_id' => $request->input('produit_id'),
            'client_id' => $request->input('client_id')
        ]);

        return response()->json($sortie, 201);
    }

    public function update(Request $request, Sortie $sortie)
    {
        $request->validate([
            'date_sortie' => 'required|date',
            'quantite_sortie' => 'required|numeric',
            'prix_unitaire_sortie' => 'required|numeric',
            'produit_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id'
        ]);

        $sortie->update([
            'date_sortie' => $request->input('date_sortie'),
            'quantite_sortie' => $request->input('quantite_sortie'),
            'prix_unitaire_sortie' => $request->input('prix_unitaire_sortie'),
            'produit_id' => $request->input('produit_id'),
            'client_id' => $request->input('client_id')
        ]);

        return response()->json($sortie);
    }

    public function destroy(Sortie $sortie)
    {
        $sortie->delete();
        return response()->json(null, 204);
    }
}
