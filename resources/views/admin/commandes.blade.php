@extends('layouts.admin')
@section('title', 'Gestion Commandes')

@section('content')
<h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6">Commandes</h2>

<div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-100 text-[10px] font-black uppercase text-gray-400 italic">
            <tr>
                <th class="p-6 tracking-widest">Client</th>
                <th class="p-6 tracking-widest">Articles</th>
                <th class="p-6 tracking-widest">Total</th>
                <th class="p-6 tracking-widest">Statut</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($commandes as $c)
            <tr>
                <td class="px-6 py-4 font-bold">{{ $c->user->firstname }}</td>
                <td class="px-6 py-4">...</td>
                <td class="px-6 py-4 font-black text-orange-600">{{ $c->total }} DH</td>
                <td class="px-6 py-4"><span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700">{{ $c->statut }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection