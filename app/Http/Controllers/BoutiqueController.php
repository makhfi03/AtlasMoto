<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessoire;

class BoutiqueController extends Controller
{
    public function ajouterAuPanier(Request $request)
    {
        $produitId = $request->id;
        $quantiteAjoutee = (int) $request->quantite;
        $produit = Accessoire::findOrFail($produitId);
        $panier = session()->get('panier', []);

        $quantiteDejaAuPanier = isset($panier[$produitId]) ? $panier[$produitId]['quantite'] : 0;
        $quantiteTotale = $quantiteDejaAuPanier + $quantiteAjoutee;

        if ($produit->stock < $quantiteTotale) {
            return redirect()->back()->with('error', 'Stock insuffisant. Vous avez déjà ' . $quantiteDejaAuPanier . ' unité(s) dans votre panier. Disponible au total : ' . $produit->stock);
        }

        if (isset($panier[$produitId])) {
            $panier[$produitId]['quantite'] += $quantiteAjoutee;
        } else {
            $panier[$produitId] = [
                "nom" => $produit->nom,
                "quantite" => $quantiteAjoutee,
                "prix" => $produit->prix,
                "image" => $produit->image
            ];
        }

        session()->put('panier', $panier);
        return redirect()->back()->with('success', 'Article ajouté au panier !');
    }

    public function voirPanier()
    {
        $panier = session()->get('panier', []);
        return view('boutique.panier', compact('panier'));
    }
    public function supprimer($id)
    {
        $panier = session()->get('panier');

        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }
}
