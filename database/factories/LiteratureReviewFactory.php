<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LiteratureReview;
use Faker\Generator as Faker;

$factory->define(LiteratureReview::class, function (Faker $faker) {
    return [
        'year' => $faker->year,
        'type' => $faker->randomElement(['Book', 'Dissertation', 'Journal', 'Article']),
        'topic' => $faker->sentence(5)
    ];
});
