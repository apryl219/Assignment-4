<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $genres = ['comedy', 'family', 'romance', 'drama', 'adventure', 'biography'];

            foreach($genres as $genreName) {
                $genre = new Genre();
                $genre->name = $genreName;
                $genre->save();
            }
        }
}
