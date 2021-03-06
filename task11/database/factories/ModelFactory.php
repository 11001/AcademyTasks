<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->email
    ];
});

$factory->define(App\Entities\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'author' => $faker->firstName . ' ' . $faker->lastName,
        'year' => $faker->year,
        'genre' => 'genre'
    ];
});
