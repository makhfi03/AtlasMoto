<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use App\Models\Location;
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
}
