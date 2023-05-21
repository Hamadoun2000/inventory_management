<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_produit' => 'required',
            'description_produit' => 'required',
            'quantite_stock' => 'required|numeric',
            'seuil_alerte' => 'required|numeric',
            'fournisseur_id' => 'required|exists:fournisseurs,id'
        ]);

        $product = Product::create([
            'nom_produit' => $request->input('nom_produit'),
            'description_produit' => $request->input('description_produit'),
            'quantite_stock' => $request->input('quantite_stock'),
            'seuil_alerte' => $request->input('seuil_alerte'),
            'fournisseur_id' => $request->input('fournisseur_id')
        ]);

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nom_produit' => 'required',
            'description_produit' => 'required',
            'quantite_stock' => 'required|numeric',
            'seuil_alerte' => 'required|numeric',
            'fournisseur_id' => 'required|exists:fournisseurs,id'
        ]);

        $product->update([
            'nom_produit' => $request->input('nom_produit'),
            'description_produit' => $request->input('description_produit'),
            'quantite_stock' => $request->input('quantite_stock'),
            'seuil_alerte' => $request->input('seuil_alerte'),
            'fournisseur_id' => $request->input('fournisseur_id')
        ]);

        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
