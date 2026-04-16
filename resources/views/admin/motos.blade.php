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
            <a href="{{ route('admin.motos') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-orange-600 text-white shadow-lg">
                <i class="fas fa-motorcycle text-xs"></i>
                <span class="font-black uppercase italic text-[10px] tracking-widest">Gestion Motos</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 ">
        <header class="bg-white h-16 shadow-sm flex items-center justify-end px-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-black italic uppercase text-red-500 hover:text-red-700">
                    Déconnexion
                </button>
            </form>
        </header>

        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6">
                Gestion de la <span class="text-orange-600">Flotte</span>
            </h2>
            <button onclick="openAddModal()" class="bg-black text-white px-6 py-3 rounded-2xl font-black uppercase italic text-xs hover:bg-orange-600 transition shadow-lg">
                + Ajouter une moto
            </button>
        </div>

        <div class="grid grid-cols-1 gap-4">
            @foreach($motos as $moto)
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between group">
                <div class="flex items-center space-x-6">
                    <div class="w-24 h-20 rounded-2xl overflow-hidden border border-gray-100">
                        <img src="{{ $moto->image }}" class="w-full h-full object-cover">
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

                <div class="flex space-x-2">
                    <button onclick='openEditModal({!! json_encode($moto) !!})' class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center">
                        <i class="fas fa-edit text-xs"></i>
                    </button>

                    <form action="{{ route('motos.destroy', $moto->id) }}" method="POST" onsubmit="return confirm('Supprimer cette moto ?')">
                        @csrf @method('DELETE')
                        <button class="w-10 h-10 bg-gray-50 text-gray-300 rounded-xl hover:bg-red-600 hover:text-white transition shadow-sm flex items-center justify-center">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div id="modalContainer" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 items-center justify-center p-4">
            <div class="bg-white w-full max-w-lg rounded-[2.5rem] p-10 relative shadow-2xl">
                <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-black">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <h2 id="modalTitle" class="text-3xl font-black italic uppercase leading-none mb-8 text-gray-900">Ajouter une moto</h2>

                <form id="motoForm" action="" method="POST" class="space-y-4">
                    @csrf <div id="methodContainer"></div>
                    <div class="space-y-4">
                        <input type="text" id="inputNameMoto" name="name" placeholder="Nom" class="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold italic" required>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="number" id="inputPriceDay" name="price_per_day" placeholder="Prix" class="p-4 bg-gray-50 rounded-2xl border-none font-bold italic" required>
                            <input type="number" id="inputKilometrage" name="kilometrage" placeholder="KM" class="p-4 bg-gray-50 rounded-2xl border-none font-bold italic" required>
                        </div>
                        <input type="url" id="inputImageMoto" name="image" placeholder="URL Image" class="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold italic" required>
                        <input type="text" id="inputImmatriculation" name="immatriculation" placeholder="Matricule" class="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold italic" required>
                        <select id="inputCategorieMoto" name="categorieMoto" class="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold italic">
                            <option value="Trail">Trail</option>
                            <option value="Sport">Sport</option>
                            <option value="Scooter">Scooter</option>
                        </select>
                        <textarea id="inputDescription" name="description" placeholder="Description" rows="2" class="w-full p-4 bg-gray-50 rounded-2xl border-none font-bold italic"></textarea>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full bg-black text-white py-4 rounded-2xl font-black uppercase italic hover:bg-orange-600 transition shadow-xl mt-4">
                        Confirmer
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script>
        const modal = document.getElementById('modalContainer');
        const form = document.getElementById('motoForm');
        const title = document.getElementById('modalTitle');
        const methodContainer = document.getElementById('methodContainer');
        const submitBtn = document.getElementById('submitBtn');

        function openAddModal() {
            title.innerHTML = 'Ajouter <br><span class="text-orange-600 underline">une moto</span>';
            form.action = "{{ route('motos.store') }}";
            methodContainer.innerHTML = '';
            submitBtn.innerText = "Enregistrer la Moto";
            form.reset();
            modal.classList.replace('hidden', 'flex');
        }

        function openEditModal(moto) {
            title.innerHTML = 'Modifier <br><span class="text-orange-600 underline">la moto</span>';
            form.action = `/admin/motos/${moto.id}`;
            methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            submitBtn.innerText = "Mettre à jour";

            document.getElementById('inputNameMoto').value = moto.name;
            document.getElementById('inputImageMoto').value = moto.image;
            document.getElementById('inputImmatriculation').value = moto.immatriculation;
            document.getElementById('inputKilometrage').value = moto.kilometrage;
            document.getElementById('inputCategorieMoto').value = moto.categorieMoto;
            document.getElementById('inputPriceDay').value = moto.price_per_day;
            document.getElementById('inputDescription').value = moto.description || '';

            modal.classList.replace('hidden', 'flex');
        }

        function closeModal() {
            modal.classList.replace('flex', 'hidden');
        }
    </script>
</body>

</html>