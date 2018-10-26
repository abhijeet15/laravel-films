<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmGenreRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('film_genre', function (Blueprint $table) {

            $table->unsignedInteger( 'film_id' );
            $table->foreign( 'film_id' )->references( 'id' )->on( 'films' );

            $table->unsignedInteger( 'genre_id' );
            $table->foreign( 'genre_id' )->references( 'id' )->on( 'genres' );

            $table->index('film_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_genre');
    }
}
