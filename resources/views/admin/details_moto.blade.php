<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Détail Véhicule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex min-h-screen">

    <aside class="w-64 bg-black h-screen sticky top-0 hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-black italic text-orange-500 uppercase tracking-tighter">Atlas<span class="text-white">Moto</span></h1>
            <p class="text-gray-500 text-[10px] uppercase font-bold mt-1 tracking-widest">Administration</p>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-4 text-sm font-bold uppercase italic text-gray-400">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-chart-line text-gray-400 group-hover:text-white"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.motos') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-motorcycle text-gray-400 group-hover:text-white"></i> <span>Motos</span>
            </a>
            <a href="{{ route('accessoires') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-helmet-safety"></i> <span>Accessoires</span>
            </a>
            <a href="{{ route('admin.reservations') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-orange-600 hover:text-white transition">
                <i class="fas fa-calendar-alt text-gray-400 group-hover:text-white"></i><span>Réservations</span>
            </a>
            <a href="{{ route('commandes') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-shopping-bag text-gray-400 group-hover:text-white"></i> <span>Commandes</span>
            </a>
            <a href="{{ route('users.admin') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-users text-gray-400 group-hover:text-white"></i> <span>Utilisateurs</span>
            </a>
        </nav>

        <div class="absolute bottom-0 w-full p-6 border-t border-gray-900">
            @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xs font-bold text-gray-500 hover:text-red-600 uppercase ml-2">
                    <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
                </button>
            </form>
            @endauth
        </div>
    </aside>

    <main class="flex-1">
        <header class="bg-white h-16 shadow-sm flex items-center justify-between px-8">
            <a href="{{ route('motos') }}" class="text-xs font-black uppercase text-gray-400 hover:text-orange-600 transition italic">
                <i class="fas fa-arrow-left mr-2"></i> Retour au parc
            </a>
            <div class="text-[10px] font-black italic uppercase tracking-widest text-orange-600">Vehicle_Technical_Sheet_v2</div>
        </header>

        <div class="p-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 h-[400px] relative">
                        <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=800" class="w-full h-full object-cover">
                        <div class="absolute bottom-6 left-6 bg-black/80 backdrop-blur-md text-white p-4 rounded-2xl">
                            <p class="text-[10px] font-black uppercase tracking-widest text-orange-500 italic">Prix Location</p>
                            <p class="text-2xl font-black italic italic">900 DH <span class="text-xs font-normal opacity-60">/ JOUR</span></p>
                        </div>
                    </div>

                    <div class="lg:w-1/2 p-10">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h2 class="text-4xl font-black italic uppercase text-gray-900 leading-none">BMW R1250 GS</h2>
                                <p class="text-gray-400 font-bold mt-2 uppercase text-xs tracking-tighter">Catégorie: Adventure / Trail</p>
                            </div>
                            <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-[10px] font-black uppercase">En Service</span>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-10">
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Immatriculation</label>
                                <p class="font-bold text-gray-800">12345 | A | 07</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Kilométrage</label>
                                <p class="font-bold text-gray-800">12,450 KM</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Ville</label>
                                <p class="font-bold text-gray-800">Marrakech</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Dernière Révision</label>
                                <p class="font-bold text-gray-800 text-orange-600">01/02/2026</p>
                            </div>
                        </div>

                        <div class="mt-10 flex gap-4">
                            <button class="flex-1 bg-black text-white py-4 rounded-2xl font-black uppercase italic tracking-widest hover:bg-orange-600 transition">Modifier Fiche</button>
                            <button class="w-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center hover:bg-red-600 hover:text-white transition shadow-sm border border-red-100">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>