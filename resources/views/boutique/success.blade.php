<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande Confirmée | AtlasMoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center font-sans">
    <div class="max-w-md w-full bg-white rounded-[3rem] p-12 shadow-2xl text-center border border-gray-100">
        <div class="w-24 h-24 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
            <i class="fas fa-check text-4xl"></i>
        </div>
        
        <h1 class="text-3xl font-black italic uppercase mb-4 tracking-tighter">
            Commande <span class="text-orange-600">Validée !</span>
        </h1>
        <p class="text-gray-400 font-bold uppercase italic text-[10px] tracking-widest mb-10 leading-relaxed">
            Votre équipement est en route. Un e-mail de confirmation vient de vous être envoyé.
        </p>
        
        <div class="space-y-4">
            <a href="{{ route('home') }}" class="block bg-black text-white py-5 rounded-2xl font-black uppercase italic text-xs tracking-[0.2em] hover:bg-orange-600 transition-all duration-300 shadow-xl active:scale-95">
                Retour à l'accueil
            </a>
            <p class="text-[8px] font-black uppercase italic text-gray-300 tracking-[0.3em]">
                Merci de votre confiance
            </p>
        </div>
    </div>
</body>
</html>