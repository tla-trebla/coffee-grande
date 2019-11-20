<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->unique()->numberBetween(1, App\Category::count()),
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomNumber(5, false),
        'image_path' => $faker->image('public/storage/images', 400, 300, null, false),
        'active' => $faker->numberBetween(0, 1),
    ];
});
