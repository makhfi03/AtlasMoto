<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $moto->name }} | Détails AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow-sm py-5 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black italic uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </a>
            <a href="{{ route('home') }}" class="text-[10px] font-black uppercase italic text-gray-400 hover:text-orange-600 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour à la flotte
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row min-h-[650px]">
            
            <div class="md:w-1/2 relative bg-gray-200 overflow-hidden">
                <img src="{{ $moto->image }}"
                     alt="{{ $moto->name }}" 
                     class="w-full h-full object-cover">
                
                <div class="absolute top-8 left-8">
                    <span class="bg-black text-white text-[10px] font-black px-6 py-3 rounded-full italic uppercase tracking-widest shadow-2xl border-2 border-orange-600">
                        {{ $moto->status }}
                    </span>
                </div>
            </div>

            <div class="md:w-1/2 p-8 md:p-16 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="text-orange-600 font-black uppercase italic tracking-[0.3em] text-xs">
                        {{ $moto->categorieMoto }}
                    </span>
                </div>

                <h1 class="text-5xl md:text-7xl font-black italic uppercase leading-none mb-8 tracking-tighter">
                    {{ $moto->name }}
                </h1>

                <div class="grid grid-cols-2 gap-4 mb-10">
                    <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100">
                        <p class="text-[9px] font-black text-gray-400 uppercase italic mb-1">Kilométrage</p>
                        <p class="text-xl font-black text-gray-800 italic">{{ number_format($moto->kilometrage, 0, ',', ' ') }} KM</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100">
                        <p class="text-[9px] font-black text-gray-400 uppercase italic mb-1">Prix / Jour</p>
                        <p class="text-xl font-black text-orange-600 italic">{{ $moto->price_per_day }} DH</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100">
                        <p class="text-[9px] font-black text-gray-400 uppercase italic mb-1">Immatriculation</p>
                        <p class="text-lg font-bold text-gray-700 uppercase italic">{{ $moto->immatriculation }}</p>
                    </div>
                </div>

                <div class="mb-10">
                    <h3 class="text-[10px] font-black uppercase italic text-gray-400 mb-3 tracking-widest border-b border-gray-100 pb-2">À propos de cette machine</h3>
                    <p class="text-gray-500 italic leading-relaxed text-md">
                        {{ $moto->description ?? "Explorez les routes avec cette " . $moto->name . ". Une machine fiable, entretenue avec soin et prête pour l'aventure." }}
                    </p>
                </div>

                <div class="mt-auto">
                    @auth
                        <button class="w-full bg-black text-white py-6 rounded-2xl font-black uppercase italic tracking-[0.2em] hover:bg-orange-600 transition-all duration-300 shadow-xl active:scale-95 flex items-center justify-center gap-3">
                            <i class="fas fa-motorcycle text-xl"></i>
                            Réserver maintenant
                        </button>
                    @else
                        <div class="bg-orange-50 p-6 rounded-3xl border border-orange-100 text-center">
                            <p class="text-orange-900 font-bold italic uppercase text-[10px] mb-4">Connectez-vous pour accéder à la location</p>
                            <a href="{{ route('login') }}" class="inline-block bg-black text-white px-10 py-4 rounded-xl font-black uppercase italic text-xs shadow-md hover:bg-orange-600 transition">
                                Connexion / Inscription
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="flex flex-wrap items-center justify-center gap-6 mt-8 opacity-50">
                    <div class="flex items-center gap-2 text-[9px] font-black uppercase italic">
                        <i class="fas fa-check-circle text-orange-600"></i> Entretien certifié
                    </div>
                    <div class="flex items-center gap-2 text-[9px] font-black uppercase italic">
                        <i class="fas fa-shield-alt text-orange-600"></i> Assurance 24h/24
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-12 text-center opacity-30">
        <p class="text-[9px] font-black uppercase italic tracking-[0.5em]">
            &copy; 2026 AtlasMoto - Premium Rental Experience
        </p>
    </footer>

</body>
</html>