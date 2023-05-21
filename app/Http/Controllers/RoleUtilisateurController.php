<?php

namespace App\Http\Controllers;

use App\Models\RoleUtilisateur;
use Illuminate\Http\Request;

class RoleUtilisateurController extends Controller
{
    public function index()
    {
        $roles = RoleUtilisateur::all();
        return response()->json($roles);
    }

    public function show(RoleUtilisateur $roleUtilisateur)
    {
        return response()->json($roleUtilisateur);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required'
        ]);

        $roleUtilisateur = RoleUtilisateur::create([
            'nom_role' => $request->input('nom_role')
        ]);

        return response()->json($roleUtilisateur, 201);
    }

    public function update(Request $request, RoleUtilisateur $roleUtilisateur)
    {
        $request->validate([
            'nom_role' => 'required'
        ]);

        $roleUtilisateur->update([
            'nom_role' => $request->input('nom_role')
        ]);

        return response()->json($roleUtilisateur);
    }

    public function destroy(RoleUtilisateur $roleUtilisateur)
    {
        $roleUtilisateur->delete();
        return response()->json(null, 204);
    }
}
