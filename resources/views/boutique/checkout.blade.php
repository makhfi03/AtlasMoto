<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Boutique | AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow-sm py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black italic uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </a>
            <span class="text-[10px] font-black uppercase italic text-gray-400">Étape Finale : Paiement Sécurisé</span>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 max-w-4xl">
        <div class="bg-white rounded-[3rem] shadow-xl overflow-hidden border border-gray-100">
            <div class="flex flex-col md:flex-row">
                
                <div class="md:w-1/2 p-10 border-b md:border-b-0 md:border-r border-gray-100">
                    <h2 class="text-xl font-black uppercase italic mb-8">Votre <span class="text-orange-600">Commande</span></h2>
                    
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2">
                        @foreach($panier as $item)
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex-shrink-0 p-2 border border-gray-100">
                                <img src="{{ $item['image'] }}" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-black uppercase italic leading-tight">{{ $item['nom'] }}</h4>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Qté: {{ $item['quantite'] }}</p>
                            </div>
                            <div class="text-sm font-black italic">
                                {{ number_format($item['prix'] * $item['quantite'], 2) }} DH
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-10 pt-6 border-t border-dashed border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 font-black uppercase italic text-xs">Total à régler</span>
                            <span class="text-2xl font-black italic text-orange-600">{{ number_format($total, 2) }} DH</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 p-10 bg-gray-50 flex flex-col justify-center">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-lock text-xl"></i>
                        </div>
                        <h3 class="text-lg font-black uppercase italic">Paiement Sécurisé</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase italic tracking-widest">Type : {{ ucfirst($shipping_type) }}</p>
                    </div>

                    <form action="{{ route('locations.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="type" value="accessoires">
                        <input type="hidden" name="shipping_type" value="{{ $shipping_type }}">

                        <button type="submit" class="w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic tracking-[0.2em] hover:bg-orange-600 transition-all duration-300 shadow-xl active:scale-95 flex items-center justify-center gap-3 group">
                            Procéder au paiement
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </button>
                    </form>
                    
                    <p class="mt-6 text-[8px] text-center text-gray-400 font-bold uppercase leading-relaxed px-4 italic opacity-60">
                        Paiement via Stripe pour AtlasMoto.
                    </p>
                </div>

            </div>
        </div>
    </main>

</body>
</html>