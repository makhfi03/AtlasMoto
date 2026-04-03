<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Modifier Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden m-4 border border-gray-100">
        <div class="bg-black p-6 text-center">
            <h2 class="text-white text-xl font-black uppercase italic">Modifier mes informations</h2>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="p-8 space-y-5">
            @csrf
            @method('PUT') <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 italic">Prénom</label>
                <input type="text" name="firstname" value="{{ $user->firstname }}" 
                    class="w-full border-b-2 border-gray-100 py-2 focus:border-orange-500 outline-none font-bold text-gray-800">
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 italic">Nom</label>
                <input type="text" name="lastname" value="{{ $user->lastname }}" 
                    class="w-full border-b-2 border-gray-100 py-2 focus:border-orange-500 outline-none font-bold text-gray-800">
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase mb-1 italic">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" 
                    class="w-full border-b-2 border-gray-100 py-2 focus:border-orange-500 outline-none font-bold text-gray-800">
            </div>

            <div class="pt-4 flex gap-3">
                <a href="{{ route('profile.show') }}" class="flex-1 bg-gray-100 text-gray-500 py-3 rounded-lg text-center font-black uppercase italic text-xs hover:bg-gray-200 transition">
                    Annuler
                </a>
                <button type="submit" class="flex-1 bg-orange-600 text-white py-3 rounded-lg font-black uppercase italic text-xs hover:bg-black transition shadow-lg">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>

</body>
</html>