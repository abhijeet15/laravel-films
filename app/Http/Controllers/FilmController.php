<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// -- Models
use App\Models\Film;
use App\Models\Country;
use App\Models\Genre;

// -- Request
use App\Http\Requests\FilmRequest;

use Auth;
use Form;

class FilmController extends Controller
{
    public function index( $from_film_slug = "", $film_slug = "" )
    {
        /*return view( "film.list", 
        	[ 'film' => Film::orderBy('id', 'desc')
        					->paginate( 1 )
        						->toArray() ] );*/
// echo "<pre>"; print_r( $film_slug ); echo "</pre>";

        if( empty( $film_slug ) )
            $film_slug = Film::orderBy('id', 'desc')->first( );

        return view( "film.list", [ 
                'film' => $film_slug,
                'next' => $film_slug->previous( ), 
                'previous' => $film_slug->next( ),
            ] );
    }

    public function details( Film $film_slug )
    {
    	return view( "film.details", 
            [ 'film' => $film_slug ] );
    }

    public function create( )
    {
        $data = [
            'country_list' => Country::all( ),
            'genre_list' => Genre::all( ),
        ];
        return view( "film.create", $data );
    }

    public function store( FilmRequest $request )
    {
        $data = [
            // "user_id"       => Auth::user()->id,
            "name"          => $request->input( "name" ),
            "description"   => $request->input( "description" ),
            "release_date"  => $request->input( "release_date" ),
            "rating"        => $request->input( "rating" ),
            "ticket_price"  => $request->input( "ticket_price" ),
            "country_id"    => $request->input( "country_id" ),
        ];

        $imageName = time( ).'.'.$request->photo->getClientOriginalExtension( );

        $request->photo->move( public_path( config( "app.film_image_path" ) ), $imageName );

        $film = new Film();
        $film->name         = $request->input( "name" );
        $film->description  = $request->input( "description" );
        $film->release_date = $request->input( "release_date" );
        $film->rating       = $request->input( "rating" );
        $film->ticket_price = $request->input( "ticket_price" );
        $film->country_id   = $request->input( "country_id" );
        $film->photo        = $imageName;
        $film->save( );
        $film->genres()->attach( $request->input( "genre" ) );
        return back()->with('success', 'Film details saved successfully...');
    }
}
