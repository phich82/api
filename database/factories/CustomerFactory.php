<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

$fakerAnother = FakerFactory::create('ja_JP');
$factory->define(App\Customer::class, function (Faker $faker) use ($fakerAnother) {
    return [
        'first_name' => $faker->randomElement([$faker->firstName(), $fakerAnother->firstName()]),
        'last_name' => $faker->lastName(),
    ];
});
