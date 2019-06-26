<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Airport::class, function (Faker $faker) {
    return [
        'iata_code' => str_random(3),
        'city' => $faker->city,
        'state' => $faker->stateAbbr
    ];
});
