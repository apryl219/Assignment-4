<?php

use Illuminate\Database\Seeder;
use App\Actor;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors = [
        	['Patrick', 'Renna', 1979, 'http://www.imdb.com/name/nm0719606/'],
        	['Tom', 'Hanks', 1956, 'http://www.imdb.com/name/nm0000158/?ref_=fn_al_nm_1'],
        	['Geena', 'Davis', 1956, 'http://www.imdb.com/name/nm0000133/?ref_=fn_al_nm_1'],
        	['Meg', 'Ryan', 1961, 'http://www.imdb.com/name/nm0000212/?ref_=nv_sr_1'],	
        	['Billy', 'Crystal', 1948, 'http://www.imdb.com/name/nm0000345/?ref_=nv_sr_1'],	
        	['Bette', 'Midler', 1945, 'http://www.imdb.com/name/nm0000541/?ref_=nv_sr_1'],	
        	['Robbin', 'Williams', 1951, 'http://www.imdb.com/name/nm0000245/?ref_=nv_sr_1'],	
        	['Walter', 'Matthau', 1920, 'http://www.imdb.com/name/nm0000527/?ref_=nv_sr_1'],	
        	['Jack', 'Lemmon', 1925, 'http://www.imdb.com/name/nm0000493/?ref_=nv_sr_1'],	
        ];

        # Initiate a new timestamp we can use for created_at/updated_at fields
            $timestamp = Carbon\Carbon::now()->subDays(count($actors));

            # Loop through each author, adding them to the database
            foreach($actors as $actor) {

                # Set the created_at/updated_at for each book to be one day less than
                # the book before. That way each book will have unique timestamps.
                $timestampForThisActor = $timestamp->addDay()->toDateTimeString();
                Actor::insert([
                    'created_at' => $timestampForThisActor,
                    'updated_at' => $timestampForThisActor,
                    'first_name' => $actor[0],
                    'last_name' => $actor[1],
                    'birth_year' => $actor[2],
                    'bio_url' => $actor[3],
                ]);
            }
        
    }
}
