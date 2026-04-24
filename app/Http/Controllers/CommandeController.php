<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function adminIndex()
    {
        $commandes = Commande::with(['user', 'accessoires'])->latest()->get();
        
        return view('admin.commandes', compact('commandes'));
    }
}
