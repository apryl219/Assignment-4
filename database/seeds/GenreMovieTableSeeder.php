<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Genre;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $movies =[
            'The Sandlot' => ['comedy', 'family'],
            'A League of Their Own' => ['comedy','family','drama'],
            'Sully' => ['biography','drama'],
            'You\'ve Got Mail' => ['comedy', 'romance', 'drama'],
            'Sleepless in Seattle' => ['comedy', 'romance', 'drama'],
            'When Harry Met Sally' => ['comedy', 'romance', 'drama'],
            'Parental Guidance' => ['comedy', 'family'],
            'Dead Poets Society' => ['comedy', 'drama'],
            'Hook' => ['comedy', 'family', 'adventure'],
            'Grumpy Old Men' => ['comedy', 'romance', 'drama'],
            'Grumpier Old Men' => ['comedy', 'romance'],
            'Out to Sea' => ['comedy', 'romance']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($movies as $title => $genres) {

            # First get the book
            $movie = Movie::where('title','like',$title)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach($genres as $genreName) {
                $genre = Genre::where('name','LIKE',$genreName)->first();

                # Connect this tag to this book
                $movie->genres()->save($genre);
            }

        }
    }
}
