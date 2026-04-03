<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex">

    <aside class="w-64 bg-black h-screen sticky top-0 hidden md:block">
        <div class="p-6">
            <h1 class="text-2xl font-black italic text-orange-500 uppercase tracking-tighter">Atlas<span class="text-white">Moto</span></h1>
            <p class="text-gray-500 text-[10px] uppercase font-bold mt-1 tracking-widest">Administration</p>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-4 text-sm font-bold uppercase italic text-gray-400">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-chart-line text-gray-400 group-hover:text-white"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('motos') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-motorcycle text-gray-400 group-hover:text-white"></i> <span>Motos</span>
            </a>
            <a href="{{ route('accessoires') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 transition font-bold group italic">
                <i class="fas fa-helmet-safety"></i> <span>Accessoires</span>
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

    <main class="flex-1 p-8">

        <header class="flex justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-black text-gray-800 uppercase italic">Dashboard</h2>
                <p class="text-gray-500">Bienvenue, Administrateur.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="bg-white p-2 rounded-full shadow-sm hover:text-orange-500 transition">
                    <i class="fas fa-bell"></i>
                </button>

                <a href="{{ route('profile.show') }}"
                    class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold hover:bg-black hover:scale-105 transition-all shadow-md uppercase">
                    {{ substr(Auth::user()->firstname, 0, 1) }}
                </a>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-orange-500">
                <p class="text-gray-400 text-xs font-bold uppercase">Motos Louées</p>
                <h3 class="text-2xl font-black text-gray-800">12 / 45</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-black">
                <p class="text-gray-400 text-xs font-bold uppercase">Ventes Accessoires</p>
                <h3 class="text-2xl font-black text-gray-800">14,200 <span class="text-sm font-normal">DH</span></h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
                <p class="text-gray-400 text-xs font-bold uppercase">Nouveaux Clients</p>
                <h3 class="text-2xl font-black text-gray-800">+24</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-green-500">
                <p class="text-gray-400 text-xs font-bold uppercase">Commandes en cours</p>
                <h3 class="text-2xl font-black text-gray-800">08</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h3 class="font-black text-gray-800 uppercase italic">Dernières Réservations de Motos</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase font-black">
                        <tr>
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Moto</th>
                            <th class="px-6 py-4">Période</th>
                            <th class="px-6 py-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        <tr>
                            <td class="px-6 py-4 font-bold text-gray-700">Yassine Amrani</td>
                            <td class="px-6 py-4 text-gray-500 italic">BMW R1250 GS</td>
                            <td class="px-6 py-4 text-gray-500">12/03 - 15/03</td>
                            <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">Confirmé</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold text-gray-700">Sarah Chraibi</td>
                            <td class="px-6 py-4 text-gray-500 italic">Yamaha T-MAX</td>
                            <td class="px-6 py-4 text-gray-500">14/03 - 14/03</td>
                            <td class="px-6 py-4"><span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">En attente</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

</html>