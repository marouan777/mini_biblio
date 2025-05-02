<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        // --- Statuts pour les utilisateurs ---
        $userStatuts = ['étudiant', 'professeur', 'externe'];

        foreach (User::all() as $index => $user) {
            $statusName = $userStatuts[$index % count($userStatuts)];
            $user->status()->create(['name' => $statusName]);
        }

        // --- Statuts pour les livres ---
        $bookStatuts = ['livre', 'dictionnaire', 'magazine'];

        foreach (Book::all() as $index => $book) {
            $statusName = $bookStatuts[$index % count($bookStatuts)];
            $book->status()->create(['name' => $statusName]);
        }
    }
}
