<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mesCommandes()
    {
        $locations = Location::where('user_id', auth()->id())
            ->with('moto')
            ->latest()
            ->get();

        $achats = Commande::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.commandes', compact('locations', 'achats'));
    }

    public function adminIndex()
    {
        $clients = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.users', compact('clients'));
    }
}
