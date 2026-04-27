<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $categorieSelect = $request->query('categorie', 'tout');

    $query = Moto::query();
    if ($categorieSelect !== 'tout') {
        $query->where('categorieMoto', 'like', '%' . $categorieSelect . '%');
    }
    $motos = $query->get();

    return view('welcome', compact('motos', 'categorieSelect'));
}
}
