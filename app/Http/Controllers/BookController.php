<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::All();
        return view('index-books', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        return view('create-books',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ]);

        if (Author::where('name', '=', $validatedData['author'])->first()) {
            $author_name = Author::where('name', '=', $validatedData['author'])->first();
            $validatedData['author'] = $author_name->id;

            Book::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'category_id' => $validatedData['category_id'],
                'author_id' => $validatedData['author']
            ]);
        }

        else {
            $author = Author::create([
                'name' =>  $validatedData['author']
            ]);

            $author->books()->create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'category_id' => $validatedData['category_id'],
            ]);
        }

        // Book::create([
        //     'title' => $validatedData['title'],
        //     'slug' => $validatedData['slug'],
        //     'category_id' => $validatedData['category_id'],
        //     'author_id' => $validatedData['author_id']
        // ]);

        return redirect()->route('index.books')->with('tambah_data', 'Penambahan Buku Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('show-books', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // $book = Book::findOrFail($slug);
        return view('edit-books', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'author_id' => 'required'
        ]);

        $book->update($validatedData);
        return redirect()->route('index.books')->with('edit_data', 'Pengeditan Buku Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('index.books')->with('hapus_data', 'Penghapusan Buku Berhasil');
    }
}
