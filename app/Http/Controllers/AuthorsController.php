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

        return response()->json($authors, 200);
    }
    //show one author
    public function show($id) {
        $author = Author::findorfail($id);

        return response()->json($author, 200);
    }
    //create
    public function create(Request $request) {
        
    }
    //update an author
    public function update() {

    }
    //delete an author
    public function delete() {

    }
}
