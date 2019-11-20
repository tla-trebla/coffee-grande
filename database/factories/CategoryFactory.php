<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'description' => $faker->text,
        'image_path' => $faker->image('public/storage/images', 400, 300, null, false),
        'active' => $faker->numberBetween(0, 1),
    ];
});
