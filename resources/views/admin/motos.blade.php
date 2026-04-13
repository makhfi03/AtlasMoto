<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | Gestion Flotte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex min-h-screen">

    <aside class="w-64 bg-black text-white hidden md:flex flex-col sticky top-0 h-screen shadow-2xl">
        <div class="p-8 text-2xl font-black italic uppercase">Atlas<span class="text-orange-600">Moto</span></div>
        <nav class="flex-1 px-4 mt-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-4 rounded-xl text-gray-400 hover:bg-orange-600 hover:text-white transition">
                <i class="fas fa-th-large text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Dashboard</span>
            </a>
            <a href="{{ route('motos') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-orange-600 text-white shadow-lg">
                <i class="fas fa-motorcycle text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Gestion Motos</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <h2 class="text-3xl font-black uppercase italic mb-10 text-gray-900 border-l-8 border-orange-600 pl-6">
            Gestion de la <span class="text-orange-600">Flotte</span>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 h-fit sticky top-8">
                <h3 class="font-black uppercase italic text-xs mb-8 text-gray-400">Ajouter un véhicule</h3>
                
                <form action="{{ route('motos.store') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Nom du modèle</label>
                        <input type="text" name="name" placeholder="Ex: Honda Africa Twin" class="w-full border-b py-2 outline-none focus:border-orange-500 font-bold italic text-sm" required>
                    </div>

                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">URL de l'image</label>
                        <input type="url" name="image" placeholder="https://..." class="w-full border-b py-2 outline-none focus:border-orange-500 font-medium italic text-[11px]" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Immatriculation</label>
                            <input type="text" name="immatriculation" placeholder="12345-A-01" class="w-full border-b py-2 outline-none focus:border-orange-500 font-bold text-xs uppercase" required>
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Kilométrage</label>
                            <input type="number" name="kilometrage" placeholder="0" class="w-full border-b py-2 outline-none focus:border-orange-500 font-bold text-xs" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Catégorie</label>
                            <select name="categorieMoto" class="w-full border-b py-2 outline-none font-black italic text-[10px] uppercase cursor-pointer">
                                <option value="Trail">Trail</option>
                                <option value="Sport">Sport</option>
                                <option value="Scooter">Scooter</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Prix / Jour (DH)</label>
                            <input type="number" name="price_per_day" placeholder="800" class="w-full border-b py-2 outline-none focus:border-orange-500 font-bold text-xs" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase italic mb-1">Description</label>
                        <textarea name="description" rows="2" class="w-full border rounded-xl p-3 text-xs italic font-medium outline-none focus:border-orange-500"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-black text-white py-4 rounded-xl font-black uppercase italic text-xs hover:bg-orange-600 transition shadow-lg active:scale-95">
                        Enregistrer la Moto
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 space-y-4">
                @foreach($motos as $moto)
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                    <div class="flex items-center space-x-6">
                        <div class="w-24 h-20 rounded-2xl overflow-hidden border border-gray-100 shadow-inner">
                            <img src="{{ $moto->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div>
                            <h4 class="font-black italic uppercase text-gray-800">{{ $moto->name }}</h4>
                            <div class="flex flex-wrap gap-2 mt-1">
                                <span class="bg-orange-50 text-orange-600 px-2 py-0.5 rounded text-[8px] font-black uppercase italic">{{ $moto->immatriculation }}</span>
                                <span class="text-[9px] font-bold text-gray-400 uppercase italic">{{ $moto->kilometrage }} KM</span>
                                <span class="text-[9px] font-bold text-gray-900 uppercase italic">{{ $moto->price_per_day }} DH/J</span>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('motos.destroy', $moto->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="w-10 h-10 bg-gray-50 text-gray-300 rounded-xl hover:bg-red-600 hover:text-white transition shadow-sm">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>

        </div>
    </main>
</body>
</html>