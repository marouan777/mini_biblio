<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function borrow(Book $book)
    {
        if ($book->status !== 'disponible') {
            return back()->with('error', 'Ce livre est déjà emprunté.');
        }

        // Créer un enregistrement d’emprunt
        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => Carbon::now()->toDateString(),
            'due_at' => Carbon::now()->addDays(14)->toDateString(), // 2 semaines par exemple
        ]);

        // Mettre à jour le statut du livre
        $book->update(['status' => 'emprunté']);

        return back()->with('success', 'Livre emprunté avec succès.');
    }

    public function return(Book $book)
    {
        $borrowing = Borrowing::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->first();

        if (!$borrowing) {
            return back()->with('error', 'Aucun emprunt actif trouvé pour ce livre.');
        }

        $borrowing->update([
            'returned_at' => Carbon::now()->toDateString(),
        ]);

        $book->update(['status' => 'disponible']);

        return back()->with('success', 'Livre rendu avec succès.');
    }

    public function stats()
    {
        // Top 5 livres les plus empruntés
        $topBooks = Book::select('books.id', 'books.title', DB::raw('COUNT(borrowings.id) as borrow_count'))
            ->join('borrowings', 'books.id', '=', 'borrowings.book_id')
            ->groupBy('books.id', 'books.title')
            ->orderByDesc('borrow_count')
            ->take(5)
            ->get();

        // Top 5 utilisateurs les plus actifs
        $topUsers = User::select('users.id', 'users.name', DB::raw('COUNT(borrowings.id) as borrow_count'))
            ->join('borrowings', 'users.id', '=', 'borrowings.user_id')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('borrow_count')
            ->take(5)
            ->get();

        // Affichage des livres en retard
        $overdueBorrowings = Borrowing::with(['book', 'user'])
            ->whereNull('returned_at')
            ->whereDate('due_at', '<', Carbon::now()->toDateString())
            ->get();

        return view('admin.stats', compact('topBooks', 'topUsers'));
    }
}
