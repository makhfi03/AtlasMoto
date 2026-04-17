<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Paiement Réussi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-gray-100 relative">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-orange-500/10 rounded-full blur-3xl"></div>
        
        <div class="p-10 text-center relative z-10">
            <div class="w-24 h-24 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-8 shadow-xl shadow-green-200">
                <i class="fas fa-check text-4xl"></i>
            </div>
            
            <h1 class="text-4xl font-black uppercase italic tracking-tighter text-gray-900 leading-none mb-4">
                Paiement <br><span class="text-orange-600">Confirmé !</span>
            </h1>
            
            <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] italic mb-8">
                Votre aventure commence maintenant
            </p>

            <div class="bg-gray-50 rounded-[2rem] p-6 mb-8 border border-dashed border-gray-200 text-left">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-[9px] font-black uppercase text-gray-400 italic">Référence</span>
                    <span class="text-[10px] font-bold text-gray-900">#AM-{{ $location->id }}{{ date('s') }}</span>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-[9px] font-black uppercase text-gray-400 italic">Montant Payé</span>
                        <span class="text-sm font-black italic text-orange-600">{{ number_format($location->prix_total, 2) }} DH</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-[9px] font-black uppercase text-gray-400 italic">Statut</span>
                        <span class="px-3 py-0.5 bg-green-100 text-green-600 text-[8px] font-black uppercase italic rounded-full">Validé</span>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <a href="{{ route('locations') }}" class="block w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic tracking-widest hover:bg-orange-600 transition-all duration-300 shadow-xl shadow-black/10">
                    Retour au catalogue
                </a>
                
                <button onclick="window.print()" class="text-[10px] font-black uppercase text-gray-400 hover:text-gray-900 transition italic tracking-widest">
                    <i class="fas fa-print mr-2"></i> Imprimer le reçu
                </button>
            </div>
        </div>

        <div class="bg-gray-900 py-6 text-center">
            <div class="text-xl font-black italic text-white uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </div>
        </div>
    </div>

</body>
</html>