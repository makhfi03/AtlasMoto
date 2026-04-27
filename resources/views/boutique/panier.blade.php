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

        @php $total = 0; @endphp

        @if(session('panier') && count(session('panier')) > 0)
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="lg:w-2/3 space-y-6">
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
                    <form action="{{ route('panier.supprimer', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
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
                                <span>{{ number_format($total, 2) }} DH</span>
                            </div>
                            <div class="py-6 border-y border-white/10 space-y-4">
                                <label class="flex items-center justify-between cursor-pointer">
                                    <input type="radio" name="shipping_type" value="retrait" checked onchange="updateTotal(0)">
                                    <span>Retrait en magasin</span>
                                    <span class="text-[9px] text-green-400 border border-green-400/30 px-2 py-1 rounded-lg">GRATUIT</span>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer">
                                    <input type="radio" name="shipping_type" value="livraison" onchange="updateTotal(50)">
                                    <span>Livraison à domicile</span>
                                    <span class="text-[10px] text-orange-500">+ 50.00 DH</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-between items-end mb-10">
                            <span class="font-black uppercase italic text-sm">Total TTC</span>
                            <span id="final-total" class="text-4xl font-black italic text-orange-500">{{ number_format($total, 2) }} DH</span>
                        </div>
                        <button type="submit" class="w-full bg-orange-600 text-white py-6 rounded-2xl font-black uppercase italic hover:bg-white hover:text-black transition">
                            Confirmer & Payer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-[3rem] py-24 text-center border border-gray-100 shadow-sm">
            <h2 class="text-2xl font-black uppercase italic mb-2">Votre panier est vide</h2>
            <a href="{{ route('accessoires.user') }}" class="inline-block bg-black text-white px-10 py-5 rounded-2xl font-black uppercase italic text-xs hover:bg-orange-600 transition">
                Découvrir la boutique
            </a>
        </div>
        @endif
    </main>

    <script>
        const sousTotalInitial = {
            {
                $total
            }
        };

        function updateTotal(frais) {
            const total = sousTotalInitial + frais;
            document.getElementById('final-total').innerText = total.toFixed(2) + ' DH';
        }
    </script>

</body>

</html>