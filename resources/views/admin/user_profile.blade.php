<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <a href="{{ $user->role === 'admin' ? route('dashboard') : route('home') }}"
        class="absolute top-6 left-6 text-gray-900 hover:text-orange-600 transition font-black text-xs uppercase italic">
        <i class="fas fa-arrow-left mr-2"></i>
        Retour au {{ $user->role === 'admin' ? 'Dashboard' : 'Site' }}
    </a>

    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full overflow-hidden m-4 border border-gray-100">

        <div class="bg-black p-10 text-center relative">
            <div class="inline-flex items-center justify-center w-24 h-24 {{ $user->role === 'admin' ? 'bg-orange-600' : 'bg-gray-800' }} text-white text-4xl font-black italic rounded-full shadow-xl border-4 border-white mb-4 uppercase">
                {{ substr($user->firstname, 0, 1) }}
            </div>

            <h2 class="text-white text-3xl font-black uppercase italic flex items-center justify-center gap-3">
                {{ $user->firstname }} {{ $user->lastname }}
                @if($user->role === 'admin')
                <span class="text-[10px] bg-red-600 text-white px-3 py-1 rounded-full not-italic tracking-widest">ADMIN</span>
                @endif
            </h2>

            <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-2 italic">
                Membre de la communauté <span class="text-orange-500 font-black">AtlasMoto</span>
            </p>
        </div>

        <div class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic tracking-tighter">Prénom</label>
                    <p class="text-gray-800 font-bold border-b border-gray-100 pb-2 text-lg">{{ $user->firstname }}</p>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic tracking-tighter">Nom</label>
                    <p class="text-gray-800 font-bold border-b border-gray-100 pb-2 text-lg">{{ $user->lastname }}</p>
                </div>

                <div class="md:col-span-2 space-y-1">
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic tracking-tighter">Adresse Email</label>
                    <p class="text-gray-800 font-bold border-b border-gray-100 pb-2 text-lg">{{ $user->email }}</p>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic tracking-tighter">Type de compte</label>
                    <p class="text-orange-600 font-black uppercase italic">{{ $user->role }}</p>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic tracking-tighter">Date d'inscription</label>
                    <p class="text-gray-800 font-bold italic">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <div class="pt-6 flex flex-col md:flex-row gap-4">
                @if($user->role === 'admin')
                <a href="{{ route('profile.edit') }}" class="flex-1 bg-orange-600 text-white py-4 rounded-xl text-center font-black uppercase italic text-xs hover:bg-black transition shadow-lg transform active:scale-95">
                    <i class="fas fa-edit mr-2"></i> Modifier mon profil
                </a>
                @else
                <a href="{{ route('profile.edit') }}" class="flex-1 bg-black text-white py-4 rounded-xl text-center font-black uppercase italic text-xs hover:bg-orange-600 transition shadow-lg transform active:scale-95">
                    <i class="fas fa-edit mr-2"></i> modifier mon profil
                </a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-gray-100 text-red-600 py-4 rounded-xl font-black uppercase italic text-xs hover:bg-red-600 hover:text-white transition border border-red-100 shadow-sm">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-gray-50 p-4 text-center border-t border-gray-100">
            <p class="text-[9px] text-gray-400 font-black uppercase tracking-[0.2em]">AtlasMoto Digital Solution &copy; 2026</p>
        </div>
    </div>

</body>

</html>