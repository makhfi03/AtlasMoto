<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotoController extends Controller
{
    public function index() {
    $motos = Moto::all();
    foreach($motos as $moto) {
        $moto->dates_occupées = Location::where('moto_id', $moto->id)
            ->where('statut', 'confirmee')
            ->select('date_debut', 'date_fin')
            ->get();
    }
    return view('locations', compact('motos'));
}

    public function home()
    {
        $motos = Moto::all();
        return view('welcome', compact('motos'));
    }

    public function show($id)
    {
        $moto = Moto::findOrFail($id);
        return view('motos.show', compact('moto'));
    }
    public function adminIndex()
    {
        $motos = Moto::all();
        return view('admin.motos', compact('motos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'immatriculation' => 'required|unique:motos',
            'kilometrage' => 'required|numeric',
            'categorieMoto' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        Moto::create([
            'name' => $request->name,
            'image' => $request->image,
            'immatriculation' => $request->immatriculation,
            'kilometrage' => $request->kilometrage,
            'categorieMoto' => $request->categorieMoto,
            'description' => $request->description,
            'price_per_day' => $request->price_per_day,
            'status' => 'disponible',
        ]);

        return redirect()->back()->with('success', 'Moto enregistrée avec succès !');
    }

    public function update(Request $request, $id)
    {
        $moto = Moto::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'immatriculation' => 'required|unique:motos,immatriculation,' . $id,
            'kilometrage' => 'required|numeric',
            'categorieMoto' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        $moto->update($request->all());

        return redirect()->back()->with('success', 'La moto a été mise à jour !');
    }

    public function destroy(Moto $moto)
    {
        if ($moto->image) Storage::disk('public')->delete($moto->image);
        $moto->delete();
        return redirect()->back();
    }

    public function locations(Request $request)
    {
        $query = Moto::query();
        if ($request->has('categorie') && $request->categorie !== 'all') {
            $query->where('categorieMoto', $request->categorie);
        }

        $motos = $query->get();
        return view('locations', compact('motos'));
    }
}
