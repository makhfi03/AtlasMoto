<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Créer un compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen py-10">

    <a href="/" class="absolute top-6 left-6 text-white hover:text-orange-500 transition font-bold text-sm uppercase">
        <i class="fas fa-arrow-left mr-2"></i> Retour à l'accueil
    </a>

    <div class="bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row max-w-5xl w-full overflow-hidden m-4">
        
        <div class="hidden md:flex md:w-2/5 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=500');">
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
            <div class="relative z-10 p-10 flex flex-col justify-end h-full text-white">
                <h2 class="text-3xl font-black italic uppercase italic">Atlas<span class="text-orange-500">Moto</span></h2>
                <p class="text-sm mt-2 font-medium">Prêt pour votre prochaine virée ? Créez votre profil en 2 minutes.</p>
            </div>
        </div>

        <div class="w-full md:w-3/5 p-8 md:p-12">
            <div class="mb-8 text-center md:text-left">
                <h2 class="text-3xl font-black text-gray-900 uppercase italic">Inscription</h2>
                <p class="text-gray-400 text-sm mt-1">Rejoignez l'aventure AtlasMoto.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                @if ($errors->any())
                    <div class="md:col-span-2 bg-red-50 border-l-4 border-red-500 p-4 mb-2">
                        <ul class="text-red-600 text-xs font-bold uppercase italic">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-triangle mr-2"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nom</label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" required 
                           class="w-full border-b-2 border-gray-100 focus:border-orange-500 outline-none py-2 text-gray-700 font-semibold" 
                           placeholder="Ex: Bennani">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Prenom</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" required 
                           class="w-full border-b-2 border-gray-100 focus:border-orange-500 outline-none py-2 text-gray-700 font-semibold" 
                           placeholder="Ex: Ahmed">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full border-b-2 border-gray-100 focus:border-orange-500 outline-none py-2 text-gray-700 font-semibold" 
                           placeholder="ahmed@mail.com">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Mot de passe</label>
                    <input type="password" name="password" required 
                           class="w-full border-b-2 border-gray-100 focus:border-orange-500 outline-none py-2 text-gray-700 font-semibold" 
                           placeholder="••••••••">
                </div>

                <div class="md:col-span-2 mt-4">
                    <button type="submit" class="w-full bg-orange-600 text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-black transition shadow-lg transform active:scale-95">
                        Créer mon compte
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Déjà inscrit ? 
                    <a href="{{ route('login') }}" class="text-orange-600 font-bold hover:underline">Se connecter ici</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>