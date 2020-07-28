<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorsController extends Controller
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

    //all authors
    public function index() {
        $authors = Author::all();

        return response()->json(['data' => $authors], 200);
    }
    //show one author
    public function show($id) {
        $author = Author::findorfail($id);

        return response()->json(['data' => $author], 200);
    }
    //create
    public function create(Request $request) {
        $author = Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'area_of_interest' => $request->aoi,
        ]);

        return response()->json(['data' => $author, 'message' => 'Author Added successfully'], 201);
    }
    //update an author
    public function update(Request $request, $id) {
        $author = Author::findorfail($id);

        $author->update($request->all());
        
        return response()->json(['data' => $author, 'message' => 'Update Successful'], 201);
    }
    //delete an author
    public function delete($id) {
        $author = Author::findorfail($id);

        $author->delete();

        return response()->json(['message' => 'author deleted successfully']);
    }

    public function author_books($id){
        $author = Author::findorfail($id);

        $author_books = $author->books;

        return response()->json(['data' => $author_books], 200);
    }
}
