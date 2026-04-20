<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $moto->name }} | Détails AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow-sm py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black italic uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </a>
            <a href="{{ route('home') }}" class="text-[10px] font-black uppercase italic text-gray-400 hover:text-orange-600 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour à la flotte
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row items-center">
            
            <div class="md:w-2/5 p-6 flex justify-center items-center bg-gray-50 h-full self-stretch relative">
                <div class="w-full aspect-square bg-white rounded-3xl shadow-inner border border-gray-100 flex justify-center items-center p-4 overflow-hidden">
                    <img src="{{ $moto->image }}"
                         alt="{{ $moto->name }}" 
                         class="max-w-full max-h-full object-contain"> </div>
                
                <div class="absolute top-8 left-8">
                    <span class="bg-black text-white text-[8px] font-black px-4 py-2 rounded-full italic uppercase tracking-widest shadow-lg border border-orange-600">
                        {{ $moto->status }}
                    </span>
                </div>
            </div>

            <div class="md:w-3/5 p-8 md:p-10 flex flex-col h-full self-stretch">
                <div class="mb-2">
                    <span class="text-orange-600 font-black uppercase italic tracking-[0.3em] text-[9px]">
                        {{ $moto->categorieMoto }}
                    </span>
                </div>

                <h1 class="text-3xl md:text-4xl font-black italic uppercase leading-none mb-6 tracking-tighter">
                    {{ $moto->name }}
                </h1>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 text-center">
                        <p class="text-[8px] font-black text-gray-400 uppercase italic mb-1">Kilométrage</p>
                        <p class="text-md font-black text-gray-800 italic">{{ number_format($moto->kilometrage, 0, ',', ' ') }} KM</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 text-center">
                        <p class="text-[8px] font-black text-gray-400 uppercase italic mb-1">Prix / Jour</p>
                        <p class="text-md font-black text-orange-600 italic">{{ $moto->price_per_day }} DH</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-[9px] font-black uppercase italic text-gray-400 mb-2 tracking-widest border-b border-gray-100 pb-1">Description</h3>
                    <p class="text-gray-500 italic leading-relaxed text-xs">
                        {{ $moto->description ?? "Découvrez le plaisir de rouler avec cette machine d'exception, entretenue selon les plus hauts standards." }}
                    </p>
                </div>

                <div class="mt-auto">
                    @auth
                        <form action="{{ route('locations.checkout') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="moto_id" value="{{ $moto->id }}">
                            
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div>
                                    <label class="text-[8px] font-black uppercase text-gray-400 ml-1">Début</label>
                                    <input type="date" name="date_debut" required min="{{ date('Y-m-d') }}" 
                                           class="w-full bg-gray-50 border border-gray-100 rounded-xl p-2.5 text-[10px] font-bold outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                                <div>
                                    <label class="text-[8px] font-black uppercase text-gray-400 ml-1">Fin</label>
                                    <input type="date" name="date_fin" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" 
                                           class="w-full bg-gray-50 border border-gray-100 rounded-xl p-2.5 text-[10px] font-bold outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-black text-white py-4 rounded-2xl font-black uppercase italic tracking-[0.2em] hover:bg-orange-600 transition-all duration-300 shadow-xl active:scale-95 flex items-center justify-center gap-3 text-xs">
                                <i class="fas fa-motorcycle"></i>
                                Réserver maintenant
                            </button>
                        </form>
                    @else
                        <div class="bg-orange-50 p-5 rounded-3xl border border-orange-100 text-center">
                            <p class="text-orange-900 font-bold italic uppercase text-[9px] mb-3">Connectez-vous pour louer cette moto</p>
                            <a href="{{ route('login') }}" class="inline-block bg-black text-white px-8 py-3 rounded-xl font-black uppercase italic text-[10px] shadow-md hover:bg-orange-600 transition">
                                Connexion
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="flex items-center justify-center gap-5 mt-6 opacity-40">
                    <div class="flex items-center gap-1.5 text-[8px] font-black uppercase italic">
                        <i class="fas fa-shield-alt text-orange-600"></i> Assurance complète
                    </div>
                    <div class="flex items-center gap-1.5 text-[8px] font-black uppercase italic">
                        <i class="fas fa-gas-pump text-orange-600"></i> Plein fait
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-8 text-center opacity-30">
        <p class="text-[8px] font-black uppercase italic tracking-[0.5em]">
            &copy; 2026 AtlasMoto - Premium Experience
        </p>
    </footer>

</body>
</html>