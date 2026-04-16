<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Louer une Moto au Maroc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-black text-gray-800 italic uppercase">
                Atlas<span class="text-orange-600">Moto</span>
            </div>

            <div class="hidden md:flex space-x-8 font-bold text-[11px] text-gray-700 uppercase tracking-widest italic">
                <a href="/" class="hover:text-orange-600 transition">Accueil</a>
                <a href="{{ route('locations') }}" class="text-orange-600 border-b-2 border-orange-500">Location</a>
                <a href="{{ route('accessoires.user') }}" class="hover:text-orange-600 transition">Boutique</a>
                @auth <a href="/mes-commandes" class="hover:text-orange-600 transition">Mes Commandes</a> @endauth
            </div>

            <div class="flex items-center space-x-4">
                @auth
                <div class="flex items-center space-x-3">
                    <span class="text-[10px] font-black uppercase italic hidden sm:block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                    <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-black italic border-2 border-orange-600 shadow-lg uppercase text-xs">
                        {{ substr(Auth::user()->firstname, 0, 1) }}
                    </div>
                </div>
                @endauth
                @guest
                <a href="/login" class="bg-black text-white px-6 py-2 rounded-full font-bold text-xs hover:bg-orange-600 transition uppercase italic">Connexion</a>
                <a href="/register" class="bg-orange-600 text-white px-6 py-2 rounded-full font-bold text-xs hover:bg-black transition shadow-lg uppercase italic">S'inscrire</a>
                @endguest
            </div>
        </div>
    </nav>

    <section class="bg-black py-16 text-white overflow-hidden relative">
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-5xl md:text-6xl font-black italic uppercase tracking-tighter">
                Notre <span class="text-orange-600">Flotte</span>
            </h1>
            <p class="text-gray-400 mt-4 max-w-xl font-medium italic uppercase text-sm tracking-widest">
                Vérifiez la disponibilité et réservez votre prochaine aventure.
            </p>
        </div>
        <i class="fas fa-motorcycle absolute -right-10 -bottom-10 text-[15rem] text-white/5 -rotate-12"></i>
    </section>

    <div class="container mx-auto px-6 mt-6">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-2xl font-black italic uppercase text-xs tracking-widest shadow-lg mb-4">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-600 text-white p-4 rounded-2xl font-black italic uppercase text-xs tracking-widest shadow-lg mb-4">
                <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
            </div>
        @endif
    </div>

    <section class="py-12 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @forelse($motos as $moto)
            <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100">
                <div class="h-64 overflow-hidden relative">
                    <img src="{{ $moto->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-6 left-6 flex flex-col gap-2">
                        <span class="bg-black/80 backdrop-blur text-white text-[10px] font-black px-4 py-1 rounded-full italic uppercase tracking-widest">
                            {{ $moto->categorieMoto }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black italic uppercase leading-none">{{ $moto->name }}</h3>
                            <p class="text-gray-400 text-[9px] font-bold uppercase mt-1 italic tracking-widest">
                                {{ $moto->immatriculation }}
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="text-2xl font-black text-orange-600 italic leading-none">{{ $moto->price_per_day }} DH</span>
                            <p class="text-[8px] font-bold text-gray-400 uppercase">Par jour</p>
                        </div>
                    </div>

                    <p class="text-gray-500 text-[11px] mb-6 italic line-clamp-2">{{ $moto->description }}</p>

                    @auth
                        <div class="bg-gray-50 p-5 rounded-[1.5rem] border border-dashed border-gray-200">
                            <p class="text-[9px] font-black uppercase italic text-gray-400 mb-3 tracking-widest">Dates de location</p>
                            
                            <form action="{{ route('locations.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="moto_id" value="{{ $moto->id }}">
                                
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="flex flex-col">
                                        <label class="text-[8px] font-black uppercase text-gray-500 ml-1 mb-1">Début</label>
                                        <input type="date" name="date_debut" class="bg-white border-none rounded-xl p-3 text-[10px] font-bold shadow-sm focus:ring-2 focus:ring-orange-500" required min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="text-[8px] font-black uppercase text-gray-500 ml-1 mb-1">Fin</label>
                                        <input type="date" name="date_fin" class="bg-white border-none rounded-xl p-3 text-[10px] font-bold shadow-sm focus:ring-2 focus:ring-orange-500" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-black text-white py-4 rounded-xl font-black uppercase italic tracking-widest hover:bg-orange-600 transition shadow-xl shadow-black/5 flex items-center justify-center space-x-2">
                                    <span>Vérifier & Réserver</span>
                                    <i class="fas fa-calendar-check text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    @endauth

                    @guest
                    <a href="/login" class="w-full bg-gray-100 text-gray-400 py-4 rounded-2xl font-black uppercase italic tracking-widest hover:bg-gray-200 transition flex items-center justify-center space-x-2 group">
                        <i class="fas fa-lock text-xs mr-2"></i>
                        <span>Connectez-vous pour louer</span>
                    </a>
                    @endguest
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <i class="fas fa-motorcycle text-6xl text-gray-200 mb-4"></i>
                <p class="text-gray-400 font-black italic uppercase tracking-widest">Aucune moto disponible.</p>
            </div>
            @endforelse

        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <div class="text-3xl font-black italic mb-6 uppercase tracking-tighter text-orange-600">ATLASMOTO</div>
            <div class="text-[10px] text-gray-600 border-t border-gray-800 pt-8 uppercase font-black italic">
                &copy; 2026 AtlasMoto. Digital Solutions.
            </div>
        </div>
    </footer>

</body>
</html>