<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Moto;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $motosLouees = Location::where('statut', 'confirmee')->count();
        $totalMotos = Moto::count();

        $ventesAccessoires = Commande::where('statut', 'livré')->sum('total');

        $totalClients = User::where('role', '!=', 'admin')->count();

        $dernieresReservations = Location::with(['user', 'moto'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'motosLouees',
            'totalMotos',
            'ventesAccessoires',
            'totalClients',
            'dernieresReservations'
        ));
    }
}
