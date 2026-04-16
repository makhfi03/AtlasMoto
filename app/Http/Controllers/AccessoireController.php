<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessoireController extends Controller
{

    public function index()
    {
        $accessoires = Accessoire::all();
        return view('boutique.index', compact('accessoires'));
    }

    public function show($id)
    {
        $accessoire = Accessoire::findOrFail($id);
        return view('accessoires.show', compact('accessoire'));
    }

    public function adminIndex()
    {
        $accessoires = Accessoire::all();
        return view('admin.accessoires', compact('accessoires'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie' => 'required',
            'image' => 'required|url'
        ]);

        Accessoire::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'categorie' => $request->categorie,
            'image' => $request->image,
            'description' => 'Aucune description'
        ]);

        return redirect()->back()->with('success', 'Accessoire ajouté !');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie' => 'required',
            'image' => 'required|url'
        ]);

        $accessoire = Accessoire::findOrFail($id);
        $accessoire->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'categorie' => $request->categorie,
            'image' => $request->image,
            'description' => $request->description ?? $accessoire->description,
        ]);

        return redirect()->back()->with('success', 'Article mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $accessoire = Accessoire::findOrFail($id);
        $accessoire->delete();
        return redirect()->back()->with('success', 'Article supprimé');
    }
}
