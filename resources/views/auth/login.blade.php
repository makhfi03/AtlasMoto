<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Authentification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <a href="/" class="absolute top-6 left-6 text-white hover:text-orange-500 transition font-bold text-sm uppercase">
        <i class="fas fa-arrow-left mr-2"></i> Retour à l'accueil
    </a>

    <div class="bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row max-w-4xl w-full overflow-hidden m-4">
        
        <div class="hidden md:flex md:w-1/2 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=500');">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="relative z-10 p-12 flex flex-col justify-end h-full text-white">
                <h2 class="text-3xl font-black italic uppercase">Atlas<span class="text-orange-500">Moto</span></h2>
                <p class="text-sm mt-2 opacity-80 font-medium">Rejoignez la plus grande communauté de motards au Maroc.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-black text-gray-900 uppercase italic">Connexion</h2>
                <p class="text-gray-400 text-sm mt-1">Heureux de vous revoir parmi nous.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                @error('email')
                    <div class="bg-red-50 text-red-600 p-3 rounded-lg text-xs font-bold uppercase italic border border-red-100">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                    </div>
                @enderror

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Adresse Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-envelope text-xs"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                               class="w-full pl-10 pr-4 py-3 border-b-2 border-gray-100 focus:border-orange-500 outline-none transition-all text-gray-700 font-semibold" 
                               placeholder="votre@email.com">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-xs font-bold text-gray-400 uppercase">Mot de passe</label>
                        <a href="#" class="text-[10px] text-orange-600 font-bold hover:underline">Oublié ?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-lock text-xs"></i>
                        </span>
                        <input type="password" name="password" required 
                               class="w-full pl-10 pr-4 py-3 border-b-2 border-gray-100 focus:border-orange-500 outline-none transition-all text-gray-700 font-semibold" 
                               placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="w-full bg-black text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-orange-600 transition shadow-lg transform active:scale-95">
                    Se Connecter
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="text-orange-600 font-bold hover:underline">Créer un compte AtlasMoto</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>