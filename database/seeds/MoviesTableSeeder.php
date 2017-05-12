<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Actor;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $movies = json_decode(file_get_contents(database_path().'/movies.json'), True);
               # Initiate a new timestamp we can use for created_at/updated_at fields
        $timestamp = Carbon\Carbon::now()->subDays(count($movies));

        foreach($movies as $title => $movie) {

                $name = explode(' ', $movie['actor']);
                $lastName = array_pop($name);

                
                $actor_id = Actor::where('last_name', '=', $lastName)->pluck('id')->first();

                $timestampForThisMovie = $timestamp->addDay()->toDateTimeString();
                Movie::insert([
                    'created_at' => $timestampForThisMovie,
                    'updated_at' => $timestampForThisMovie,
                    'title' => $title,
                    'cover' => $movie['cover'],
                    'actor_id' => $actor_id, 
                    'description' => $movie['description'],
                    'purchase_link' => $movie['purchase_link'],
                ]);

            }

         
    }
}
