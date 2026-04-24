<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 flex">

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

    <main class="flex-1 flex flex-col items-center justify-center min-h-screen p-8">
        <header class="flex justify-between items-center mb-10">
            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.show') }}" class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold hover:bg-black hover:scale-105 transition-all shadow-md uppercase">
                    {{ substr(Auth::user()->firstname ?? 'A', 0, 1) }}
                </a>
            </div>
        </header>
        <div class="text-center mb-12">
            <h2 class="text-4xl font-black text-gray-800 uppercase italic">Vue d'ensemble</h2>
            <p class="text-gray-500 font-bold mt-2">Bienvenue sur votre espace de pilotage.</p>
        </div>

        <div class="flex flex-wrap justify-center gap-6 w-full max-w-4xl">

            <div class="bg-white p-10 rounded-full w-64 h-64 flex flex-col items-center justify-center shadow-lg border-4 border-orange-500 hover:scale-105 transition-transform">
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Motos Louées</p>
                <h3 class="text-3xl font-black text-gray-800 mt-2">{{ $motosLouees }}</h3>
                <p class="text-[10px] text-gray-500">sur {{ $totalMotos }} totales</p>
            </div>

            <div class="bg-white p-10 rounded-full w-64 h-64 flex flex-col items-center justify-center shadow-lg border-4 border-black hover:scale-105 transition-transform">
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Ventes</p>
                <h3 class="text-2xl font-black text-gray-800 mt-2">{{ number_format($ventesAccessoires, 0, ',', ' ') }}</h3>
                <p class="text-[10px] text-gray-500">DH encaissés</p>
            </div>

            <div class="bg-white p-10 rounded-full w-64 h-64 flex flex-col items-center justify-center shadow-lg border-4 border-blue-500 hover:scale-105 transition-transform">
                <a href="{{ route('users.admin') }}" class="flex flex-col items-center justify-center">
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Clients</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">{{ $totalClients }}</h3>
                    <p class="text-[10px] text-gray-500">Voir la liste</p>
                </a>
            </div>



        </div>
    </main>

</body>

</html>