<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
use App\Genre;
use Session;

class MovieController extends Controller
{
	/**
	*GET
	* /movies
	**/
    public function index() {
    	$movies = Movie::orderBy('title')->get();
        return view('movies.index')->with([
            'movies' => $movies
            ]);
    }

   

    /**
    * GET
    * /movies/new
    * Display the form to add a new movie
    */
    public function createNewMovie(Request $request) {

        $actorsForDropdown = Actor::getActorsForDropdown();

        $genresForCheckboxes = Genre::getGenresForCheckboxes();

        return view('movies.new')->with([

            'actorsForDropdown' => $actorsForDropdown,
            'genresForCheckboxes' => $genresForCheckboxes

        ]);
    }


    /**
    * POST
    * /books/new
    * Process the form for adding a new book
    */
    public function storeNewMovie(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'purchase_link' => 'required|url',
            'actor_id' => 'required',
            ]);


        $movie = new Movie();
        $movie->title = $request->title;
        $movie->cover = $request->cover;
        $movie->description = $request->descprition;
        $movie->purchase_link = $request->purchase_link;
        $movie->actor_id = $request->actor_id;
        $movie->save();

        $genres = ($request->genres) ?: [];
        $movie->genres()->sync($genres);
        $movie->save();

        Session::flash('message', 'Your movie ' .$request->title. ' was added to your watchlist.');

        # Redirect the user to the page to view the book
        return redirect('/movies');
    }

    /**
    * GET
    * /movies/search 
    */
    public function search(Request $request){

        $searchResults = [];

        $searchTerm = $request->input('searchTerm', null);

        if($searchTerm) {
            $moviesRawData = file_get_contents(database_path().'/movies.json');

            $movies = json_decode($moviesRawData, true);

            foreach($movies as $title=>$movie) {

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

    /**GET
    * /movies/edit
    *
    */
    public function edit($id) {

        $movie = Movie::with('genres')->find($id);

        if(is_null($movie)) {

            Session::flash('message', 'Movie not found.');
            return redirect('/movies');
        }

           $actorsForDropdown = Actor::getActorsForDropdown();

           $genresForCheckboxes = Genre::getGenresForCheckboxes();

           $genresForThisMovie = [];

           foreach($movie->genres as $genre) {
               $genresForThisMovie[] = $genre->name;
           }

           return view('movies.edit')->with([
                   'id' => $id,
                   'movie' => $movie,
                   'actorsForDropdown' => $actorsForDropdown,
                   'genresForCheckbox' => $genresForCheckboxes,
                   'genresForThisMovie' => $genresForThisMovie,
               ]);

    }

    

    /** POST
    * /movies/edit
    */
    public function saveEdits(Request $request){


        $this->validate($request, [
            'title' => 'required',
            'purchase_link' => 'required|url',
            'actor_id' => 'required',
            ]);

        $movie = Movie::find($request->id);

        $movie->title = $request->title;
        $movie->cover = $request->cover;
        $movie->description = $request->descprition;
        $movie->purchase_link = $request->purchase_link;
        $movie->actor_id = $request->actor_id;

        if($request->genres) {
            $genres = $request->genres;
        }

        else {
            $genres = [];
        }

        $movie->genres()->sync($genres);
        $movie->save();

        Session::flash('message', 'Your changes to '.$movie->title.' were saved');
        return redirect('/movies/edit/' .$request->id);

    }

    /** GET
    * Confirm deletion
    */

    public function confirmDeletion($id) {

        $movie = Movie::find($id);

        if(!$movie) {

            Session::flash('message', 'Movie not found');
            return redirect('/movies');

        }

        return view('movies.delete')->with('movie', $movie);
    }

    /** POST
    * Delete Move
    */

    public function delete(Request $request) {

        $movie = Movie::find($movie->id);

        if(!$movie) {

            Session::flash('message', 'Deletion failed; movie not found');
            return redirect('/movies');

        }

        $movie->genres()->detach();

        $movie->delete();

        Session::flash('message', $movie->title.' was deleted.');
        return redirect('/movies');
    }

}
