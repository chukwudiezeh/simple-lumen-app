<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
    public function index() 
    {
        $authors = Author::all();

        //Check if any author has been added and returns the appropriate response
        if ($authors->isEmpty())
        {
            $data = ['message' => 'No authors added Yet! Lets add some authors.'];
            return response()->json(['data'=>$data],404);
        }
        else{
            return response()->json(['data' => $authors], 200);
        }

    }

    //show one author
    public function show($author) 
    {
        $author = Author::find($author);
        if ($author !== null)
        {
            return response()->json(['data' => $author], 200);
        }
        else
        {
            $data = ['message' => 'This author does not exist in our database.'];
            return response()->json(['data'=>$data],404);
        }

    }

    //create
    public function create(Request $request) 
    {
        $author = Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'area_of_interest' => $request->aoi
        ]);
        return response()->json(['data' => [$author, 'message' => 'Author Added successfully']], 201);
    }

    
    //update an author
    public function update(Request $request, $author) 
    {
        $authorr = Author::find($author);

        $authorr->update($request->all());
        
        return response()->json(['data' => $authorr, 'message' => 'Update Successful'], 201);
    }


    //delete an author
    public function delete($author) 
    {
        $authorr = Author::find($author);

        $authorr->delete();

        return response()->json(['message' => 'author deleted successfully']);
    }

    public function author_books($id){
        $author = Author::find($id);

        $author_books = $author->books;

        return response()->json(['data' => $author_books], 200);
    }
}
