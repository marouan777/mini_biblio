<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function index_status($type = null)
    {
        $books = Book::whereHas('status', function ($q) use ($type) {
            if ($type) {
                $q->where('name', $type);
            }
        })->get();

        return view('books.index', compact('books', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('success', 'Livre ajouté.');
    }
    /**
     * Display the specified resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }





    public function store_u(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'published_year' => 'required|integer',
            'category' => 'required|string',
            'type' => 'required|in:livre,magazine,dictionnaire',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_year' => $request->published_year,
            'category' => $request->category,
        ]);

        $book->status()->create(['name' => $request->type]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès.');
    }
}
