@extends('layouts.admin')
@section('title', 'Gestion Stock Accessoires')

@section('content')
@if(session('success'))
<div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 font-bold italic text-sm rounded-r-xl">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6">Stock <span class="text-orange-600">Boutique</span></h2>
    </div>
    <button onclick="openAddModal()" class="bg-black text-white px-6 py-3 rounded-2xl font-black uppercase italic text-xs hover:bg-orange-600 transition shadow-lg">
        + Nouvel Article
    </button>
</div>

<div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-100 text-[10px] font-black uppercase text-gray-400 italic">
            <tr>
                <th class="p-6 tracking-widest">Produit</th>
                <th class="p-6 tracking-widest">Catégorie</th>
                <th class="p-6 tracking-widest">Prix</th>
                <th class="p-6 tracking-widest">Stock</th>
                <th class="p-6 tracking-widest text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm font-bold">
            @forelse($accessoires as $acc)
            <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                <td class="p-6 flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-gray-100 border border-gray-200">
                        <img src="{{ $acc->image }}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/100x100?text=Err'">
                    </div>
                    <span class="italic text-gray-800 uppercase tracking-tight">{{ $acc->nom }}</span>
                </td>
                <td class="p-6 uppercase text-[10px] font-black text-gray-400 italic">{{ $acc->categorie }}</td>
                <td class="p-6 font-black text-gray-900">{{ number_format($acc->prix, 2) }} DH</td>
                <td class="p-6">
                    <span class="{{ $acc->stock < 5 ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} px-4 py-1.5 rounded-full text-[10px] font-black italic">
                        {{ $acc->stock < 5 ? 'BAS' : 'OK' }} ({{ sprintf("%02d", $acc->stock) }})
                    </span>
                </td>
                <td class="p-6">
                    <div class="flex justify-center items-center space-x-4">
                        <button onclick="openEditModal({{ json_encode($acc) }})" class="text-gray-400 hover:text-orange-600 transition">
                        <i class="fas fa-edit"></i>
                        </button>

                        <form action="{{ route('accessoires.destroy', $acc->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-300 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-20 text-center text-gray-400 italic font-bold uppercase tracking-widest">Aucun accessoire en stock.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="modalContainer" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white p-10 rounded-[3rem] w-full max-w-lg shadow-2xl relative">
        <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-300 hover:text-black transition">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <h3 id="modalTitle" class="text-3xl font-black italic uppercase mb-8 leading-none">
            Ajouter <br><span class="text-orange-600 underline">un article</span>
        </h3>
        <form id="articleForm" action="{{ route('accessoires.store') }}" method="POST" class="space-y-6">
            @csrf <div id="methodContainer"></div>
            <div>
                <label class="text-[9px] font-black uppercase italic text-gray-400 tracking-[0.2em] mb-2 block">Nom de l'accessoire</label>
                <input type="text" name="nom" id="inputNom" required class="w-full bg-gray-50 p-4 rounded-2xl border-none focus:ring-2 focus:ring-orange-500 font-bold italic">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[9px] font-black uppercase italic text-gray-400 tracking-[0.2em] mb-2 block">Prix (DH)</label>
                    <input type="number" name="prix" id="inputPrix" required class="w-full bg-gray-50 p-4 rounded-2xl border-none focus:ring-2 focus:ring-orange-500 font-bold italic">
                </div>
                <div>
                    <label class="text-[9px] font-black uppercase italic text-gray-400 tracking-[0.2em] mb-2 block">Quantité stock</label>
                    <input type="number" name="stock" id="inputStock" required class="w-full bg-gray-50 p-4 rounded-2xl border-none focus:ring-2 focus:ring-orange-500 font-bold italic">
                </div>
            </div>
            <div>
                <label class="text-[9px] font-black uppercase italic text-gray-400 tracking-[0.2em] mb-2 block">Catégorie</label>
                <select name="categorie" id="inputCategorie" class="w-full bg-gray-50 p-4 rounded-2xl border-none focus:ring-2 focus:ring-orange-500 font-bold italic">
                    <option value="Casques">Casques</option>
                    <option value="Gants">Gants</option>
                    <option value="Protections">Protections</option>
                    <option value="Bagagerie">Bagagerie</option>
                </select>
            </div>
            <div>
                <label class="text-[9px] font-black uppercase italic text-gray-400 tracking-[0.2em] mb-2 block">URL de la photo</label>
                <input type="url" name="image" id="inputImage" required class="w-full bg-gray-50 p-4 rounded-2xl border-none focus:ring-2 focus:ring-orange-500 font-bold italic">
            </div>
            <button type="submit" class="w-full bg-black text-white py-5 rounded-2xl font-black uppercase italic hover:bg-orange-600 transition shadow-xl active:scale-95">
                Confirmer
            </button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('modalContainer');
    const form = document.getElementById('articleForm');
    const title = document.getElementById('modalTitle');
    const methodContainer = document.getElementById('methodContainer');

    function openAddModal() {
        title.innerHTML = 'Ajouter <br><span class="text-orange-600 underline">un article</span>';
        form.action = "{{ route('accessoires.store') }}";
        methodContainer.innerHTML = '';
        form.reset();
        modal.classList.replace('hidden', 'flex');
    }

    function openEditModal(article) {
        title.innerHTML = 'Modifier <br><span class="text-orange-600 underline">l\'article</span>';
        form.action = `/admin/accessoires/${article.id}`;
        methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('inputNom').value = article.nom;
        document.getElementById('inputPrix').value = article.prix;
        document.getElementById('inputStock').value = article.stock;
        document.getElementById('inputCategorie').value = article.categorie;
        document.getElementById('inputImage').value = article.image;
        modal.classList.replace('hidden', 'flex');
    }

    function closeModal() {
        modal.classList.replace('flex', 'hidden');
    }
</script>
@endsection