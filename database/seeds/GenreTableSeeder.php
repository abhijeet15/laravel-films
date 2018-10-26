<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$genres = factory( App\Models\Genre::class, 3 )->create( );

		App\Models\Film::All( )->each( function ( $film ) use ( $genres ){
			$film->genres( )->saveMany( $genres );
		});
	}
}
