<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('films', function (Blueprint $table) {

            $table->increments( 'id' );

            $table->string( 'slug', 150 );
            
            $table->string( 'name', 255 );
            
            $table->text( 'description' );
            
            $table->date( 'release_date' );
            
            $table->integer( 'rating' );
            
            $table->decimal( 'ticket_price', 10, 2 );
            
            $table->unsignedInteger( 'country_id' );
            $table->foreign( 'country_id' )->references( 'id' )->on( 'countries' );
            
            $table->string( 'photo', 255 );
            
            $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'films' );
    }
}
