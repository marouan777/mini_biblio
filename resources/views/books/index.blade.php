@extends('layouts.app')

@section('content')
<form method="GET" action="{{ route('books.index') }}" class="mb-4">
    <input type="text" name="search" placeholder="Titre, auteur, catégorie" value="{{ request('search') }}">
    <select name="status">
        <option value="">-- Tous les statuts --</option>
        <option value="disponible" {{ request('status') == 'disponible' ? 'selected' : '' }}>Disponible</option>
        <option value="emprunté" {{ request('status') == 'emprunté' ? 'selected' : '' }}>Emprunté</option>
    </select>
    <button type="submit">Rechercher</button>
</form>
    <div class="container">
        <h1>Liste des livres</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Ajouter un livre</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Année de publication</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>{{ $book->status }}</td>
                        <td>
                            @if ($book->status === 'disponible')
                                <a href="{{ route('books.borrow', $book->id) }}" class="btn btn-success">Emprunter</a>
                            @else
                                <button class="btn btn-secondary" disabled>Emprunté</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
