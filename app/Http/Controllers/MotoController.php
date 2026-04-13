<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotoController extends Controller
{
    public function index()
    {
        $motos = Moto::all();
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

    public function destroy(Moto $moto)
    {
        if ($moto->image) Storage::disk('public')->delete($moto->image);
        $moto->delete();
        return redirect()->back();
    }
}
