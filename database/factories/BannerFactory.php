<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    static $order = 1;
    return [
        'order' => $order,
        'available_at' => today()->startOfDay(),
        'expires_in' => null
    ];
});