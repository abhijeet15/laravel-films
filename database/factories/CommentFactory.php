<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Comment::class, function (Faker $faker) {

	$int = rand( 1, 2 );
    return [
        'user_id' => function() {
            return factory(App\User::class)->create( )->id;
        },
        'film_id' => function() {
            return factory(App\Models\Film::class)->create( )->id;
        },
        'name' => function() {
            return factory(App\User::class)->create( )->name;
        },
        'comment' => $faker->paragraph( rand( 2, 4 ) )
    ];
});
