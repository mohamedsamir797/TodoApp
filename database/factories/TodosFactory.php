<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Todos::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'desc' => $faker->text(100),
        'completed' => false,
    ];
});
