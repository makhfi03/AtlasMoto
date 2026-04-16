<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Gestion Réservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 flex min-h-screen">

    <aside class="w-64 bg-black text-white hidden md:flex flex-col sticky top-0 h-screen shadow-2xl">
        <div class="p-8 text-2xl font-black italic uppercase">Atlas<span class="text-orange-600">Moto</span></div>
        <nav class="flex-1 px-4 mt-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-4 rounded-xl text-gray-400 hover:bg-orange-600 hover:text-white transition">
                <i class="fas fa-th-large text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Dashboard</span>
            </a>
            <a href="{{ route('admin.motos') }}" class="flex items-center space-x-3 p-4 rounded-xl text-gray-400 hover:bg-orange-600 hover:text-white transition">
                <i class="fas fa-motorcycle text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Gestion Motos</span>
            </a>
            <a href="{{ route('admin.reservations') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-orange-600 text-white shadow-lg">
                <i class="fas fa-calendar-alt text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Réservations</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white h-16 shadow-sm flex items-center justify-between px-8">
            <div></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-black italic uppercase text-red-500 hover:text-red-700">Déconnexion</button>
            </form>
        </header>

        <main class="p-8">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6">
                    Suivi des <span class="text-orange-600">Réservations</span>
                </h2>
                <div class="bg-black text-white px-6 py-2 rounded-2xl font-black uppercase italic text-[10px] tracking-widest">
                    {{ $locations->count() }} Location(s)
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="p-6 text-[10px] font-black uppercase italic text-gray-400 tracking-widest">Client</th>
                            <th class="p-6 text-[10px] font-black uppercase italic text-gray-400 tracking-widest">Moto</th>
                            <th class="p-6 text-[10px] font-black uppercase italic text-gray-400 tracking-widest">Période</th>
                            <th class="p-6 text-[10px] font-black uppercase italic text-gray-400 tracking-widest">Total</th>
                            <th class="p-6 text-[10px] font-black uppercase italic text-gray-400 tracking-widest">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($locations as $location)
                        <tr class="hover:bg-orange-50/30 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-black italic border-2 border-orange-600 text-xs">
                                        {{ substr($location->user->firstname, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-xs font-black uppercase italic text-gray-800">{{ $location->user->firstname }} {{ $location->user->lastname }}</p>
                                        <p class="text-[9px] text-gray-400 font-bold uppercase">{{ $location->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="text-xs font-black uppercase italic text-gray-700">{{ $location->moto->name }}</span>
                                <p class="text-[9px] text-orange-600 font-bold uppercase italic">{{ $location->moto->immatriculation }}</p>
                            </td>
                            <td class="p-6">
                                <div class="text-[10px] font-bold text-gray-500 uppercase italic leading-tight">
                                    Du <span class="text-gray-900">{{ \Carbon\Carbon::parse($location->date_debut)->format('d/m/Y') }}</span><br>
                                    Au <span class="text-gray-900">{{ \Carbon\Carbon::parse($location->date_fin)->format('d/m/Y') }}</span>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="text-sm font-black text-gray-900 italic">{{ number_format($location->prix_total, 2) }} DH</span>
                            </td>
                            <td class="p-6">
                                <span class="px-4 py-1.5 rounded-full text-[8px] font-black uppercase italic tracking-widest bg-green-100 text-green-600">
                                    <i class="fas fa-check-circle mr-1"></i> Confirmée
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-20 text-center">
                                <i class="fas fa-calendar-times text-4xl text-gray-200 mb-4 block"></i>
                                <p class="text-gray-400 font-black italic uppercase tracking-widest text-xs">Aucune réservation pour le moment</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>