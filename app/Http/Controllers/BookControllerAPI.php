<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Category;

class BookControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::All();
        return response()->json([
            'success' => true,
            'message' => 'Data Retrieved',
            'data' => $books
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // Input categery -> ID
        // Input author -> Nama Author
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ]);

        if (Author::where('name', '=', $validatedData['author'])->first()) {
            $author = Author::where('name', '=', $validatedData['author'])->first();
            $validatedData['author'] = $author->id;

            $book = Book::create([
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

            $book = $author->books()->create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'category_id' => $validatedData['category_id'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Stored',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        if (is_null($book)){
            return response()->json([
                'success' => false,
                'message' => '404 not found',
                'data' => $book
            ], 404);
        }

        // try {
        //     $book = Book::findorfail($id);
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        //     return response([
        //         'status' => 'ERROR',
        //         'error' => '404 not found'
        //     ], 404);
        // }

        else{
            return response()->json([
                'success' => true,
                'message' => 'Data Retrieved',
                'data' => $book
            ], 200); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        // Input categery -> ID
        // Input author -> Nama Author
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ]);

        $book = Book::find($id);

        if(isset($book)){
            if (Author::where('name', '=', $validatedData['author'])->first()) {
                $author = Author::where('name', '=', $validatedData['author'])->first();
                $validatedData['author'] = $author->id;
    
                $book->update([
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
                $validatedData['author'] = $author->id;
    
                $book->update([
                    'title' => $validatedData['title'],
                    'slug' => $validatedData['slug'],
                    'category_id' => $validatedData['category_id'],
                    'author_id' => $validatedData['author']
                ]);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Data Updated',
                'data' => $book
            ], 200);
        }

        else{
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(isset($id)){
            $book->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Deleted'
            ], 200);
        }

        else{
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }
    }
}
