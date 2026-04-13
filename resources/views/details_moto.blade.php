<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMW R1250 GS | Détails - AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-900">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-black text-gray-800 italic uppercase">
                Atlas<span class="text-orange-600">Moto</span>
            </a>
            <div class="hidden md:flex space-x-8 font-bold text-sm uppercase italic">
                <a href="/" class="hover:text-orange-600 transition">Accueil</a>
                <a href="{{ route('locations') }}" class="text-orange-600 border-b-2 border-orange-500">Location</a>
                <a href="{{ route('accessoires.user') }}" class="hover:text-orange-600 transition">Boutique</a>
            </div>
            @auth
            <div class="w-10 h-10 bg-orange-600 text-white rounded-full flex items-center justify-center font-black italic shadow-lg uppercase">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <nav class="mb-8 flex items-center space-x-2 text-[10px] font-black uppercase tracking-widest text-gray-400 italic">
            <a href="/" class="hover:text-orange-600">Accueil</a>
            <span>/</span>
            <a href="{{ route('locations') }}" class="hover:text-orange-600">Flotte</a>
            <span>/</span>
            <span class="text-black">BMW R1250 GS</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="space-y-6">
                <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[500px]">
                    <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=1200" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <span class="bg-black text-white text-[10px] font-black px-4 py-1.5 rounded-full italic uppercase tracking-widest">Adventure / Trail</span>
                    <h1 class="text-5xl font-black italic uppercase text-gray-900 mt-4 leading-none tracking-tighter">BMW R1250 GS <span class="text-orange-600">Edition 2026</span></h1>
                    <div class="flex items-center space-x-4 mt-4">
                        <div class="flex text-orange-500 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase italic">(128 avis clients)</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 border-y border-gray-100 py-8">
                    <div class="text-center">
                        <i class="fas fa-bolt text-orange-600 text-xl mb-2"></i>
                        <p class="text-[9px] font-black uppercase text-gray-400 italic">Puissance</p>
                        <p class="text-sm font-black italic uppercase">136 CV</p>
                    </div>
                    <div class="text-center border-x border-gray-100">
                        <i class="fas fa-tachometer-alt text-orange-600 text-xl mb-2"></i>
                        <p class="text-[9px] font-black uppercase text-gray-400 italic">Cylindrée</p>
                        <p class="text-sm font-black italic uppercase">1254 CC</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-gas-pump text-orange-600 text-xl mb-2"></i>
                        <p class="text-[9px] font-black uppercase text-gray-400 italic">Autonomie</p>
                        <p class="text-sm font-black italic uppercase">450 KM</p>
                    </div>
                </div>

                <p class="text-gray-500 text-sm font-medium italic leading-relaxed">
                    La reine de l'aventure est prête pour vous. Que ce soit pour les routes sinueuses du Haut-Atlas ou les pistes désertiques vers Merzouga, la BMW R1250 GS offre une stabilité inégalée et un confort premium pour le pilote et son passager.
                </p>

                <div class="bg-white p-8 rounded-[2rem] shadow-2xl border border-gray-50 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-orange-600 text-white px-6 py-2 rounded-bl-3xl font-black italic text-[10px] uppercase">
                        Disponible à Marrakech
                    </div>
                    <div class="mb-6">
                        <p class="text-[10px] font-black text-gray-400 uppercase italic mb-1">Prix de location</p>
                        <div class="flex items-end space-x-2">
                            <span class="text-4xl font-black italic text-gray-900 leading-none">900 DH</span>
                            <span class="text-sm font-bold text-gray-400 italic uppercase">/ Jour</span>
                        </div>
                    </div>

                    @auth
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[9px] font-black text-gray-400 uppercase italic">Date de début</label>
                                <input type="date" class="w-full bg-gray-50 border-0 rounded-xl px-4 py-3 text-xs font-bold focus:ring-2 focus:ring-orange-600 outline-none">
                            </div>
                            <div>
                                <label class="text-[9px] font-black text-gray-400 uppercase italic">Date de fin</label>
                                <input type="date" class="w-full bg-gray-50 border-0 rounded-xl px-4 py-3 text-xs font-bold focus:ring-2 focus:ring-orange-600 outline-none">
                            </div>
                        </div>
                        <button class="w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic tracking-[0.2em] text-[11px] hover:bg-orange-600 transition-all shadow-xl shadow-orange-600/20">
                            Confirmer la réservation <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>
                    @endauth

                    @guest
                    <div class="bg-gray-50 p-6 rounded-2xl text-center border border-dashed border-gray-200">
                        <i class="fas fa-lock text-gray-300 text-2xl mb-3"></i>
                        <p class="text-xs font-bold text-gray-500 uppercase italic mb-4">Connectez-vous pour réserver cette moto</p>
                        <a href="/login" class="inline-block bg-black text-white px-8 py-3 rounded-xl font-black uppercase italic text-[10px] tracking-widest hover:bg-orange-600 transition">Connexion</a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <div class="text-3xl font-black italic mb-6">ATLAS<span class="text-orange-600">MOTO</span></div>
            <div class="text-[10px] text-gray-600 border-t border-gray-800 pt-8 uppercase font-bold tracking-widest">
                &copy; 2026 AtlasMoto. Tout droit réservés.
            </div>
        </div>
    </footer>

</body>
</html>