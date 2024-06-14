<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function userDashboard()
    {
        $books = Book::paginate(10);
        return view('userdashboard', compact('books'));
    }
    
    public function index()
    {
        $books = Book::paginate(10);
        return view('index', compact('books'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publication_year' => 'required|integer|between:1000,' . date('Y'),
            'isbn' => 'required|string|max:13|unique:books,isbn',
        ]);

        Book::create($request->all());
        return redirect()->route('index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publication_year' => 'required|integer|between:1000,' . date('Y'),
            'isbn' => 'required|string|max:13|unique:books,isbn,' . $book->id,
        ]);

        $book->update($request->all());
        return redirect()->route('index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('index')->with('success', 'Book deleted successfully.');
    }
}
