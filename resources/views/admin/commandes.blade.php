<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex min-h-screen">

    <aside class="w-64 bg-black text-white hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6 text-2xl font-black italic text-orange-500 uppercase tracking-tighter">Atlas<span class="text-white">Moto</span></div>
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
    </aside>

    <main class="flex-1">
        <header class="bg-white h-16 shadow-sm flex items-center justify-end px-8 font-black italic text-[10px] uppercase tracking-widest text-gray-400">Orders_Tracking</header>

        <div class="p-8">
            <div class="mb-10">
                <h2 class="text-3xl font-black italic uppercase italic">Flux des <span class="text-orange-600">Commandes</span></h2>
                <p class="text-gray-400 text-xs mt-1 font-bold">Suivi des locations et ventes en temps réel.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100 text-[10px] font-black uppercase text-gray-400 tracking-widest italic">
                        <tr>
                            <th class="p-6">Réf</th>
                            <th class="p-6">Client</th>
                            <th class="p-6">Type</th>
                            <th class="p-6">Montant</th>
                            <th class="p-6">Statut</th>
                            <th class="p-6">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-bold text-gray-700 uppercase italic">
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition bg-orange-50/30">
                            <td class="p-6 text-orange-600 font-black">#AT-5024</td>
                            <td class="p-6">Mehdi Alami</td>
                            <td class="p-6 text-[10px] text-gray-400 font-black tracking-tighter italic">Location (Africa Twin)</td>
                            <td class="p-6 font-black italic text-gray-900">2,400 DH</td>
                            <td class="p-6">
                                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-[10px] font-black uppercase italic animate-pulse">
                                    En Attente
                                </span>
                            </td>
                            <td class="p-6 text-gray-400 italic">Aujourd'hui</td>
                            <td class="p-6">
                                <div class="flex space-x-2">
                                    <button title="Confirmer la commande" class="bg-green-500 hover:bg-green-600 text-white w-8 h-8 rounded shadow-lg transition flex items-center justify-center">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="p-6 text-gray-400 font-black">#AT-5022</td>
                            <td class="p-6">Yassine Amrani</td>
                            <td class="p-6 text-[10px] text-gray-400 font-black tracking-tighter italic italic">Vente (Casque AGV)</td>
                            <td class="p-6 font-black italic text-gray-900 italic">4,200 DH</td>
                            <td class="p-6">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase italic">
                                    Confirmé
                                </span>
                            </td>
                            <td class="p-6 text-gray-400 italic">Hier</td>
                            <td class="p-6">
                                <button class="text-gray-300 cursor-not-allowed">
                                    <i class="fas fa-check-double text-xs"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>