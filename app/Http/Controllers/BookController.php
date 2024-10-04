<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
        ]);
        Book::create($validatedData);

        return redirect()->route('books.index');
    }

    public function edit(Book $book): View
    {
        return view('books.form', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
        ]);
        $book->update($validatedData);

        return redirect()->route('books.index');
    }
}
