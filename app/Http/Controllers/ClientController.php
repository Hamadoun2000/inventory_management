<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_client' => 'required',
            'adresse_client' => 'required',
            'email_client' => 'required|email',
            'telephone_client' => 'required'
        ]);

        $client = Client::create([
            'nom_client' => $request->input('nom_client'),
            'adresse_client' => $request->input('adresse_client'),
            'email_client' => $request->input('email_client'),
            'telephone_client' => $request->input('telephone_client')
        ]);

        return response()->json($client, 201);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom_client' => 'required',
            'adresse_client' => 'required',
            'email_client' => 'required|email',
            'telephone_client' => 'required'
        ]);

        $client->update([
            'nom_client' => $request->input('nom_client'),
            'adresse_client' => $request->input('adresse_client'),
            'email_client' => $request->input('email_client'),
            'telephone_client' => $request->input('telephone_client')
        ]);

        return response()->json($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
