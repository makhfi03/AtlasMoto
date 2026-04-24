@extends('layouts.admin')
@section('title', 'Gestion Clients')

@section('content')
<div class="mb-10">
    <h2 class="text-3xl font-black uppercase italic text-gray-900 border-l-8 border-orange-600 pl-6">
        Liste des <span class="text-orange-600">Clients</span>
    </h2>
</div>

<div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-100 text-[10px] font-black uppercase text-gray-400 italic">
            <tr>
                <th class="p-6 tracking-widest">Client</th>
                <th class="p-6 tracking-widest">Email</th>
                <th class="p-6 tracking-widest">Date d'inscription</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($clients as $client)
            <tr class="hover:bg-orange-50/30 transition-colors">
                <td class="p-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-black italic border-2 border-orange-600 text-xs">
                            {{ strtoupper(substr($client->firstname, 0, 1)) }}
                        </div>
                        <span class="text-xs font-black uppercase italic text-gray-800">
                            {{ $client->firstname }} {{ $client->lastname }}
                        </span>
                    </div>
                </td>
                <td class="p-6 text-xs font-bold text-gray-500 uppercase italic">
                    {{ $client->email }}
                </td>
                <td class="p-6 text-xs font-bold text-gray-400 italic">
                    {{ $client->created_at ? $client->created_at->format('d/m/Y') : 'N/A' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-20 text-center text-gray-400 italic font-bold uppercase tracking-widest">
                    Aucun client trouvé.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection