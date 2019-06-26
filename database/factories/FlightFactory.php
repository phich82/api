<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
    $hoursFlight =$faker->numberBetween(1, 5);
    $timeFlight = new DateInterval('PT'.$hoursFlight.'H');
    $timeArrival = $faker->datetime;
    $timeDeparture = clone $timeArrival;
    $timeDeparture->sub($timeFlight);
    return [
        'flight_number' => str_random(3).$faker->unique()->randomNumber(5),
        'arrival_airport_id' => $faker->numberBetween(1, 5),
        'arrival_datetime' => $timeArrival,
        'departure_airport_id' => $faker->numberBetween(1, 5),
        'departure_datetime' => $timeDeparture,
        'status' => $faker->boolean() ? 'ontime' : 'delayed'
    ];
});
