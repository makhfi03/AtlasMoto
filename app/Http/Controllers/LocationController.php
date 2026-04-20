<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use App\Models\Location;
use App\Models\Commande;
use App\Models\Accessoire;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with(['user', 'moto'])->latest()->get();
        return view('admin.reservations', compact('locations'));
    }

    public function store(Request $request)
    {
        $id_moto = $request->moto_id;
        $date_debut_voulue = $request->date_debut;
        $date_fin_voulue = $request->date_fin;

        $locations_existantes = Location::where('moto_id', $id_moto)->get();

        foreach ($locations_existantes as $reservation) {
            if ($date_debut_voulue <= $reservation->date_fin && $date_fin_voulue >= $reservation->date_debut) {
                return redirect()->back()->with('error', 'Désolé, cette moto est déjà réservée pour ces dates.');
            }
        }

        $moto = Moto::find($id_moto);
        $diff = date_diff(date_create($date_debut_voulue), date_create($date_fin_voulue));
        $nombre_jours = $diff->days ?: 1;

        $nouvelleLocation = new Location();
        $nouvelleLocation->user_id = auth()->id();
        $nouvelleLocation->moto_id = $id_moto;
        $nouvelleLocation->date_debut = $date_debut_voulue;
        $nouvelleLocation->date_fin = $date_fin_voulue;
        $nouvelleLocation->prix_total = $nombre_jours * $moto->price_per_day;
        $nouvelleLocation->statut = 'confirmee';
        $nouvelleLocation->save();

        return redirect()->back()->with('success', 'Votre réservation est confirmée !');
    }
    public function checkout(Request $request)
    {
        $id_moto = $request->moto_id;
        $moto = Moto::findOrFail($id_moto);

        $locations_existantes = Location::where('moto_id', $id_moto)->get();
        foreach ($locations_existantes as $reservation) {
            if ($request->date_debut <= $reservation->date_fin && $request->date_fin >= $reservation->date_debut) {
                return redirect()->back()->with('error', 'Dates indisponibles.');
            }
        }

        $diff = date_diff(date_create($request->date_debut), date_create($request->date_fin));
        $jours = $diff->days ?: 1;
        $total = $jours * $moto->price_per_day;

        return view('locations.checkout', [
            'moto' => $moto,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'jours' => $jours,
            'total' => $total
        ]);
    }

    public function success(Request $request)
    {
        $data = session('temp_location');

        if (!$data) {
            return redirect()->route('locations')->with('error', 'Impossible de retrouver votre commande.');
        }

        $location = new Location();
        $location->user_id = auth()->id();
        $location->moto_id = $data['moto_id'];
        $location->date_debut = $data['date_debut'];
        $location->date_fin = $data['date_fin'];
        $location->prix_total = $data['total'];
        $location->statut = 'confirmee';
        $location->save();

        session()->forget('temp_location');
        return view('locations.success', compact('location'));
    }

    public function processPayment(Request $request)
    {
        $panier = session()->get('panier', []);
    foreach ($panier as $id => $details) {
        $accessoire = Accessoire::find($id);
        if (!$accessoire || $accessoire->stock < $details['quantite']) {
            return redirect()->route('panier.index')->with('error', 'Le stock de ' . $details['nom'] . ' a changé. Veuillez mettre à jour votre panier.');
        }
    }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $successUrl = ($request->type === 'accessoires')
            ? route('boutique.success')
            : route('locations.success');

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => ($request->type === 'accessoires') ? 'Achat Accessoires AtlasMoto' : 'Location Moto AtlasMoto',
                    ],
                    'unit_amount' => $request->total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => route('home'),
        ]);

        session(['temp_location' => $request->all()]);

        return redirect($session->url);
    }

    public function checkoutBoutique(Request $request)
    {
        $panier = session()->get('panier', []);
        if (empty($panier)) return redirect()->route('home');

        $total = 0;
        foreach ($panier as $details) {
            $total += $details['prix'] * $details['quantite'];
        }

        $fraisPort = ($request->shipping_type === 'livraison') ? 50 : 0;
        $totalFinal = $total + $fraisPort;

        return view('boutique.checkout', [
            'panier' => $panier,
            'total' => $totalFinal,
            'shipping_type' => $request->shipping_type
        ]);
    }

    public function successBoutique(Request $request)
{
    $panier = session('panier');
    $data = session('temp_location');

    if (!$panier || !$data) return redirect()->route('home');

    $mode = $data['shipping_type'] ?? 'retrait';
    Commande::create([
        'user_id' => auth()->id(),
        'items' => $panier,
        'total' => $data['total'],
        'mode_reception' => $mode,
        'statut' => ($mode === 'livraison') ? 'en cours' : 'payé'
    ]);

    foreach ($panier as $id => $item) {
        $accessoire = Accessoire::find($id);
        if ($accessoire) {
            $accessoire->stock -= $item['quantite'];
            $accessoire->save();
        }
    }

    session()->forget(['panier', 'temp_location']);
    return view('boutique.success');
}
    public function confirmerReception($id)
    {
        $commande = Commande::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $commande->update(['statut' => 'livré']);
        return back()->with('success', 'Réception confirmée ! Merci de votre confiance.');
    }
}
