<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/movies', function(){
	return 'View all the movies';
});

Route::get('/movies/{title?}', function($title = null) {
	if($title == null) {
		return 'You need to specify a movie title';
	}
	return "You want to view the movie " .$title;
});



Route::get('/', function () {
    return view('welcome');
});
