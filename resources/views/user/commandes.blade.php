<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AtlasMoto | Mon Historique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow-sm p-6 mb-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-black italic uppercase tracking-tighter">Atlas<span class="text-orange-600">Moto</span></div>
            <a href="/" class="text-[10px] font-black uppercase italic text-gray-400 hover:text-black transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-6 max-w-5xl mb-20">
        
        @if(session('success'))
            <div class="mb-8 bg-green-500 text-white p-4 rounded-2xl font-black uppercase italic text-[10px] tracking-widest shadow-lg flex items-center animate-pulse">
                <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success') }}
            </div>
        @endif

        <h1 class="text-4xl font-black uppercase italic mb-10 tracking-tighter">Mon <span class="text-orange-600">Historique</span></h1>

        <h2 class="text-xl font-black uppercase italic mb-6 flex items-center gap-3">
            <i class="fas fa-motorcycle text-orange-600"></i> Vos Réservations
        </h2>
        
        <div class="space-y-6 mb-16">
            @forelse($locations as $location)
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center space-x-6 flex-1">
                    <div class="w-24 h-24 bg-gray-100 rounded-3xl overflow-hidden shadow-inner">
                        <img src="{{ $location->moto->image }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-[8px] font-black uppercase text-gray-400 tracking-widest">Location Moto</span>
                        <h3 class="text-xl font-black uppercase italic">{{ $location->moto->name }}</h3>
                        <p class="text-[10px] font-bold text-gray-400">Réf: #LOC-{{ $location->id }}</p>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <p class="text-[9px] font-black uppercase text-gray-400 mb-1">Période</p>
                    <p class="text-xs font-bold italic">Du {{ $location->date_debut }} au {{ $location->date_fin }}</p>
                </div>

                <div class="text-center">
                    <p class="text-[9px] font-black uppercase text-gray-400 mb-1 font-mono">Total</p>
                    <p class="text-xl font-black italic text-orange-600">{{ number_format($location->prix_total, 2) }} DH</p>
                </div>

                <div class="min-w-[140px] text-right">
                    @if($location->statut == 'confirmee')
                        <span class="bg-green-100 text-green-600 px-6 py-2 rounded-full text-[8px] font-black uppercase italic tracking-widest border border-green-200">Confirmée</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-600 px-6 py-2 rounded-full text-[8px] font-black uppercase italic tracking-widest border border-yellow-200">En attente</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-10 bg-white rounded-[2rem] border border-dashed border-gray-200">
                <p class="text-gray-400 font-bold italic uppercase text-[10px]">Aucune réservation de moto.</p>
            </div>
            @endforelse
        </div>

        <h2 class="text-xl font-black uppercase italic mb-6 flex items-center gap-3">
            <i class="fas fa-shopping-bag text-orange-600"></i> Vos Équipements
        </h2>

        <div class="space-y-6">
            @forelse($achats as $achat)
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                
                <div class="flex items-center space-x-6 flex-1">
                    <div class="flex -space-x-4">
                        @php $items = is_array($achat->items) ? $achat->items : json_decode($achat->items, true); @endphp
                        @foreach(array_slice($items, 0, 3) as $item)
                            <div class="w-16 h-16 bg-gray-50 rounded-2xl border-4 border-white overflow-hidden shadow-sm flex items-center justify-center">
                                <img src="{{ $item['image'] }}" class="w-full h-full object-contain p-1">
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <span class="text-[8px] font-black uppercase text-gray-400 tracking-widest">Achat Boutique</span>
                        <h3 class="text-lg font-black uppercase italic">Commande #ACC-{{ $achat->id }}</h3>
                        <p class="text-[10px] font-bold text-gray-400 italic">
                            {{ count($items) }} article(s) • {{ $achat->mode_reception == 'livraison' ? 'Livraison' : 'Retrait Magasin' }}
                        </p>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-[9px] font-black uppercase text-gray-400 mb-1">Date</p>
                    <p class="text-xs font-bold italic text-gray-600">{{ $achat->created_at->format('d/m/Y') }}</p>
                </div>

                <div class="text-center">
                    <p class="text-[9px] font-black uppercase text-gray-400 mb-1">Total Payé</p>
                    <p class="text-xl font-black italic text-black">{{ number_format($achat->total, 2) }} DH</p>
                </div>

                <div class="min-w-[160px] flex flex-col items-center md:items-end gap-2">
                    @if($achat->mode_reception == 'livraison')
                        @if($achat->statut == 'livré')
                            <span class="bg-green-100 text-green-600 px-6 py-2 rounded-full text-[8px] font-black uppercase italic tracking-widest border border-green-200">
                                <i class="fas fa-check mr-1"></i> Produit Livré
                            </span>
                        @else
                            <span class="bg-orange-100 text-orange-600 px-6 py-2 rounded-full text-[8px] font-black uppercase italic tracking-widest border border-orange-200">
                                Livraison en cours
                            </span>
                            <form action="{{ route('commandes.confirmer', $achat->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-[7px] font-black uppercase text-gray-400 hover:text-orange-600 transition tracking-tighter underline">
                                    Confirmer la réception ?
                                </button>
                            </form>
                        @endif
                    @else
                        <span class="bg-blue-50 text-blue-500 px-6 py-2 rounded-full text-[8px] font-black uppercase italic tracking-widest border border-blue-100">
                            À récupérer en magasin
                        </span>
                    @endif
                </div>

            </div>
            @empty
            <div class="text-center py-10 bg-white rounded-[2rem] border border-dashed border-gray-200">
                <p class="text-gray-400 font-bold italic uppercase text-[10px]">Aucun achat d'accessoires trouvé.</p>
            </div>
            @endforelse
        </div>
    </div>

    <footer class="py-10 text-center opacity-30">
        <p class="text-[8px] font-black uppercase italic tracking-[0.4em]">AtlasMoto 2026 - Ride with Passion</p>
    </footer>

</body>
</html>