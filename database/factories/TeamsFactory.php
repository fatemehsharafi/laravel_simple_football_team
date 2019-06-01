<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Teams;
use Faker\Generator as Faker;

$factory->define(Teams::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
    ];
});
