<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Accueil - Louer une Moto au Maroc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?q=80&w=1974&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-gray-50">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-black text-gray-800 italic uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </div>

            <div class="hidden md:flex space-x-8 font-bold text-[11px] text-gray-700 uppercase tracking-widest italic">
                <a href="{{ route('home') }}" class="text-orange-600 border-b-2 border-orange-500">Accueil</a>
                <a href="{{ route('locations') }}" class="hover:text-orange-600 transition">Location</a>
                <a href="{{ route('accessoires.user') }}" class="hover:text-orange-600 transition">Boutique</a>
                @auth
                <a href="{{ route('user.commandes') }}" class="hover:text-orange-600 transition">Mes commandes</a> @endauth
            </div>

            <div class="flex items-center space-x-4">
                @auth
                <a href="{{ route('panier') }}" class="text-gray-700 hover:text-orange-600 relative transition mr-2">
                    <i class="fas fa-shopping-basket text-lg"></i>
                    <span class="absolute -top-2 -right-2 bg-black text-white text-[9px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
                <a href="{{ route('profile.show') }}" class="w-10 h-10 bg-orange-600 text-white rounded-full flex items-center justify-center font-black italic shadow-lg uppercase border-2 border-white">
                    {{ substr(Auth::user()->firstname, 0, 1) }}
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-600 transition ml-2">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="text-gray-700 font-bold text-[10px] hover:text-orange-600 uppercase tracking-widest italic">Connexion</a>
                <a href="{{ route('register') }}" class="bg-orange-600 text-white px-6 py-2 rounded-full font-black text-[10px] hover:bg-black transition shadow-lg uppercase italic tracking-widest">S'inscrire</a>
                @endguest
            </div>
        </div>
    </nav>

    <header class="hero-gradient h-[85vh] flex items-center justify-center text-center text-white px-4 relative">
        <div class="max-w-4xl">
            @auth
            <p class="text-orange-500 font-black uppercase tracking-[0.3em] mb-4 italic text-sm">
                Ravi de vous revoir, {{ Auth::user()->firstname }} !
            </p>
            @endauth
            <h1 class="text-6xl md:text-8xl font-black italic uppercase mb-6 tracking-tighter leading-none">
                Libérez <span class="text-orange-500">l'Esprit</span> <br> de l'Atlas
            </h1>
            <p class="text-lg mb-12 text-gray-200 max-w-2xl mx-auto font-medium italic opacity-90">
                Louez la machine parfaite pour vos expéditions au Maroc.
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="{{ route('locations') }}" class="bg-orange-600 hover:bg-white hover:text-black text-white px-12 py-5 rounded-xl font-black uppercase transition-all shadow-2xl italic tracking-widest text-sm">
                    Louer une Moto
                </a>
                <a href="{{ route('accessoires.user') }}" class="bg-white/10 backdrop-blur-md hover:bg-white hover:text-black text-white px-12 py-5 rounded-xl font-black uppercase transition-all shadow-2xl italic tracking-widest text-sm border border-white/20">
                    Visiter la Boutique
                </a>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 -mt-16 relative z-10">
        <div class="bg-white p-8 rounded-3xl shadow-2xl flex flex-wrap gap-8 items-end border border-gray-100">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-[10px] font-black text-gray-400 uppercase mb-3 tracking-[0.2em] italic">Point de départ</label>
                <div class="relative">
                    <i class="fas fa-map-marker-alt absolute left-0 bottom-3 text-orange-600"></i>
                    <select class="w-full border-b-2 border-gray-100 py-2 pl-6 focus:border-orange-500 outline-none text-gray-800 font-bold uppercase italic text-xs cursor-pointer bg-transparent">
                        <option>Marrakech - Agence Centrale</option>
                        <option>Casablanca - Port</option>
                        <option>Agadir - Aéroport</option>
                        <option>Tanger - Marina</option>
                    </select>
                </div>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-[10px] font-black text-gray-400 uppercase mb-3 tracking-[0.2em] italic">Dates du Roadtrip</label>
                <div class="relative">
                    <i class="fas fa-calendar-alt absolute left-0 bottom-3 text-orange-600"></i>
                    <input type="text" placeholder="Sélectionnez vos dates" class="w-full border-b-2 border-gray-100 py-2 pl-6 focus:border-orange-500 outline-none text-gray-800 font-bold italic text-xs placeholder:font-normal bg-transparent">
                </div>
            </div>
            <button class="bg-black text-white px-12 py-5 rounded-2xl font-black uppercase italic text-[11px] tracking-widest hover:bg-orange-600 transition w-full md:w-auto shadow-xl active:scale-95">
                VÉRIFIER DISPONIBILITÉ
            </button>
        </div>
    </div>

    <section class="py-24 container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 border-l-8 border-orange-600 pl-8">
            <div>
                <h2 class="text-5xl font-black text-gray-900 uppercase italic leading-none tracking-tighter">Nos <span class="text-orange-600">Machines</span></h2>
                <p class="text-gray-400 mt-4 font-bold uppercase tracking-[0.3em] text-[10px] italic">Cliquez sur une moto pour voir les détails.</p>
            </div>
            <a href="{{ route('locations') }}" class="hidden md:flex items-center space-x-3 border-2 border-black px-10 py-4 font-black italic uppercase text-[10px] tracking-widest hover:bg-black hover:text-white transition group">
                <span>VOIR LE CATALOGUE COMPLET</span>
                <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform text-orange-600"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @forelse($motos as $moto)
            <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100">

                <a href="{{ route('moto.show', $moto->id) }}" class="block h-80 overflow-hidden relative">
                    <img src="{{ $moto->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                    <div class="absolute top-8 left-8">
                        <span class="bg-orange-600 text-white text-[9px] font-black px-5 py-2 rounded-full italic uppercase tracking-widest">
                            {{ $moto->categorieMoto }}
                        </span>
                    </div>
                </a>

                <div class="p-10">
                    <a href="{{ route('moto.show', $moto->id) }}">
                        <h3 class="text-2xl font-black italic uppercase text-gray-900 leading-tight hover:text-orange-600 transition mb-4">
                            {{ $moto->name }}
                        </h3>
                    </a>

                    <p class="text-gray-400 text-xs mb-8 font-medium italic leading-relaxed line-clamp-2">
                        {{ $moto->description }}
                    </p>

                    <div class="flex justify-between items-center border-t border-gray-50 pt-8">
                        <div>
                            <span class="text-3xl font-black text-gray-900 italic">{{ $moto->price_per_day }} DH</span>
                            <p class="text-[9px] font-black text-gray-400 uppercase italic tracking-widest">Par jour</p>
                        </div>

                        <a href="{{ route('moto.show', $moto->id) }}" class="w-16 h-16 bg-black text-white rounded-[1.5rem] flex items-center justify-center hover:bg-orange-600 transition-all duration-300 shadow-2xl">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-gray-100 rounded-[3rem]">
                <p class="text-gray-400 font-black italic uppercase tracking-widest">Aucune moto disponible pour le moment.</p>
            </div>
            @endforelse
        </div>
    </section>

    <footer class="bg-black text-white py-10 text-center border-t-4 border-orange-600">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="text-center md:text-left">
                    <div class="text-4xl font-black italic mb-4 uppercase tracking-tighter">ATLAS<span class="text-orange-600">MOTO</span></div>
                    <p class="text-gray-500 max-w-sm mb-6 text-xs italic font-medium leading-relaxed">
                        L'aventure commence là où s'arrête le bitume. Expert de la location moto et équipement technique au Maroc depuis 2026.
                    </p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="w-12 h-12 bg-white/5 rounded-full flex items-center justify-center hover:bg-orange-600 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-12 h-12 bg-white/5 rounded-full flex items-center justify-center hover:bg-orange-600 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-12 h-12 bg-white/5 rounded-full flex items-center justify-center hover:bg-orange-600 transition"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="text-[9px] text-gray-600 uppercase font-black tracking-[0.4em] italic">
                &copy; 2026 AtlasMoto Digital Solutions.
            </div>
        </div>
    </footer>

</body>

</html>