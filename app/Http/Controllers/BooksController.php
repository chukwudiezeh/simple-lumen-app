<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    //all books
    public function index(){
        $books = Book::all();

        return response()->json(['data' => $books], 200);
    }

    //show one book
    public function show($id){
        $book = Book::findorfail($id);

        return response()->json(['data' => $book], 200);
    }

    //add book
    public function create(Request $request){
        $book = Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author,
        ]);

        return response()->json(['data' => $book, 'message' => 'Book added successfully'], 201);
    }
    
    //update one book
    public function update(Request $request, $id){
        $book = Book::findorfail($id);
        
        $book->update($request->all());

        return response()->json(['data' => $book, 'message' => 'Book updated successfully'], 201);
    }
    
    //delete one book
    public function delete($id){
        $book = Book::findorfail($id);

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

    public function book_author($id){
        $book = Book::findorfail($id);

        $book_author = $book->author;

        return response()->json(['data' => $book_author], 200);
    }

}