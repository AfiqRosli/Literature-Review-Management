<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'literature_review_id' => factory(App\LiteratureReview::class),
        'quote' => $faker->sentence(10),
        'page' => rand(1, 600),
    ];
});
