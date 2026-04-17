<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Confirmation de Commande</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
        
        <div class="md:w-1/3 bg-black relative p-10 flex flex-col justify-between text-white">
            <div class="z-10">
                <div class="text-2xl font-black italic uppercase mb-2">
                    Atlas<span class="text-orange-600">Moto</span>
                </div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 italic">Checkout Sécurisé</p>
            </div>
            
            <div class="z-10 mt-10">
                <img src="{{ $moto->image }}" alt="{{ $moto->name }}" class="w-full h-48 object-cover rounded-3xl shadow-2xl border-2 border-orange-600 group-hover:scale-105 transition duration-500">
            </div>

            <i class="fas fa-motorcycle absolute -bottom-10 -left-10 text-9xl text-white/5 -rotate-12"></i>
        </div>

        <div class="md:w-2/3 p-10 md:p-16">
            <div class="flex justify-between items-start mb-10">
                <div>
                    <h1 class="text-4xl font-black uppercase italic tracking-tighter text-gray-900 leading-none">
                        Vérifiez votre <br><span class="text-orange-600">Réservation</span>
                    </h1>
                </div>
                <div class="text-right">
                    <span class="text-xs font-black uppercase italic text-gray-400 block">ID MOTO</span>
                    <span class="text-xs font-bold text-gray-900">#{{ $moto->id }}{{ substr($moto->immatriculation, 0, 2) }}</span>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <span class="text-[10px] font-black uppercase text-gray-400 italic tracking-widest">Modèle</span>
                    <span class="text-sm font-black uppercase italic">{{ $moto->name }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4 border-b border-gray-100 pb-4">
                    <div>
                        <span class="text-[10px] font-black uppercase text-gray-400 italic tracking-widest block mb-1">Date de début</span>
                        <span class="text-sm font-bold text-gray-800 italic underline decoration-orange-500 decoration-2">{{ $date_debut }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] font-black uppercase text-gray-400 italic tracking-widest block mb-1">Date de fin</span>
                        <span class="text-sm font-bold text-gray-800 italic underline decoration-orange-500 decoration-2">{{ $date_fin }}</span>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 space-y-3">
                    <div class="flex justify-between text-xs font-bold italic uppercase">
                        <span class="text-gray-500">Tarif par jour</span>
                        <span>{{ number_format($moto->price_per_day, 2) }} DH</span>
                    </div>
                    <div class="flex justify-between text-xs font-bold italic uppercase text-orange-600">
                        <span>Durée totale</span>
                        <span>{{ $jours }} jour(s)</span>
                    </div>
                    <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                        <span class="text-sm font-black uppercase italic">Total à payer</span>
                        <span class="text-3xl font-black italic tracking-tighter text-gray-900">{{ number_format($total, 2) }} DH</span>
                    </div>
                </div>

                <form action="{{ route('locations.payment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="moto_id" value="{{ $moto->id }}">
                    <input type="hidden" name="date_debut" value="{{ $date_debut }}">
                    <input type="hidden" name="date_fin" value="{{ $date_fin }}">
                    <input type="hidden" name="total" value="{{ $total }}">

                    <button type="submit" class="w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic tracking-widest hover:bg-orange-600 transition-all duration-300 shadow-xl flex items-center justify-center group">
                        <i class="fab fa-stripe text-3xl mr-3 group-hover:scale-110 transition"></i>
                        <span>Procéder au paiement</span>
                    </button>
                </form>

                <div class="text-center">
                    <a href="{{ route('locations') }}" class="text-[10px] font-black uppercase text-gray-400 hover:text-red-500 transition italic tracking-widest">
                        <i class="fas fa-arrow-left mr-1"></i> Annuler et modifier les dates
                    </a>
                </div>
            </div>

            <div class="mt-10 flex justify-center space-x-6 opacity-30 grayscale">
                <i class="fab fa-cc-visa text-2xl"></i>
                <i class="fab fa-cc-mastercard text-2xl"></i>
                <i class="fas fa-shield-alt text-2xl"></i>
            </div>
        </div>
    </div>

</body>
</html>