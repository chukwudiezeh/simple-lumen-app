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
    public function index()
    {
        $books = Book::all();

        //Check if any book has been added and returns the appropriate response
        if($books->isEmpty())
        {
            $data = ['message' => 'No books added Yet! Lets add some books.'];
            return response()->json(['data'=>$data],404);
        }
        else
        {
            return response()->json(['data' => $books], 200);
        }
    }

    //show one book
    public function show($id)
    {
        $book = Book::find($id);
        if ($book !== null)
        {
        return response()->json(['data' => $book], 200);

        }
        else
        {
            $data = ['message' => 'This book does not exist in our database.'];
            return response()->json(['data'=>$data],404);
        }

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
        $book = Book::find($id);
        
        $book->update($request->all());

        return response()->json(['data' => $book, 'message' => 'Book updated successfully'], 201);
    }
    
    //delete one book
    public function delete($id){
        $book = Book::find($id);

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

    public function book_author($id){
        $book = Book::find($id);

        $book_author = $book->author;

        return response()->json(['data' => $book_author], 200);
    }

}