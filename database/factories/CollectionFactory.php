<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Collection;
use Faker\Generator as Faker;


$factory->define(Collection::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
    ];
});
