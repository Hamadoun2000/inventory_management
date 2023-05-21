<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return response()->json($fournisseurs);
    }

    public function show(Fournisseur $fournisseur)
    {
        return response()->json($fournisseur);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required',
            'adresse_fournisseur' => 'required',
            'email_fournisseur' => 'required|email',
            'telephone_fournisseur' => 'required'
        ]);

        $fournisseur = Fournisseur::create([
            'nom_fournisseur' => $request->input('nom_fournisseur'),
            'adresse_fournisseur' => $request->input('adresse_fournisseur'),
            'email_fournisseur' => $request->input('email_fournisseur'),
            'telephone_fournisseur' => $request->input('telephone_fournisseur')
        ]);

        return response()->json($fournisseur, 201);
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom_fournisseur' => 'required',
            'adresse_fournisseur' => 'required',
            'email_fournisseur' => 'required|email',
            'telephone_fournisseur' => 'required'
        ]);

        $fournisseur->update([
            'nom_fournisseur' => $request->input('nom_fournisseur'),
            'adresse_fournisseur' => $request->input('adresse_fournisseur'),
            'email_fournisseur' => $request->input('email_fournisseur'),
            'telephone_fournisseur' => $request->input('telephone_fournisseur')
        ]);

        return response()->json($fournisseur);
    }

    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return response()->json(null, 204);
    }
}
