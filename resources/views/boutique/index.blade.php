<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique Accessoires | AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .shop-header { background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1547544289-51c48f219e8c?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-gray-50">

    <div class="container mx-auto px-6 mt-6">
        @if(session('error')) <div class="bg-red-600 text-white p-4 rounded-2xl text-center font-black uppercase mb-4">{{ session('error') }}</div> @endif
        @if(session('success')) <div class="bg-green-600 text-white p-4 rounded-2xl text-center font-black uppercase mb-4">{{ session('success') }}</div> @endif
    </div>

<nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-black text-gray-800 italic uppercase">
                Atlas<span class="text-orange-600">Moto</span>
            </div>

            <div class="hidden md:flex space-x-8 font-bold text-[11px] text-gray-700 uppercase tracking-widest italic">
                <a href="/" class="hover:text-orange-600 transition">Accueil</a>
                <a href="{{ route('locations') }}" class="hover:text-orange-600 transition">Location</a>
                <a href="{{ route('accessoires.user') }}" class="text-orange-600 border-b-2 border-orange-500">Boutique</a>
                @auth
                <a href="{{ route('user.commandes') }}" class="hover:text-orange-600 transition">Mes commandes</a>
                @endauth
            </div>

            <div class="flex items-center space-x-6">
<a href="{{ route('panier.index') }}" class="relative group" x-data="{ cartCount: {{ session()->has('panier') ? array_sum(array_column(session('panier'), 'quantite')) : 0 }} }">                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center group-hover:bg-orange-600 transition shadow-sm">
                        <i class="fas fa-shopping-basket text-xs text-gray-600 group-hover:text-white"></i>
                    </div>
                    <template x-if="cartCount > 0">
                        <span x-text="cartCount" class="absolute -top-1 -right-1 bg-orange-600 text-white text-[8px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white shadow-sm"></span>
                    </template>
                </a>

                @auth
                <div class="flex items-center space-x-3 border-l pl-6 border-gray-100">
                    <span class="text-[10px] font-black uppercase italic hidden sm:block">{{ Auth::user()->firstname }}</span>
                    <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-black italic border-2 border-orange-600 shadow-lg uppercase">
                        {{ substr(Auth::user()->firstname, 0, 1) }}
                    </div>
                </div>
                @else
                <a href="/login" class="bg-black text-white px-6 py-2 rounded-full font-bold text-xs hover:bg-orange-600 transition uppercase italic">Connexion</a>
                @endauth
            </div>
        </div>
    </nav>



    <header class="shop-header h-[35vh] flex items-center justify-center text-center text-white">
        <h1 class="text-5xl font-black italic uppercase tracking-tighter">L'Équipement <span class="text-orange-500">Pro</span></h1>
    </header>

    <section class="py-16 container mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($accessoires as $item)
            <div x-data="{ open: false }" class="bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <div class="h-56 rounded-[2rem] overflow-hidden bg-gray-50 relative mb-6">
                    <img src="{{ $item->image }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 text-black text-[8px] font-black px-4 py-2 rounded-full uppercase shadow-sm">{{ $item->categorie }}</span>
                    </div>
                </div>

                <div class="px-4 pb-2 text-center">
                    <h3 class="text-lg font-black uppercase italic text-gray-900 mb-1">{{ $item->nom }}</h3>
                    <p class="text-[9px] font-bold uppercase italic mb-6 {{ $item->stock > 0 ? 'text-gray-400' : 'text-red-500' }}">
                        {{ $item->stock > 0 ? 'En stock : ' . $item->stock : 'RUPTURE DE STOCK' }}
                    </p>

                    <div class="flex justify-between items-center border-t border-gray-50 pt-6">
                        <span class="text-xl font-black text-gray-900 italic">{{ number_format($item->prix, 2) }} DH</span>

                        @auth
                            @if($item->stock > 0)
                                <button @click="open = true" class="w-12 h-12 bg-black text-white rounded-2xl flex items-center justify-center hover:bg-orange-600 transition shadow-xl active:scale-90">
                                    <i class="fas fa-plus"></i>
                                </button>
                            @else
                                <button disabled class="w-12 h-12 bg-gray-200 text-gray-400 rounded-2xl flex items-center justify-center cursor-not-allowed">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="w-12 h-12 bg-gray-100 text-gray-300 rounded-2xl flex items-center justify-center"><i class="fas fa-lock"></i></a>
                        @endauth
                    </div>
                </div>

                @if($item->stock > 0)
                <template x-teleport="body">
                    <div x-show="open" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
                        <div @click.away="open = false" class="bg-white w-full max-w-sm rounded-[3rem] p-10 text-center relative border border-gray-100">
                            <button @click="open = false" class="absolute top-8 right-8 text-gray-400"><i class="fas fa-times"></i></button>
                            <h3 class="text-2xl font-black uppercase italic mb-8">{{ $item->nom }}</h3>
                            <form action="{{ route('panier.ajouter') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="mb-10">
                                    <input type="number" name="quantite" value="1" min="1" max="{{ $item->stock }}" 
                                           class="w-24 text-center bg-gray-50 border border-gray-100 rounded-2xl p-4 font-black text-xl">
                                </div>
                                <button type="submit" class="w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic hover:bg-orange-600 transition">Confirmer l'ajout</button>
                            </form>
                        </div>
                    </div>
                </template>
                @endif
            </div>
            @empty
            <div class="col-span-full text-center py-20 opacity-30">Stock vide</div>
            @endforelse
        </div>
    </section>
</body>
</html>