<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
	/**
	*GET
	* /movies
	**/
    public function index() {
    	return 'View all the movies';
    }

    /**
    *GET
    * /movies{$title?}
    **/
    public function view($title = null ) {
    	return view('movies.show')->with([
            'title' => $title,
        ]);
    }

    /**
    * GET
    * /movies/new
    * Display the form to add a new movie
    */
    public function createNewMovie(Request $request) {
        return view('movies.new');
    }


    /**
    * POST
    * /movies/new
    * Process the form for adding a new movie
    */
    public function storeNewMovie(Request $request) {

        $this->validate($request, [
            'title' => 'required'
            ]);
        $title = $request->input('title');

        # 
        #
        # [...Code will eventually go here to actually save this movie to a database...]
        #
        #

        # Redirect the user to the page to view the move
        return redirect('movies/'.$title);
    }

    /**
    * GET
    * /movies/search  <----THIS FUNCTION IS USING THE MOVIES.JSON FOR THE DATABASE NOT FOR A4 DELETE
    */
    public function search(Request $request){

        $searchResults = [];

        $searchTerm = $request->input('searchTerm', null);

        if($searchTerm) {
            $moviesRawData = file_get_contents(database_path().'/movies.json');

            $movies = json_decode($moviesRawData, true);

            foreach($movies as $title => $movie) {

                if($request->has('caseSensitive')) {
                    $match = $title == $searchTerm;
                }
                 else {
                    $match = strtolower($title) == strtolower($searchTerm);
                }   
                if($match) {
                    $searchResults[$title] = $movie;
                }
            }
            
        }

        return view('movies.search')->with([
            'searchTerm' => $searchTerm,
            'caseSensitive' => $request->has('caseSensitive'),
            'searchResults' => $searchResults
            ]);
    }
}
