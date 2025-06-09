<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Str;

class BookController extends Controller
{
    // Display all books
   // In BookController.php
public function index()
{
    $books = Book::all();

    return $books->map(function ($book) {
        if ($book->cover_image) {
            $book->cover_image = url('storage/images/' . $book->cover_image);
        }
        return $book;
    });
}


    // Store a new book with cover image
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string',
            'page_count' => 'nullable|integer',
            'language' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move image directly to public/storage/images
            $image->move(public_path('storage/images'), $imageName);

            $validated['cover_image'] = $imageName;
        }

        $validated['id_code'] = Str::uuid();
        $book = Book::create($validated);

        return redirect('/postContent/book')->with('success', 'Book added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('postContent.books.editBook', compact('book'));
    }

    // Update book with new cover image
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string',
            'page_count' => 'nullable|integer',
            'language' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete old image from public/storage/images
            if ($book->cover_image && file_exists(public_path('storage/images/' . $book->cover_image))) {
                unlink(public_path('storage/images/' . $book->cover_image));
            }

            $image = $request->file('cover_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/images'), $imageName);
            $validated['cover_image'] = $imageName;
        }

        $book->update($validated);

        return redirect('/postContent/book')->with('success', 'Book updated successfully!');
    }

    // Delete a book and its image
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete cover image from public/storage/images
        if ($book->cover_image && file_exists(public_path('storage/images/' . $book->cover_image))) {
            unlink(public_path('storage/images/' . $book->cover_image));
        }

        $book->delete();

        return redirect('/postContent/book')->with('success', 'Book deleted successfully!');
    }
}
