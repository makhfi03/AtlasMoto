<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique Accessoires | AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .shop-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1547544289-51c48f219e8c?q=80&w=2000&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-50">

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
                <a href="#" class="hover:text-orange-600 transition">Mes Commandes</a>
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

    <header class="shop-header h-[40vh] flex items-center justify-center text-center text-white">
        <div class="max-w-4xl px-4">
            <h1 class="text-5xl md:text-7xl font-black italic uppercase mb-4 tracking-tighter">
                L'Équipement <span class="text-orange-500 text-6xl">Pro</span>
            </h1>
            <p class="text-gray-300 font-medium italic uppercase tracking-[0.2em] text-xs">
                Casques, gants et protections pour vos aventures
            </p>
        </div>
    </header>

    <section class="py-20 container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 border-l-8 border-orange-600 pl-8">
            <div>
                <h2 class="text-5xl font-black text-gray-900 uppercase italic leading-none tracking-tighter">Boutique <span class="text-orange-600">Accessoires</span></h2>
                <p class="text-gray-400 mt-4 font-bold uppercase tracking-[0.3em] text-[10px] italic">Matériel technique sélectionné pour la route.</p>
            </div>

            <div class="hidden md:flex gap-4 mt-8 md:mt-0 text-[10px] font-black uppercase italic tracking-widest">
                <span class="text-orange-600 cursor-pointer border-b-2 border-orange-500">Tous</span>
                <span class="text-gray-400 hover:text-black cursor-pointer transition">Casques</span>
                <span class="text-gray-400 hover:text-black cursor-pointer transition">Gants</span>
                <span class="text-gray-400 hover:text-black cursor-pointer transition">Bagagerie</span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @forelse($accessoires as $item)
            <div class="bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100">
                <div class="h-64 rounded-[2rem] overflow-hidden bg-gray-50 relative mb-6">
                    <img src="{{ $item->image }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 backdrop-blur-sm text-black text-[9px] font-black px-4 py-2 rounded-full italic uppercase shadow-sm">
                            {{ $item->categorie }}
                        </span>
                    </div>
                </div>

                <div class="px-4 pb-4 text-center">
                    <h3 class="text-xl font-black uppercase italic text-gray-900 leading-tight mb-2 group-hover:text-orange-600 transition">
                        {{ $item->nom }}
                    </h3>
                    <p class="text-gray-400 text-[10px] font-bold uppercase italic mb-6">Stock : {{ $item->stock }} unités</p>

                    <div class="flex justify-between items-center border-t border-gray-50 pt-6">
                        <div class="text-left">
                            <span class="text-2xl font-black text-gray-900 italic">{{ $item->prix }} DH</span>
                            <p class="text-[8px] font-black text-gray-400 uppercase italic tracking-widest">TTC</p>
                        </div>

                        @auth
                        <button class="w-14 h-14 bg-black text-white rounded-2xl flex items-center justify-center hover:bg-orange-600 transition-all shadow-xl active:scale-90">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="w-14 h-14 bg-gray-100 text-gray-300 rounded-2xl flex items-center justify-center hover:text-orange-600 transition-all shadow-inner">
                            <i class="fas fa-lock"></i>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-gray-100 rounded-[3rem] border-2 border-dashed border-gray-200">
                <i class="fas fa-box-open text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-400 font-black italic uppercase tracking-widest">Le stock arrive bientôt...</p>
            </div>
            @endforelse
        </div>
    </section>

    <footer class="bg-black text-white py-10 text-center border-t-4 border-orange-600">
        <div class="container mx-auto px-6 text-center">
            <div class="text-2xl font-black italic uppercase tracking-tighter mb-4 text-orange-600">AtlasMoto</div>
            <p class="text-[9px] text-gray-600 uppercase font-black tracking-[0.4em] italic">
                &copy; 2026 AtlasMoto Boutique - Équipement de légende
            </p>
        </div>
    </footer>

</body>

</html>