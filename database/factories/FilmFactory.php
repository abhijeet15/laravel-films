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

$factory->define(App\Models\Film::class, function (Faker $faker) {

	$int = rand( 1, 2 );
    return [
        'slug' => $faker->slug,
        'name' => $faker->name,
        'description' => $faker->paragraph( 6 ) ,
        'release_date' => $faker->date( 'Y-m-d', 'now' ),
        'rating' => $faker->numberBetween( 3, 5 ),
        'ticket_price' => $faker->randomFloat( 2, 10, 100 ),
        'country_id' => function() {
            return factory(App\Models\Country::class)->create( )->id;
        },
        'photo' => 'sample_' . $int . '.png',
    ];
});
