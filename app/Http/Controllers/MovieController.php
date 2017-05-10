<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
	/**
	*GET
	* /books
	**/
    public function index() {
    	return 'View all the movies';
    }

    /**
    *GET
    * /books{$title?}
    **/
    public function view($title = null ) {
    	return 'You want to view the movie ' .$title;
    }
}
