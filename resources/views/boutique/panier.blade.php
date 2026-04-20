<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier | AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow-sm py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black italic uppercase tracking-tighter">
                Atlas<span class="text-orange-600">Moto</span>
            </a>
            <a href="{{ route('accessoires.user') }}" class="text-[10px] font-black uppercase italic text-gray-400 hover:text-orange-600 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Continuer mes achats
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-black italic uppercase mb-10 tracking-tighter">
            Mon <span class="text-orange-600">Panier</span>
        </h1>

        @if(session('panier') && count(session('panier')) > 0)
            <div class="flex flex-col lg:flex-row gap-12">
                
                <div class="lg:w-2/3 space-y-6">
                    @php $total = 0; @endphp
                    @foreach(session('panier') as $id => $details)
                        @php $total += $details['prix'] * $details['quantite']; @endphp
                        <div class="bg-white rounded-[2.5rem] p-6 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center gap-6">
                            <div class="w-32 h-32 bg-gray-50 rounded-3xl overflow-hidden flex items-center justify-center p-2">
                                <img src="{{ $details['image'] }}" alt="{{ $details['nom'] }}" class="max-h-full object-contain">
                            </div>

                            <div class="flex-1 text-center md:text-left">
                                <h3 class="text-xl font-black uppercase italic">{{ $details['nom'] }}</h3>
                                <p class="text-orange-600 font-bold italic">{{ number_format($details['prix'], 2) }} DH</p>
                            </div>

                            <div class="flex items-center gap-6">
                                <div class="bg-gray-50 px-4 py-2 rounded-2xl border border-gray-100 font-black italic text-sm text-gray-400">
                                    Qté: <span class="text-black">{{ $details['quantite'] }}</span>
                                </div>
                                <div class="text-right min-w-[100px]">
                                    <p class="text-lg font-black italic">{{ number_format($details['prix'] * $details['quantite'], 2) }} DH</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="lg:w-1/3">
                    <div class="bg-black text-white rounded-[3rem] p-10 shadow-2xl sticky top-32 border-4 border-white/5">
                        <h2 class="text-xl font-black uppercase italic mb-8 border-b border-white/10 pb-4">Résumé</h2>
                        
                        <form action="{{ route('boutique.checkout') }}" method="POST">
                            @csrf
                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between text-gray-400 font-bold uppercase italic text-[10px] tracking-widest">
                                    <span>Sous-total</span>
                                    <span class="text-white">{{ number_format($total, 2) }} DH</span>
                                </div>

                                <div class="py-6 border-y border-white/10 space-y-4">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-orange-500">Mode de réception</p>
                                    
                                    <label class="flex items-center justify-between cursor-pointer group">
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="shipping_type" value="retrait" checked 
                                                   class="w-4 h-4 accent-orange-600" onchange="updateTotal(0)">
                                            <span class="text-xs font-bold uppercase italic group-hover:text-orange-500 transition">Retrait en magasin</span>
                                        </div>
                                        <span class="text-[9px] font-black text-green-400 border border-green-400/30 px-2 py-1 rounded-lg italic">GRATUIT</span>
                                    </label>

                                    <label class="flex items-center justify-between cursor-pointer group">
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="shipping_type" value="livraison" 
                                                   class="w-4 h-4 accent-orange-600" onchange="updateTotal(50)">
                                            <span class="text-xs font-bold uppercase italic group-hover:text-orange-500 transition">Livraison à domicile</span>
                                        </div>
                                        <span class="text-[10px] font-black text-orange-500 italic">+ 50.00 DH</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between items-end mb-10">
                                <span class="font-black uppercase italic text-sm">Total TTC</span>
                                <div class="text-right">
                                    <span id="final-total" class="text-4xl font-black italic text-orange-500 block">
                                        {{ number_format($total, 2) }} DH
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-orange-600 text-white py-6 rounded-2xl font-black uppercase italic tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-500 shadow-xl active:scale-95 flex items-center justify-center gap-3">
                                <i class="fas fa-credit-card"></i>
                                Confirmer & Payer
                            </button>
                        </form>

                        <div class="mt-8 flex items-center justify-center gap-4 opacity-20 grayscale">
                            <i class="fab fa-cc-visa text-2xl"></i>
                            <i class="fab fa-cc-mastercard text-2xl"></i>
                            <i class="fab fa-cc-stripe text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-[3rem] py-24 text-center border border-gray-100 shadow-sm">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shopping-basket text-4xl text-gray-200"></i>
                </div>
                <h2 class="text-2xl font-black uppercase italic mb-2">Votre panier est vide</h2>
                <p class="text-gray-400 font-bold uppercase italic text-[10px] tracking-widest mb-10 leading-relaxed px-6">Il semble que vous n'ayez pas encore choisi d'équipement pour votre prochaine sortie.</p>
                <a href="{{ route('accessoires.user') }}" class="inline-block bg-black text-white px-10 py-5 rounded-2xl font-black uppercase italic text-xs tracking-widest hover:bg-orange-600 transition-all duration-300 shadow-lg active:scale-95">
                    Découvrir la boutique
                </a>
            </div>
        @endif
    </main>

    <script>
        /**
         * Met à jour dynamiquement l'affichage du total TTC
         * en fonction des frais de livraison choisis.
         */
        function updateTotal(shippingCost) {
            const baseTotal = {{ $total }};
            const finalTotal = baseTotal + shippingCost;
            
            // Formatage du prix en DH avec 2 décimales
            const formattedTotal = new Intl.NumberFormat('fr-FR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(finalTotal);

            document.getElementById('final-total').innerText = formattedTotal + ' DH';
        }
    </script>

    <footer class="py-12 text-center opacity-30">
        <p class="text-[8px] font-black uppercase italic tracking-[0.5em]">
            &copy; 2026 AtlasMoto - Système de paiement sécurisé Stripe
        </p>
    </footer>

</body>
</html>