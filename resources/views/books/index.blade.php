@extends('layouts.app')

@section('title', 'Documents')

@section('icon')
    <i class="fas fa-book-open text-orange-400 text-2xl"></i>
@endsection

@section('topbar_tabs')
<div class="bg-orange-500 text-white px-6 py-3 flex justify-center space-x-6 text-center">
    <a href="{{ route('books.index', ['type' => 'livre']) }}"
       class="{{ $type === 'livre' ? 'border-b-4 border-white pb-1' : 'hover:underline' }} w-1/3">
        Livre
    </a>
    <a href="{{ route('books.index', ['type' => 'magazine']) }}"
       class="{{ $type === 'magazine' ? 'border-b-4 border-white pb-1' : 'hover:underline' }} w-1/3">
        Magazine
    </a>
    <a href="{{ route('books.index', ['type' => 'dictionnaire']) }}"
       class="{{ $type === 'dictionnaire' ? 'border-b-4 border-white pb-1' : 'hover:underline' }} w-1/3">
        Dictionnaire
    </a>
</div>
@endsection

@section('content')
<div class="container mx-auto">

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full mt-3 border text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2">Titre</th>
                <th class="p-2">Auteur</th>
                <th class="p-2">Catégorie</th>
                <th class="p-2">Année</th>
                <th class="p-2">Type</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-2">{{ $book->title }}</td>
                <td class="p-2">{{ $book->author }}</td>
                <td class="p-2">{{ $book->category }}</td>
                <td class="p-2">{{ $book->published_year }}</td>
                <td class="p-2">{{ $book->status->name ?? '—' }}</td>
                <td class="p-2">
                    <a href="#" class="text-blue-600 hover:underline">Modifier</a>
                    <a href="#" class="text-red-600 hover:underline ml-2">Supprimer</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-gray-500 p-4">Aucun document trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
