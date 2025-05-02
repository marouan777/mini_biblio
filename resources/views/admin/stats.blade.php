<h2>📚 Livres les plus empruntés</h2>
<ul>
    @foreach ($topBooks as $book)
        <li>{{ $book->title }} ({{ $book->borrow_count }} emprunts)</li>
    @endforeach
</ul>

<h2>👤 Utilisateurs les plus actifs</h2>
<ul>
    @foreach ($topUsers as $user)
        <li>{{ $user->name }} ({{ $user->borrow_count }} emprunts)</li>
    @endforeach
</ul>
