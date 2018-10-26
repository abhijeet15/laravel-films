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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get( '/films/create', 'FilmController@create' )->name("films_create");
Route::post( '/films/create', 'FilmController@store' );

Route::get( '/', 'FilmController@index' )->name( 'home' );
Route::get( '/{from_film_slug}/{film_slug}/films', 'FilmController@index' );
Route::get( '/films', 'FilmController@index' );
Route::get( '/films/{film_slug}', 'FilmController@details' );


Route::group([ 'middleware' => 'auth' ], function( ){
	Route::post( '/films/{film_slug}', 'CommentController@store' );
} );
