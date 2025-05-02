@extends('layouts.app')

@section('title', 'Adhérents')
@section('topbar_tabs')
    <div class="bg-orange-500 text-white px-6 py-3 flex justify-center text-center space-x-6">
        <a href="{{ route('adherents.index_status', 'etudiant') }}" class="{{ request()->is('adherents/etudiant') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Étudiant</a>
        <a href="{{ route('adherents.index_status', 'professeur') }}" class="{{ request()->is('adherents/professeur') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Professeur</a>
        <a href="{{ route('adherents.index_status', 'externe') }}" class="{{ request()->is('adherents/externe') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Externe</a>        
    </div>
@endsection

@section('content')
    <h1 class="text-xl font-bold mb-4">Liste des {{ $statut ?? 'adhérents' }}</h1>

    <table class="w-full border text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2">Nom</th>
                <th class="p-2">Email</th>
                <th class="p-2">CIN</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adherents as $user)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->cin ?? '—' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-400">Aucun adhérent trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
