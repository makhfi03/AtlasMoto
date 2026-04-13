<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Utilisateurs</title>
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
            <a href="{{ route('users.admin') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-orange-600 text-white font-bold italic shadow-lg">
                <i class="fas fa-users"></i> <span>Utilisateurs</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1">
        <header class="bg-white h-16 shadow-sm flex items-center justify-end px-8 text-[10px] font-black italic uppercase text-gray-400">User_Database_v2</header>

        <div class="p-8">
            <div class="mb-10 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-black italic uppercase">Gestion <span class="text-orange-600">Clients</span></h2>
                    <p class="text-gray-400 text-xs mt-1 font-bold italic">Base de données des membres de la communauté.</p>
                </div>
                <div class="bg-white p-2 rounded-xl border border-gray-200 shadow-sm">
                    <span class="text-[10px] font-black uppercase px-3 text-gray-400">Total : 128 membres</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-6 text-[10px] font-black uppercase text-gray-400 italic tracking-widest">Utilisateur</th>
                            <th class="p-6 text-[10px] font-black uppercase text-gray-400 italic tracking-widest">Contact</th>
                            <th class="p-6 text-[10px] font-black uppercase text-gray-400 italic tracking-widest">Ville</th>
                            <th class="p-6 text-[10px] font-black uppercase text-gray-400 italic tracking-widest">Rôle</th>
                            <th class="p-6 text-[10px] font-black uppercase text-gray-400 italic tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="p-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-gray-900 text-white rounded-full flex items-center justify-center font-black italic text-xs uppercase ring-4 ring-orange-500/5">AB</div>
                                    <div>
                                        <p class="text-sm font-black text-gray-800 uppercase italic">Ahmed Bennani</p>
                                        <p class="text-[10px] text-orange-600 font-bold uppercase italic">Client Gold</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <p class="text-xs font-bold text-gray-600 italic">ahmed@atlas.ma</p>
                                <p class="text-[10px] text-gray-400 font-medium">+212 661 XX XX XX</p>
                            </td>
                            <td class="p-6">
                                <span class="text-xs font-bold text-gray-500 uppercase italic"><i class="fas fa-map-marker-alt text-orange-500 mr-1"></i> Marrakech</span>
                            </td>
                            <td class="p-6">
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-[9px] font-black uppercase italic">Client</span>
                            </td>
                            <td class="p-6 text-right">
                                <a href="/admin/user-profile" class="inline-block bg-black text-white px-4 py-2 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-orange-600 transition shadow-sm">
                                    Détails
                                </a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition border-l-4 border-l-orange-500">
                            <td class="p-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-orange-600 text-white rounded-full flex items-center justify-center font-black italic text-xs uppercase shadow-md shadow-orange-200">SM</div>
                                    <div>
                                        <p class="text-sm font-black text-gray-800 uppercase italic">Saïd Moto</p>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase italic tracking-tighter">Super Admin</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <p class="text-xs font-bold text-gray-600 italic">admin@atlasmoto.ma</p>
                                <p class="text-[10px] text-gray-400 font-medium">Accès Système</p>
                            </td>
                            <td class="p-6">
                                <span class="text-xs font-bold text-gray-500 uppercase italic">Casablanca</span>
                            </td>
                            <td class="p-6">
                                <span class="bg-orange-500 text-white px-3 py-1 rounded-md text-[9px] font-black uppercase italic shadow-sm">Admin</span>
                            </td>
                            <td class="p-6 text-right text-gray-300">
                                <i class="fas fa-shield-alt text-xs" title="Modifications restreintes"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-400 hover:text-orange-600 transition"><i class="fas fa-chevron-left text-xs"></i></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-orange-600 text-white font-bold text-xs">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-500 font-bold text-xs hover:border-orange-600 transition">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-400 hover:text-orange-600 transition"><i class="fas fa-chevron-right text-xs"></i></button>
                </nav>
            </div>
        </div>
    </main>
</body>

</html>