@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un livre</h1>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Catégorie</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="published_year">Année de publication</label>
                <input type="number" name="published_year" id="published_year" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>
@endsection
