<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Louer une Moto</title>
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
                @auth
                <a href="{{ route('user.commandes') }}" class="hover:text-orange-600 transition">Mes commandes</a>
                @endauth
            </div>

            <div class="flex items-center space-x-4">
                @auth
                <div class="flex items-center space-x-3">
                    <span class="text-[10px] font-black uppercase italic hidden sm:block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                    <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-black italic border-2 border-orange-600 shadow-lg uppercase">
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

    <section class="bg-black py-16 text-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-5xl font-black italic uppercase tracking-tighter">Choisissez votre <span class="text-orange-600">Liberté</span></h1>
            <p class="text-gray-400 mt-2 uppercase text-[10px] font-bold tracking-[0.3em]">Réservez en ligne · Payez par Stripe · Roulez</p>
        </div>
        <i class="fas fa-motorcycle absolute -right-10 -bottom-10 text-[12rem] text-white/5 -rotate-12"></i>
    </section>

    <div class="container mx-auto px-6 mt-8">
        @if(session('error'))
        <div class="bg-red-600 text-white p-4 rounded-2xl font-black italic uppercase text-[10px] tracking-widest shadow-xl mb-6">
            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
        </div>
        @endif
    </div>

    <section class="py-12 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($motos as $moto)
            <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 group">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ $moto->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-4 left-4">
                        <span class="bg-black text-white text-[9px] font-black px-4 py-1 rounded-full uppercase italic tracking-widest">
                            {{ $moto->categorieMoto }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-black italic uppercase text-gray-900 leading-tight">{{ $moto->name }}</h3>
                        <div class="text-right">
                            <span class="text-xl font-black text-orange-600 italic leading-none">{{ $moto->price_per_day }} DH</span>
                            <p class="text-[7px] font-bold text-gray-400 uppercase">Par jour</p>
                        </div>
                    </div>

                    <p class="text-gray-500 text-[10px] mb-6 italic line-clamp-2 uppercase font-medium leading-relaxed">
                        {{ $moto->description }}
                    </p>

                    @auth
                    <form action="{{ route('locations.checkout') }}" method="POST" class="space-y-3 bg-gray-50 p-4 rounded-3xl border border-gray-100 shadow-inner">
                        @csrf
                        <input type="hidden" name="moto_id" value="{{ $moto->id }}">

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-[8px] font-black uppercase text-gray-400 ml-1">Début</label>
                                <input type="date" name="date_debut" required min="{{ date('Y-m-d') }}"
                                    class="w-full bg-white border-none rounded-xl p-2 text-[10px] font-bold shadow-sm focus:ring-2 focus:ring-orange-500 outline-none">
                            </div>
                            <div>
                                <label class="text-[8px] font-black uppercase text-gray-400 ml-1">Fin</label>
                                <input type="date" name="date_fin" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="w-full bg-white border-none rounded-xl p-2 text-[10px] font-bold shadow-sm focus:ring-2 focus:ring-orange-500 outline-none">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-black text-white py-3 rounded-2xl font-black uppercase italic tracking-widest hover:bg-orange-600 transition shadow-lg flex items-center justify-center space-x-2">
                            <span>Vérifier & Réserver</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </button>
                    </form>
                    @else
                    <a href="/login" class="block w-full text-center bg-gray-100 text-gray-400 py-4 rounded-2xl font-black uppercase italic tracking-widest hover:bg-gray-200 transition">
                        <i class="fas fa-lock text-xs mr-2"></i> Connectez-vous
                    </a>
                    @endauth
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-gray-400 font-black italic uppercase tracking-widest">Aucune moto disponible pour le moment.</p>
            </div>
            @endforelse
        </div>
    </section>

    <footer class="bg-black text-white py-10 text-center border-t-4 border-orange-600">
        <div class="container mx-auto px-6 text-center">
            <div class="text-2xl font-black italic uppercase tracking-tighter mb-4 text-orange-600">AtlasMoto</div>
            <p class="text-[9px] text-gray-600 uppercase font-black tracking-[0.4em] italic">&copy; 2026 AtlasMoto. Drive your dream.</p>
        </div>
    </footer>

</body>

</html>