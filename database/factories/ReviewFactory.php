<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Review::class, function (Faker $faker) {
    $products = DB::table('products')->pluck('id')->toArray();
    return [
        'product_id' => $faker->randomElement($products),
        'user_id' => $faker->unique()->numberBetween(1, DB::table('users')->count()),
        'rating' => $faker->numberBetween(1, 5),
        'comment' => $faker->text,
        'spam' => $faker->numberBetween(0, 1),
    ];
});
