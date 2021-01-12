<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $price =  $faker->randomFloat(2, 10, 300);
    $promotionalPrice = $faker->boolean() ? $price * (1 - ($faker->numberBetween(0, 50) / 100)) : null;
    return [
        'name' => $faker->sentence(2),
        'image' =>  $faker->imageUrl(1000, 1000, 'animals', true),
        'rating' => $faker->randomFloat(2, 0, 5),
        'price'  => $price,
        'promotional_price'  => $promotionalPrice,
        'installment_limit'  => $faker->numberBetween(1, 12),
    ];
});
