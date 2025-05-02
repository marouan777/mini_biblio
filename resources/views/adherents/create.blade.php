@extends('layouts.app')

@section('title', 'Adhérents')
@section('topbar_tabs')
    <div class="bg-orange-500 text-white px-6 py-3 flex justify-center text-center space-x-6">
        <a href="{{ route('adherents.create', 'etudiant') }}" class="{{ request()->is('adherents/etudiant') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Étudiant</a>
        <a href="{{ route('adherents.create', 'professeur') }}" class="{{ request()->is('adherents/professeur') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Professeur</a>
        <a href="{{ route('adherents.create', 'externe') }}" class="{{ request()->is('adherents/externe') ? 'border-b-4 border-white w-1/3' : 'hover:underline w-1/3' }}">Externe</a>        
    </div>
@endsection
@section('content')
    <h2 class="text-xl font-bold mb-4">Créer un nouvel adhérent</h2>

    <form method="POST" action="{{ route('adherents.store') }}" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Nom complet" class="input" required>
        <input type="email" name="email" placeholder="Email" class="input" required>
        <input type="password" name="password" placeholder="Mot de passe" class="input" required>

        <input type="text" name="cin" placeholder="CIN" class="input">
        <input type="text" name="adresse" placeholder="Adresse" class="input">
        <input type="text" name="telephone" placeholder="Téléphone" class="input">
        <input type="text" name="matiere" placeholder="Matière" class="input">
        <input type="text" name="departement" placeholder="Département" class="input">
        <input type="text" name="filiere" placeholder="Filière" class="input">

        <select name="statut" class="input" required>
            <option value="etudiant">Étudiant</option>
            <option value="professeur">Professeur</option>
            <option value="externe">Externe</option>
        </select>

        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Créer</button>
    </form>
@endsection

@push('styles')
<style>
    .input {
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #d1d5db; /* Equivalent to border-gray-300 */
    }
</style>
@endpush
