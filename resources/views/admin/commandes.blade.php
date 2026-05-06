@extends('layouts.admin')
@section('title', 'Gestion Commandes')

@section('content')
<h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6 mb-10">Commandes <span class="text-orange-600">Boutique</span></h2>

<div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-100 text-[10px] font-black uppercase text-gray-400 italic">
            <tr>
                <th class="p-6 tracking-widest">Client</th>
                <th class="p-6 tracking-widest">Articles (Détails)</th>
                <th class="p-6 tracking-widest">Total</th>
                <th class="p-6 tracking-widest">Statut</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($commandes as $c)
            <tr class="hover:bg-gray-50/50 transition">
                <td class="px-6 py-4">
                    <div class="flex flex-col">
                        <span class="font-black uppercase italic text-gray-900">{{ $c->user->firstname }} {{ $c->user->lastname }}</span>
                        <span class="text-[10px] text-gray-400 font-bold tracking-tight">{{ $c->user->email }}</span>
                    </div>
                </td>
                
                <td class="px-6 py-4">
                    <div class="space-y-1">
                        @foreach($c->accessoires as $article)
                        <div class="flex items-center text-[11px] font-bold uppercase italic text-gray-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-2"></span>
                            {{ $article->nom }} 
                            <span class="ml-2 text-black font-black bg-gray-100 px-2 py-0.5 rounded-md">x{{ $article->pivot->quantite }}</span>
                        </div>
                        @endforeach
                    </div>
                </td>

                <td class="px-6 py-4 font-black text-gray-900 italic">
                    {{ number_format($c->total, 2) }} DH
                </td>
                
                <td class="px-6 py-4">
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase italic 
                        {{ $c->statut === 'payé' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                        {{ $c->statut }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection