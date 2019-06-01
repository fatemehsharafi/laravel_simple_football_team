<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Players;
use Faker\Generator as Faker;

$factory->define(Players::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
    ];
});
